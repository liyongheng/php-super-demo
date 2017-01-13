<?php
/**
 * Traveller class,it has dependcies of class Train
 * author:liyongheng
 * date:2017.01.14 01:14
 */
namespace App\Travel;

class Traveller
{
    protected $trafficTool;

    public function __construct(Visit $trafficTool)
    {
        $this->trafficTool = $trafficTool;
    }

    public function visitTibet()
    {
        $this->trafficTool->go();
    }
}
