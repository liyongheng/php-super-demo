<?php  
/**
 * 入口文件
 * @author:liyongheng
 * @date:2017.01.15
 */
require 'Decorator.php';
require 'XiaoFang.php';
require 'Finery.php';
require 'Shoes.php';
require 'Skirt.php';
require 'Fire.php';

$xiaofang = new XiaoFang('xiaofang');
$shoes = new Shoes($xiaofang);
$skirt = new Skirt($shoes);
$fire = new Fire($skirt);

$fire->display();

