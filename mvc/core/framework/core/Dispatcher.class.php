<?php
/**
 * url调度
 * @author liyongheng
 * date 2014.04.02
 */
class Dispatcher {

    /**
     * URL映射到控制器
     * @access public
     * @return void
     */
    static public function dispatch() {
        // $urlMode  =  C('URL_MODEL');
        // if(isset($_GET[C('VAR_PATHINFO')])) { // 判断URL里面是否有兼容模式参数
        //     $_SERVER['PATH_INFO']   = $_GET[C('VAR_PATHINFO')];
        //     unset($_GET[C('VAR_PATHINFO')]);
        // }
        // if($urlMode == URL_COMPAT ){
        //     // 兼容模式判断
        //     define('PHP_FILE',_PHP_FILE_.'?'.C('VAR_PATHINFO').'=');
        // }elseif($urlMode == URL_REWRITE ) {
        //     //当前项目地址
        //     $url    =   dirname(_PHP_FILE_);
        //     if($url == '/' || $url == '\\')
        //         $url    =   '';
        //     define('PHP_FILE',$url);
        // }else {
        //     //当前项目地址
        //     define('PHP_FILE',_PHP_FILE_);
        // }

        // // 开启子域名部署
        // if(C('APP_SUB_DOMAIN_DEPLOY')) {
        //     $rules      = C('APP_SUB_DOMAIN_RULES');
        //     if(isset($rules[$_SERVER['HTTP_HOST']])) { // 完整域名或者IP配置
        //         $rule = $rules[$_SERVER['HTTP_HOST']];
        //     }else{
        //         $subDomain  = strtolower(substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],'.')));
        //         define('SUB_DOMAIN',$subDomain); // 二级域名定义
        //         if($subDomain && isset($rules[$subDomain])) {
        //             $rule =  $rules[$subDomain];
        //         }elseif(isset($rules['*'])){ // 泛域名支持
        //             if('www' != $subDomain && !in_array($subDomain,C('APP_SUB_DOMAIN_DENY'))) {
        //                 $rule =  $rules['*'];
        //             }
        //         }                
        //     }

        //     if(!empty($rule)) {
        //         // 子域名部署规则 '子域名'=>array('分组名/[模块名]','var1=a&var2=b');
        //         $array  =   explode('/',$rule[0]);
        //         $module =   array_pop($array);
        //         if(!empty($module)) {
        //             $_GET[C('VAR_MODULE')]  =   $module;
        //             $domainModule           =   true;
        //         }
        //         if(!empty($array)) {
        //             $_GET[C('VAR_GROUP')]   =   array_pop($array);
        //             $domainGroup            =   true;
        //         }
        //         if(isset($rule[1])) { // 传入参数
        //             parse_str($rule[1],$parms);
        //             $_GET   =  array_merge($_GET,$parms);
        //         }
        //     }
        // }
        // // 分析PATHINFO信息
        // if(!isset($_SERVER['PATH_INFO'])) {
        //     $types   =  explode(',',C('URL_PATHINFO_FETCH'));
        //     foreach ($types as $type){
        //         if(0===strpos($type,':')) {// 支持函数判断
        //             $_SERVER['PATH_INFO'] =   call_user_func(substr($type,1));
        //             break;
        //         }elseif(!empty($_SERVER[$type])) {
        //             $_SERVER['PATH_INFO'] = (0 === strpos($_SERVER[$type],$_SERVER['SCRIPT_NAME']))?
        //                 substr($_SERVER[$type], strlen($_SERVER['SCRIPT_NAME']))   :  $_SERVER[$type];
        //             break;
        //         }
        //     }
        // }
        // $depr = C('URL_PATHINFO_DEPR');
        // if(!empty($_SERVER['PATH_INFO'])) {
        //     tag('path_info');
        //     $part =  pathinfo($_SERVER['PATH_INFO']);
        //     define('__EXT__', isset($part['extension'])?strtolower($part['extension']):'');
        //     if(__EXT__){
        //         if(C('URL_DENY_SUFFIX') && preg_match('/\.('.trim(C('URL_DENY_SUFFIX'),'.').')$/i', $_SERVER['PATH_INFO'])){
        //             send_http_status(404);
        //             exit;
        //         }
        //         if(C('URL_HTML_SUFFIX')) {
        //             $_SERVER['PATH_INFO'] = preg_replace('/\.('.trim(C('URL_HTML_SUFFIX'),'.').')$/i', '', $_SERVER['PATH_INFO']);
        //         }else{
        //             $_SERVER['PATH_INFO'] = preg_replace('/.'.__EXT__.'$/i','',$_SERVER['PATH_INFO']);
        //         }
        //     }

        //     if(!self::routerCheck()){   // 检测路由规则 如果没有则按默认规则调度URL
        //         $paths = explode($depr,trim($_SERVER['PATH_INFO'],'/'));
        //         if(C('VAR_URL_PARAMS')) {
        //             // 直接通过$_GET['_URL_'][1] $_GET['_URL_'][2] 获取URL参数 方便不用路由时参数获取
        //             $_GET[C('VAR_URL_PARAMS')]   =  $paths;
        //         }
        //         $var  =  array();
        //         if (C('APP_GROUP_LIST') && !isset($_GET[C('VAR_GROUP')])){
        //             $var[C('VAR_GROUP')] = in_array(strtolower($paths[0]),explode(',',strtolower(C('APP_GROUP_LIST'))))? array_shift($paths) : '';
        //             if(C('APP_GROUP_DENY') && in_array(strtolower($var[C('VAR_GROUP')]),explode(',',strtolower(C('APP_GROUP_DENY'))))) {
        //                 // 禁止直接访问分组
        //                 exit;
        //             }
        //         }
        //         if(!isset($_GET[C('VAR_MODULE')])) {// 还没有定义模块名称
        //             $var[C('VAR_MODULE')]  =   array_shift($paths);
        //         }
        //         $var[C('VAR_ACTION')]  =   array_shift($paths);
        //         // 解析剩余的URL参数
        //         preg_replace('@(\w+)\/([^\/]+)@e', '$var[\'\\1\']=strip_tags(\'\\2\');', implode('/',$paths));
        //         $_GET   =  array_merge($var,$_GET);
        //     }
        //     define('__INFO__',$_SERVER['PATH_INFO']);
        // }else{
        //     define('__INFO__','');
        // }

        // URL常量
        define('__SELF__',strip_tags($_SERVER['REQUEST_URI']));
        // 当前项目地址
        define('__APP__',strip_tags(PHP_FILE));
        define('MODULE_NAME',self::getModule(getConfig('VAR_MODULE')));
        define('ACTION_NAME',self::getAction(getConfig('VAR_ACTION')));
        
        //保证$_REQUEST正常取值
        $_REQUEST = array_merge($_POST,$_GET);
    }

