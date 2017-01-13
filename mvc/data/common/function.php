<?php  
/**
 * Description  项目公共函数文件
 * @author 		liyongheng
 * @date 		2016.04.01
 **/


/**
 * 取得系统配置信息
 * 读取data/config/config.ini.php,application/config/config.ini.php
 * @param string $key 取得下标值
 * @return mixed
 */
function getConfig($key){
        if (strpos($key,'.')){
                $key = explode('.',$key);
                if (isset($key[2])){
                        return $GLOBALS['sys_config'][$key[0]][$key[1]][$key[2]];
                }else{
                        return $GLOBALS['sys_config'][$key[0]][$key[1]];
                }
        }else{
                return $GLOBALS['sys_config'][$key];
        }
}

/**
 * 批量导入文件 成功则返回
 * @param array $array 文件数组
 * @param boolean $return 加载成功后是否返回
 * @return boolean
 */
function require_array($array,$return=false){
    foreach ($array as $file){
        if (require_cache($file) && $return) return true;
    }
    if($return) return false;
}

/**
 * 优化的require_once
 * @param string $filename 文件地址
 * @return boolean
 */
function require_cache($filename) {
    static $_importFiles = array();
    if (!isset($_importFiles[$filename])) {
        if (file_exists_case($filename)) {
            require $filename;
            $_importFiles[$filename] = true;
        } else {
            $_importFiles[$filename] = false;
        }
    }
    return $_importFiles[$filename];
}

/**
 * 区分大小写的文件存在判断
 * @param string $filename 文件地址
 * @return boolean
 */
function file_exists_case($filename) {
    if (is_file($filename)) {
        if (IS_WIN && getConfig('APP_FILE_CASE')) {
            if (basename(realpath($filename)) != basename($filename))
                return false;
        }
        return true;
    }
    return false;
}

/**
 * 载入核心加载类
 */
function _load_core_class(){
    $file_list = array(
        CORE_PATH.'/framework/core/model.class.php',
    );
    if(require_array($file_list,false)){
            return ;
    }
}

/**
 * 数据库模型实例化入口
 *
 * @param string $model 模型名称
 * @return obj 对象形式的返回结果
 */
function Model($model = null){
    static $_cache = array();
    if (!is_null($model) && isset($_cache[$model])) return $_cache[$model];
    $file_name = DATA_PATH.'/model/'.$model.'model.class.php';
    $class_name = $model.'model';

    // echo $class_name;exit;
    if (!file_exists($file_name)){
        return $_cache[$model] =  new model($model);
    }else{

        require_once($file_name);
        if (!class_exists($class_name)){
            $error = 'Model Error:  Class '.$class_name.' is not exists!';
            throw_exception($error);
        }else{
            return $_cache[$model] = new $class_name($model);
        }
    }
}


?>