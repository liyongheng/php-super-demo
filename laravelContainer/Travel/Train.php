<?php
namespace App\Travel;

class Train implements Visit
{
    public function go()
    {
        echo 'go to tibet by train.';
    }
}
