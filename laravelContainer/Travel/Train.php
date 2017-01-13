<?php
/**
 * concrete class Train
 * author:liyongheng
 * date:2017.01.14 01:14
 */
namespace App\Travel;

class Train implements Visit
{
    public function go()
    {
        echo 'go to tibet by train.';
    }
}
