<?php  
/**
 * 框架启动文件
 * @author liyongheng
 * date 2014.04.02
 **/
class app{
	
	static public function init(){

        require COMMON_PATH.'/function.php';//top function
        if (file_exists(BASE_PATH.'/common/function.php')){ //app function
            include(BASE_PATH.'/common/function.php');
        }

        require COMMON_PATH.'/define.php';//top define
        if (file_exists(BASE_PATH.'/common/define.php')){ //app define
            include(BASE_PATH.'/common/define.php');
        }

        if(getConfig('OUTPUT_ENCODE')){// 页面压缩输出支持
            $zlib = ini_get('zlib.output_compression');
            if(empty($zlib)) ob_start('ob_gzhandler');
        }

        _load_core_class();//载入核心类

         // 设置系统时区
        date_default_timezone_set(getConfig('DEFAULT_TIMEZONE'));

        // 设定错误和异常处理
        // register_shutdown_function(array('app','fatalError'));
        // set_error_handler(array('app','appError'));
        // set_exception_handler(array('app','appException'));
        // 注册AUTOLOAD方法
        spl_autoload_register(array('app', 'autoload'));

       	//TODO AUTOLOAD 
        require CORE_PATH.'/framework/core/Dispatcher.class.php';
        Dispatcher::dispatch();

		//统一ACTION
		$_GET['c'] = preg_match('/^[\w]+$/i',$_GET['c']) ? $_GET['c'] : 'index';
		$_GET['a'] = preg_match('/^[\w]+$/i',$_GET['a']) ? $_GET['a'] : 'index';

		//对GET POST接收内容进行过滤,$ignore内的下标不被过滤
		$ignore = getConfig('FILTER_IGNORE');
		if (!class_exists('Security')) require(CORE_PATH.'/framework/library/security.php');
		$_GET = !empty($_GET) ? Security::getAddslashesForInput($_GET,$ignore) : array();
		$_POST = !empty($_POST) ? Security::getAddslashesForInput($_POST,$ignore) : array();
		$_REQUEST = !empty($_REQUEST) ? Security::getAddslashesForInput($_REQUEST,$ignore) : array();
		$_SERVER = !empty($_SERVER) ? Security::getAddSlashes($_SERVER) : array();
		return ;
	}

	static public function requestexec(){
		 if(!preg_match('/^[A-Za-z](\w)*$/',MODULE_NAME)){ // 安全检测
            $module  =  false;
         }else{
         	$module = MODULE_NAME.'ctl';
         }
		 $action = getConfig('ACTION_NAME')?getConfig('ACTION_NAME'):ACTION_NAME;
		 try{
            if(!preg_match('/^[A-Za-z](\w)*$/',$action)){
                // 非法操作
                throw new Exception();
            }
			$class = new $module();
			$class->$action();

        } catch (Exception $e) { 

        }

        return ;
	}

	static public function run(){
		app::init();
		app::requestexec();
		return ;
	}

	public static function autoload($class) {
        $libPath    =   defined('BASE_LIB_PATH')?BASE_LIB_PATH:LIB_PATH;
        $file       =   $class.'.class.php';
        if(substr($class,-5)=='model'){ // 加载模型
            if(require DATA_PATH.'/model/'.$file){
            	return ;
            }
        }elseif(substr($class,-3)=='ctl'){ // 加载控制器
        	if(require LIB_PATH.'/'.$file){
        		return ;
        	}
        }elseif(substr($class,0,5)=='cache'){ // 加载缓存驱动
            if(require_array(array(
                EXTEND_PATH.'/driver/cache/'.$file,
                CORE_PATH.'/driver/cache/'.$file),true)){
                return ;
            }
        }elseif(substr($class,0,2)=='db'){ // 加载数据库驱动
            if(require_array(array(
                EXTEND_PATH.'/driver/db/'.$file,
                CORE_PATH.'/driver/db/'.$file),true)){
                return ;
            }
        }elseif(substr($class,0,8)=='template'){ // 加载模板引擎驱动
            if(require_array(array(
                EXTEND_PATH.'/driver/template/'.$file,
                CORE_PATH.'/driver/template/'.$file),true)){
                return ;
            }
        }
    }

    

}
