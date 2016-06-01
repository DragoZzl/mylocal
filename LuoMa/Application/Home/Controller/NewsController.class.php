<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends AllNewsController {
    public function index(){
    	import('ORG.Util.Page2');                                             //实例化分页对象Page2
        $pagesize = 1;                                                           //设置一页多少新闻
        $totleNum = M("news")->where("cid=4")->count();                              //获取所有产品数据总数
        $Page = new \Page2($totleNum,$pagesize);                                //新闻页数
        $Page->setConfig('theme','  %first% %upPage% %linkPage%  %downPage% %end%');  //显示按钮

        $this->img_show(M("news")->where("cid=4")->select());               //生成新闻缩略图
        $data = $this->img_show(M("news")->limit($pagesize)->page(I("get.p"))->where("cid=4")->select() ); //新闻展示

        $this->assign("page",$Page->show() );
        $this->assign("this_news",$data);
    	$this->assign("this_nav",M("category")->where("cid=4")->select() );
    	$this->assign("all_nav",M("category")->where("fid=4")->select() );
        $this->display("news");
    }

    public function thumb($url){
       		$img = (new \Lib\Li\Image);
           return "/".$img->get_thumb($url,228,154);
    }


    public function img_show($data){    //生成新闻缩略图
    	foreach($data as $k => $v){
    		$data[$k]['thumb']	= $this->thumb($data[$k]['thumb']);
    	}
    	return $data;
    }

}