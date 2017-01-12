<?php  
class goodsmodel extends model{
	
	public function getGoodsList(){
		return $this->select();
	}
}
?>