<?php  
//首页控制器
//@author liyongheng
class indexctl{

	public function index(){
		echo 'here is index controll and index function';
		$name = getConfig('name');
		echo '<br>';
		echo $name;
	}


	public function goods_list(){
		$goods_model = Model('goods');
		$goods_list = $goods_model->getGoodsList();
		echo '<pre>';
		print_r($goods_list);
		exit;
	}

}
?>