# pageStatic
php生成页面静态化原理,php生成静态页面,php静态化实例。

Tips:php生成静态化文件原理：

output_buffering:
PHP在输出之前会把代码暂存到内存缓冲区。
通过ob系统函数可以拿到缓冲区内容，同时清除缓冲区内容，
阻止php发送输出内容到客户端。
通过这一机制，可以把模板文件引入进来，但不输出，将数据填充到模板。

涉及到的函数：
ob_start()
ob_get_clean()  --ob_get_contents 与 ob_clean()的合体



