<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginverifyController extends Controller{            //后台控制器继承的 验证登陆控制器
	public function __construct(){                 //验证session是否存在 不存在则跳转
		if(! session('user_data.id') && __ACTION__ != "./admin/login/index"){   //如果session不存在或登陆的不是指定页面 跳转
			$this->redirect("admin/login/login",array(),0,"请登录");
		}
		parent::__construct();
	}
}

 ?>