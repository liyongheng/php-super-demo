本示例讲解IoC与容器简单实现
1.概念
  1-1 什么是IoC 
  1-1-1 IoC 被称为控制反转，主要用来解决类之前的依赖关系，又称为依赖注入。
  e.g. 一个人 Person类 想要听音乐 play()方法 
       play()方法播放需要播放媒体,以Ipad 和 Iphone为类
       未解决依赖的写法是： 
       
       写法一：
       class Person{
       		public function ipadPlay(){
       			$media = new Ipad();
       			$media->play(); //采用Ipad播放音乐
       		}
       }
       $person = new Person;
       $person->ipadPlay();
       
       写法二：
       class Person{
       		public $media;
       		public function __construct($media){
       			$this->media = $media;
       		}
       		public function ipadPlay(){
       			$this->media->play();
       		}
       }
       $media = new Ipad();
       $person = new Person($media);
       $person->listenMusic();

       依赖的概念：Person想用Ipad播放音乐 Person类对Ipad类存在依赖依赖关系 
       分析写法一：
       		写法一ipadPlay()方法直接把Ipad类放在自己的方法中来new 这样Person类严重依赖了Ipad,
       		如果再有另一个类Animal也用到Ipad类,Animal也要把Ipad类在自己的方法中new一次
       		如果再有更多的类要用到Ipad类,这些类作为主类都对Ipad类(次类)存在依赖关系
       		如果Ipad名称改了,将会导致所有依赖该类的主类均需要改代码。

       分析写法二：
       	    写法二没有在主类中new而是在外部new了被依赖的类，并传入主类,但是问题是如果主类依赖更多的类
       	    比如再依赖一个Iphone类,就会导至__construct($Ipad,$Iphone)传入更多的参数

       	总结：写法一与写法二都存在一个问题,就是主类与次类的严重依赖性。当主类的功能需要依赖另一个类时
       	主类自己来解决依赖关系，在自己内部或者传递参数的方式保存到主类中，这种方式导致高度耦合,类之间
       	依赖关系比较紧密。

       	解决方式：
       	这个时候，如果再加一个类，专门负责来解决主类与次之间的依赖关系,而不是由主类来处理，这种方式被
       	称为：控制反转 IoC.

       	解决方式：
       	Class Factory(){
       		public static function media($media){
       			switch($media){
       				case 'Ipad':
       					return new Ipad;
       					break;
       				case 'Iphone':
       					return new Iphone;
       					break;
       			}
       		}
       	}
       	$person = new Person(Factory::media('Ipad'));
       	$person->play();

       	这种方式的缺点是：如果有更多的播放媒体,可能就要更多的case... 那么Factory类就变得庞大,同时,虽然Person
       	类通过Factory类解决了对播放媒体类的依赖,但同时,并没有解决掉Person类(主类)对于Factory类(次类)之间的依赖
       	关系。一但Factory中的代码进行了改变,所有用到Factory的主类都必须要改代码。

       	容器：
       		容器的方式是把被依赖的对象存到自己的一个属性数组中,同时采用闭包的方式存储被依赖的类，实现延迟加载。
       		这种方式采用的设计模式被称为注册树，即将所有需要用到的对象都注册到自己内部，容器类则是用来解决主类
       		与次类依赖关系

       	本Demo采用简单的描述了容器与依赖注入IoC等概念与实现。
