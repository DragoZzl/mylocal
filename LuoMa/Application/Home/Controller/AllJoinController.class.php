<?php
namespace Home\Controller;
use Think\Controller;
class AllJoinController extends Controller{
    public function __construct(){                            //JoinController的父类   利用子类自动调用父类构造函数,使得公共部分数据得以在JoinController生效.
        parent::__construct();
        $parent_nav =  M("category")->where("cid=6")->find();
        $this->assign("nav",M('category')->where("fid=6")->select() );
        $this->assign("parent_nav",$parent_nav);
    }
}

?>