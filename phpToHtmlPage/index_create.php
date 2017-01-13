<?php
/**
 * php生成静态化文件
 * 原理  ob_start() ob_get_clean() file_put_contents()
 * 为什么要用ob系列函数：
 * 需要为生成静态化文件的模板填数据，require模板进来，但不显示模板内容。
 * author:liyongheng
 * date:2017.01.14 01:17
 *
 **/
ob_start();

require_once 'inc.php';

$array[0]['name'] = 'zhangsan';
$array[0]['age'] = 18;
$array[0]['job'] = 'PHP';
$array[1]['name'] = 'lisi';
$array[1]['age'] = 20;
$array[1]['job'] = 'Java';
$array[2]['name'] = 'wangwu';
$array[2]['age'] = 30;
$array[2]['job'] = 'Python';

require_once TPL_DIR . 'index.template.php';

$content = ob_get_clean();
$staticFile = HTML_DIR . 'index.shtml';
$result = file_put_contents($staticFile, $content);

if (!$result) {
    exit('index.shtml生成fail.');
}
