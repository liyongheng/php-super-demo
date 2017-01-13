<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function testlaravel(Request $request)
    {
        $app = new \Illuminate\Container\Container;
        $app->bind('\App\Travel\Visit', '\App\Travel\Train');
        $app->bind('travel', '\App\Travel\Traveller');
        $traveller = $app->make('travel');
        $traveller->visitTibet();
    }

}
