<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends ALLProductController {
    public function lists(){
    	import('ORG.Util.Page2');                                                                               //实例化分页对象Page2
        $pagesize = 3;                                                                                          //设置一页多少商品
        $totleNum = M("product")->where("cid=19")->count();                                                 //获取所有产品数据总数
        $Page = new \Page2($totleNum,$pagesize);                                                            //页数 = (总页数 / 显示数量)
        $Page->setConfig('theme','  %first% %upPage% %linkPage%  %downPage% %end% ');  //显示的按钮

        $this->assign("page",$Page->show() );                                                                    //显示页数
        $this->assign("this_nav",M("category")->where("fid=3")->limit(0,1)->select() );

        $this->img_show(M("product")->where("cid=19")->select(),228,154);                                     //生成缩略图
        $data = $this->img_show(M("product")->limit($pagesize)->page(I("get.p"))->where("cid=19 AND (is_show=0 OR is_show=1 OR is_show=2)")->select(),228,154 );    //普通产品数据
        if($data){                                                                                      //如果普通产品数据还有的话 就继续显示 没有的话 就显示轮播商品
            $this->assign("this_product",$data);                                                       //传入普通商品数据
            $this->display("list");
        }else{
            $lb_data = $this->img_show(M("product")->limit($pagesize)->page(I("get.p"))->where("cid=19")->select(),228,154,'lunbo' ); //显示轮播商品
            $this->assign("this_product",$lb_data);                                                                                      //传入
            $this->display("list");
        }



    }
    public function main(){
        if(I('get.id')){              //获取get的产品id
            $pid = I('get.id');
        }else{                          //如果没有get,默认给予第一个产品id
            $pid = M('product')->where("cid=19")->limit(0,1)->find();
            $pid = $pid['pid'];
        }

        $this_product = M('product')->where("pid=$pid")->select();                        //获取get到id所属产品
        $this->assign("this_product",$this_product);                                     //传入产品文字数据

        $lb_product = M('product')->where("is_show=3")->limit(0,3)->select();     //如果是轮播图,则获取轮播图数据
        foreach ($lb_product as $k => $v) {                                         //循环缩略图 id 验证是否 产品轮播图
            if(I('get.id') == $v['pid']){
                $lb_img_big = $this->img_show($lb_product,250,250,"lunbo");                         //获取该产品大缩略图
                $lb_img_small = $this->img_show($lb_product,50,50,"lunbo");                         //获取该产品小缩略图
                foreach ($lb_img_big as $k => $v) {                                                 //传入指定轮播图 缩略图图片数据
                    if($v['pid'] == I('get.id')){
                        $this->assign("this_product_big",$lb_img_big[$k]['imgurl'][0]);
                        $this->assign("this_product_small",$lb_img_small[$k]['imgurl'][0]);
                        $this->display("main");
                    }
                }
            }
        }                                                                                       //如果不是轮播图,则获取普通产品缩略图
            $this_product_small = $this->img_show($this_product,50,50);                        //获取该产品小缩略图
            $this_product_big = $this->img_show($this_product,250,250);                      // 获取该产品大缩略图
            $this->assign("this_product_small",$this_product_small[0]['imgurl']);       //传入
            $this->assign("this_product_big",$this_product_big[0]['imgurl']);           //传入
            $this->display("main");
    }

    /*
     * @name thumb,生成缩略图
     * @param $url 图片路径
     * @param $width 生成缩略图宽度
     * @param $height 生成缩略图高度
     */
    public function thumb($url,$width,$height){
        $img = (new \Lib\Li\Image);                                                         //实例化缩略图对象
        return "/".$img->get_thumb($url,$width,$height);                                 //生成缩略图绝对路径
    }

    /*
     * @name img_show 取出相关的 图片 与 产品数据 两个数据库,将图片数据 放入 产品数据中,生成下标imgurl存放图片路径
     * @param $data 传入产品数组
     * @param $database 图片存放数据库 默认product_img
     * @param $width  生成缩略图宽度
     * @param $height 生成缩略图高度
     */
    public function img_show($data,$width,$height,$database = "product_img"){                      //将图片链接传到product产品里;
        foreach($data as $k => $v){                                                                 //循环传入的产品数组
            $i = 0;                                                                                 //用于下标
            $imgs = M("$database")->where("pid={$v['pid']}")->select();                         //取出产品数据相关图片
            if(is_array($imgs)){                                                                //如果取出的数据是数组,便循环
                foreach($imgs as $kk => $vv){                                                //如果取出的数据是数组,便循环
                    $data[$k]['imgurl'][$i] = $this->thumb($vv['thumb'],$width,$height);  //循环图片链接插入产品数据中
                    $i++;
                }
            }else{
                $data[$k]['imgurl'] = $imgs[$i]['thumb'];                                 //图片链接插入产品数据
                $i++;
            }
        }
        return $data;                                       //返回产品数据
    }

}