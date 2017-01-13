<?php
/**
 * class Person
 * author:liyongheng
 * date:2017.01.14 01:14
 */

require 'Ipad.php';
require 'Iphone.php';
require 'Container.php';

class Person
{
    private $media;
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function ipadPlay()
    {
        $object = $this->container->get('iPad');
        $object->play();
    }

}

Container::bind('ipad', function () {
    return new iPad;
});

Container::bind('iphone', function () {
	return new Iphone;
});


$iPad = Container::make('ipad');
$iPad->play();

$iPad = Container::make('iphone');
$iPad->play();

