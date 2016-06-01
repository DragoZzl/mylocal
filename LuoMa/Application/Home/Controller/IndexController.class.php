<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $lunbo_pid = M()->query("select pid from product where is_show=3 limit 0,3");                         //取出轮播图,只取前三条;
        foreach($lunbo_pid as $k => $v){                                                                      //循环查询到的前三条轮播图,并将修改路径
            $all_lunbo = M()->query("select thumb,url from lunbo where pid={$v['pid']}");                 //取出轮播图路径和地址
            $lb_string_arr = $all_lunbo[0]['thumb'];                                                       //获取轮播图的路径
            $lb_string = substr_replace($lb_string_arr,'/',0,2);                                          //修改轮播图的路径
            $news_lunbo[$k]['thumb'] = $lb_string;                                                      //替换轮播图路径
            $news_lunbo[$k]['url'] = $all_lunbo[0]['url'];                                            //替换轮播图链接
        }
    	$this->assign("banner2",$this->img_show(M('product')->where("is_show=2")->limit(0,1)->select(),1000,475) );      //首页新品图,只取数据库第一条
    	$this->assign('shows',$this->img_show(M('product')->where("is_show=1")->limit(0,4)->select(),242,315) );       //首页产品展示图,只取数据库前四条
    	$this->assign('banner',$news_lunbo); 						                                                                       //首页轮播图
        $this->display("index");
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