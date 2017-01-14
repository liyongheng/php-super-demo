<?php
/**
 * 装饰类
 * @author:liyongheng
 * @date:2017.01.15
 */
class XiaoFang implements Decorator
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function display()
    {
        echo '我是' . $this->name . '我出门了!!<br>';
    }
}
