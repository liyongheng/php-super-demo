<?php
/**
 * 装饰类
 * @author:liyongheng
 * @date:2017.01.15
 */
class Shoes extends Finery
{
    public function display()
    {
        echo '穿上鞋子.<br>';
        parent::display();
    }
}
