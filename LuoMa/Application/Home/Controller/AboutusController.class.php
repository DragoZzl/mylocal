<?php
namespace Home\Controller;
use Think\Controller;
class AboutusController extends AllAboutController {
    public function index(){
    	$this->assign("this_nav",M('category')->where("fid=2")->limit(0,1)->select() );            //查询 插入
    	$this->assign("lm_text",M('news')->where("cid=14")->find() );
        $this->display("Introduction");
    }
}