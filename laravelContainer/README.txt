本demo用一个实例来测试laravel中的IoC.
若对IoC概不理解,请先查看Ioc Demo.
本demo实现Container的注入和抽取容器对象的过程.
1.模拟比较简单的一个乘坐train travel去tibet的一个过程
2.在app目录下新建Travel
3.在Travel目录下新建接口Visit和实体例Train
4.将Train注入到Contrainer中
5.从Container中抽取出Train对象,调用Train中的方法

补充:
    Travel目录的建立和文件的令名空间来自去composer的psr-4标准载入,
    关于此处类载入不清楚的同学可以去google或百度

