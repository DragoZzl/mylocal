<?php 
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
	protected $_validate = array(
		array('username','checkUser','用户名/密码错误',1,'callback'),
	);

	function checkUser(){
		$username = I('post.username');
		$user_data = $this->where("username='$username'")->find();
		if($user_data){
			if(I('post.password') == $user_data['password']){
				session('user_data',$user_data);
				return true;
			}else{
				return false;
			}
		}
			return false;
	}
}
 ?>