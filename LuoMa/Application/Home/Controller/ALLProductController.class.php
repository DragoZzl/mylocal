<?php
namespace Home\Controller;
use Think\Controller;
class ALLProductController extends Controller {
	public function __construct(){                              //ProductController的父类   利用子类自动调用父类构造函数,使得公共部分数据得以在ProductController生效
		parent::__construct();
		$parent_nav =  M("category")->where("cid=3")->find();
    	$this->assign("nav",M('category')->where("fid=3")->select() );
		$this->assign("parent_nav",$parent_nav);
	}
}
	?>