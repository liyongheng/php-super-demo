<?php  
class goodsctl{
	public function index(){
		$goods_model = new goodsmodel();
		$goods = $goods_model->getGoodsList();
		echo '<pre>';
		print_r($goods);
		exit;
	}
}

?>