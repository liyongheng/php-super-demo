<?php
/**
 * 装饰类主类,父类
 * @author:liyongheng
 * @date:2017.01.15
 */
class Finery implements Decorator
{
    private $component;

    public function __construct(Decorator $component)
    {
        $this->component = $component;
    }

    public function display()
    {
        $this->component->display();
    }
}
