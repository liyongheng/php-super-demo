<?php  
//首页控制器

$host = $_SERVER['HTTP_HOST'];
$file = $_SERVER['PHP_SELF'];
$dir = dirname($file);
$url = 'http://'.$host.$dir.'/html/index.shtml';

require_once 'inc.php';

$tmpFile = HTML_DIR.'index.shtml';

if(is_file($tmpFile)){
	$fileTime = filemtime($tmpFile);
}


if(!is_file($tmpFile)){//生成静态文件
	require_once ROOT_DIR.'index_create.php';
}else if(is_file($tmpFile) && time() - filemtime($tmpFile) > 60){//判断文件生成时间，重新生成
	require_once ROOT_DIR.'index_create.php';
}

header("Location: $url");

?>