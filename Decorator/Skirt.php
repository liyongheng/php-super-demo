<?php
/**
 * 装饰类
 * @author:liyongheng
 * @date:2017.01.15
 */
class Skirt extends Finery
{
    public function display()
    {
        echo '穿上裙子.<br>';
        parent::display();
    }
}