    /**
     * 获得实际的模块名称
     * @access private
     * @return string
     */
    static private function getModule($var) {
        $module = (!empty($_GET[$var])? $_GET[$var]:getConfig('DEFAULT_MODULE'));
        unset($_GET[$var]);
        return strip_tags($module);
    }

    /**
     * 获得实际的操作名称
     * @access private
     * @return string
     */
    static private function getAction($var) {
        $action   = !empty($_POST[$var]) ? $_POST[$var] : (!empty($_GET[$var])?$_GET[$var]:getConfig('DEFAULT_ACTION'));
        unset($_POST[$var],$_GET[$var]);
        return strip_tags(getConfig('URL_CASE_INSENSITIVE')?strtolower($action):$action);
    }

    /**
     * 路由检测
     * @access public
     * @return void
     */
    // static public function routerCheck() {
    //     $return   =  false;
    //     // 路由检测标签
    //     tag('route_check',$return);
    //     return $return;
    // }

   
    /**
     * 获得实际的分组名称
     * @access private
     * @return string
     */
    // static private function getGroup($var) {
    //     $group   = (!empty($_GET[$var])?$_GET[$var]:C('DEFAULT_GROUP'));
    //     unset($_GET[$var]);
    //     return strip_tags(C('URL_CASE_INSENSITIVE') ?ucfirst(strtolower($group)):$group);
    // }

}
