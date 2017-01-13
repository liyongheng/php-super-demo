<?php  
/**
 * class model
 * author:liyongheng
 * date:2017.01.14 01:14
 */

class model{

	//直接new此model需要传数据表名及实现orm
	public function __construct($model){
		$this->model = $model;
	}

	public function select(){
		return 'model-select';
	}
}


?>