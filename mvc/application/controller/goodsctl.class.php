<?php  
/**
 * goods conroller
 * author:liyongheng
 * date:2017.01.14 01:14
 */
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