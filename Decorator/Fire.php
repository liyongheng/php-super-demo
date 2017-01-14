<?php
/**
 * 装饰类
 * @author:liyongheng
 * @date:2017.01.15
 */
class Fire extends Finery
{
    public function display()
    {
        echo '出门前先整理头发.<br>';
        parent::display();
        echo '出门后再整理一次头发.<br>';
    }
}
