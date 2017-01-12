<?php  
/**
 * Description  全局配置文件
 * @link 		http://www.uugeek.com
 * @author 		.gbm
 * @date 		2016.04.01
 **/
$sys_config = array();
//不过滤虑的get内容
$sys_config['FILTER_IGNORE'] = array('article_content','pgoods_body','doc_content','content','sn_content','g_body','store_description','p_content','groupbuy_intro','remind_content','note_content','adv_pic_url','adv_word_url','adv_slide_url','appcode','mail_content', 'message_content','member_gradedesc');
$sys_config['OUTPUT_ENCODE'] = false;
$sys_config['DEFAULT_TIMEZONE'] = 'PRC'; // 默认时区
$sys_config['DEFAULT_MODULE'] = 'index'; //默认控制器
$sys_config['DEFAULT_ACTION'] = 'index'; //默认方法
$sys_config['VAR_MODULE'] = 'c'; // 控制器参数名
$sys_config['VAR_ACTION'] = 'a'; // 方法参数名

$sys_config['APP_FILE_CASE'] = false; //区分文件大小写对windows有效




return $sys_config;
