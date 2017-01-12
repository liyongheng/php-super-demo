<?php  
/**
 * Description  统一入口文件
 * @link 		http://www.uugeek.com
 * @author 		liyongheng
 * @date 		2016.04.01
 **/

error_reporting(E_ALL & ~E_NOTICE); //error level
define('DEBUG_MODE',false);	//关闭debug模式
define('APP_PC','application');	//pc app name
define('APP_WAP','wap');	//wap app name
define('ROOT_PATH',str_replace('\\','/',dirname(__FILE__))); //root path
define('CORE_PATH',ROOT_PATH.'/core'); //framework core path
define('DATA_PATH',ROOT_PATH.'/data'); //data and service
define('UPLOAD_PATH',DATA_PATH.'/upload'); //file upload path
define('ASSET_PATH',DATA_PATH.'/asset'); //assets path
define('COMMON_PATH',DATA_PATH.'/common'); //include path
define('LIB_PATH',ROOT_PATH.'/'.APP_PC.'/controller'); //app control path
define('EXTEND_PATH',CORE_PATH.'/framework/extend'); //app control path

if (!@include(DATA_PATH.'/config/config.ini.php')) exit('config file error.');//project config
if (file_exists(BASE_PATH.'/config/config.ini.php')){ //app config
	include(BASE_PATH.'/config/config.ini.php');
}

global $sys_config; //global config

//初始化
require CORE_PATH.'/framework/core/app.class.php';
app::run();

?>