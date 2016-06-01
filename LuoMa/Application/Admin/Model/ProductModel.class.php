<?php
namespace Admin\Model;
use Think\Model;
defined("THINK_VERSION") or die("Access Denied");
class ProductModel extends Model{
	protected $_auto = array(
			array('content',"content_back",Model::MODEL_BOTH,"callback"),
			array('time',"time",Model::MODEL_BOTH,"function"),
		);

	protected $_validate = array(
			array('title','require','请填写title'),
			array('desc','require','请填写产品描述'),
			array('etitle','require','请填写产品内容'),
			array('cid','require','请填写父导航'),
		);

	function content_back(){
		return I("post.editorValue");
	} 
}
?>