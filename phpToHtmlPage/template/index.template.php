<?php  
/**
 * index.php 静态化模板文件
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
</head>
<body>
	<h1>首页列表</h1>

	<ul>

	<?php foreach($array as $v){?>

		<li>
			<span>姓名:<?php echo $v['name']?></span>
			<span>年龄:<?php echo $v['age']?></span>
			<span>工作:<?php echo $v['job']?></span>
		</li>

	<?php }?>

	</ul>


</body>
</html>


