<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends LoginverifyController {
    public function index(){                              //后台首页
        $this->display("index");
    }    


    //导航

    public function add_nav(){
        if(IS_POST){                             //如果获取到了POST数据  ID存在则更新save  不存在则插入 add
            if(D("category")->create()){
                I("post.id") ? D("category")->save() : D("category")->add();
                $this->success("操作成功");die;
            }else{
                $this->error(D('category')->getError());   //插入失败获取返回的失败信息
            }
        }
        if(I('get.id')){                                  //如果id存在 则显示已有数据的信息
            $data = M('category')->find(I('get.id'));
            $this->assign('data',$data);
        }


        $navs = D("Category")->get_all_nav(0);             //调用CategoryModel模板 循环出所有导航
        $this->assign("navs",$this->get_all_nav_option($navs));
        $this->display('add_nav');
    }
    public function list_nav(){
        if(I('get.id')){                     //点击删除按钮 获取id  如果获取到 id 则执行删除操作
            $nav = M("category");
            $id = I('get.id');
            $url = 'list_nav';
            $this->del($nav,$id,$url);
        }
        import('ORG.Util.Page');          //实例化分页 page 模块
        $pagesize = 5;                      //每页数据个数
        $data = M("category")->limit($pagesize)->page(I("get.p"))->select();
        $totleNum = M("category")->count();         //页数
        $Page = new \Page($totleNum,$pagesize);
        $Page->setConfig('theme','  %first% %upPage% %linkPage%  %downPage% %end% 共%totalRow%页');

        $this->assign("page",$Page->show());
        $this->assign("all_navs",$data);
        $this->display("list_navs");    
    }
    //导航

    //产品函数

     private function save_thumbs(){
        import('ORG.Net.UploadFile');                                          //引入，文件上传的类
            $upload = new \UploadFile();                                        // 实例化上传类
            $upload->maxSize  = 3145728 ;                                    // 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->savePath =  './Public/Uploads/product';        // 设置附件上传目录
            if(!$upload->upload()) {                                    // 上传错误提示错误信息
                die("图片上传失败");
            }else{// 上传成功
                return $upload->getUploadFileInfo();            //返回上传文件的信息
            }
    }

    public function code(){                                         //实例化验证码 如需验证码 调用该函数
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    public function showcode(){                              //实例化验证码
        if(IS_POST){                                         // 如果获取post 则 验证验证码 是否正确
            $Verify = new \Think\Verify();
            if($Verify->check(I('post.code'))){
                $this->success("验证成功");die;
            }else{
                $this->success("验证失败");die;
            }
        }
        echo "<img src='".U("code")."'/> <form method='post'><input name='code'/><input type='submit'/></form>";    //输出验证码  U('code') 调用 code() 函数 显示验证码
    }

    public function add_product(){
        if(IS_POST){                                            //如果获取到POST 有id 更新 无id插入
            if(D("Product")->create()){
                $id = I("post.pid");
                $id ? D("Product")->save() : $id = D("Product")->add();
                $is_shows = M("product")->where("pid=$id")->find();        //获取product的pid的数组
                $imgs = $this->save_thumbs();                              //上传图片并 获取图片信息
                if(! empty($imgs)){
                    foreach($imgs as $v){                          //循环图片信息
                       $url = $v['savepath'].$v['savename'];      //获取图片路径 若is_show = 3 则插入lunbo表 否则插入 product_img 表
                        if($is_shows['is_show'] == 3){
                            D('lunbo')->add(array(
                                'pid' => $id,
                                'thumb' =>$url,
                                'url' => "main?id=".$id,
                                'title' => "轮播ID".$id,
                            ));
                        }else{
                       D('product_img')->add(array(
                            'pid' => $id,
                            'thumb' => $url,
                            'size' => $v['size'],
                            'is_show'=>$is_shows['is_show'],
                        ));
                        }
                    }
                }
                $this->success("执行成功");die;
            }else{
                $this->error(D("Product")->getError() );        //插入失败则返回失败信息
            }
        }
        if(I("get.pid")){                              //如果获取到了product的id 获取其信息并显示出来
            $data = M("product")->find(I("get.pid"));
            $this -> assign("data",$data);
        }

        $navs = D("Category")->get_all_nav(0);
        $this->assign("navs",$this->get_all_nav_option($navs));
        $this->display("add_product");
    }
    public function list_product(){
        if(I("get.id")){                   //点击删除按钮 获取id  如果获取到 id 则执行删除操作
            $products = M('product');
            $id = I("get.id");
            $url = 'list_product';
            $this->del($products,$id,$url);
        }
        import('ORG.Util.Page');
        $pagesize = 5;
        $data = M("product")->limit($pagesize)->page(I("get.p"))->select();
        $totleNum = M("product")->count();
        $Page = new \Page($totleNum,$pagesize);
        $Page->setConfig('theme','  %first% %upPage% %linkPage%  %downPage% %end% 共%totalRow%页');

        $this->assign("page",$Page->show());
        $this->assign("all_product",$data);
        $this->display("list_product");
    }
    //产品函数


    //新闻函数

    public function add_news(){
        if(IS_POST){
            if(D("News")->create()){
                I("post.id") ? D("News")->save() : D("News")->add();
                $this->success("执行成功");die;
            }else{
                $this->error(D("News")->getError());
            }
        }
        if(I("get.id")){
            $data = M("news")->find(I("get.id"));
            $this->assign("data",$data);
        }

        $navs = D("Category")->get_all_nav(0);
        $this->assign("navs",$this->get_all_nav_option($navs));
        $this->display("add_news");
    }
    public function list_news(){
        if(I("get.id")){                             //点击删除按钮 获取id  如果获取到 id 则执行删除操作
            $products = M('news');
            $id = I("get.id");
            $url = 'list_news';
            $this->del($products,$id,$url);
        }

        import('ORG.Util.Page');
        $pagesize = 5;
        $data = D("news")->limit($pagesize)->page(I("get.p"))->select();
        $totleNum = D("news")->count();
        $Page = new \Page($totleNum,$pagesize);
        $Page->setConfig('theme','  %first% %upPage% %linkPage%  %downPage% %end% 共%totalRow%页');

        $this->assign("page",$Page->show());
        $this->assign("all_news",$data);
        $this->display("list_news");
    }
    //新闻函数


/*
 * @name get_all_nav_option   获取所有nav信息并插入到 option标签中 行成下啦
 * @param $data 传入循环的数组
 * @param $a    子类前缀
 */

    private function get_all_nav_option($data,$a=""){
        foreach($data as $k => $v){
            $opt .= "<option value='{$v['cid']}'>".$a.$v['name']."</option>";
            if($v['sub_nav']){
                $opt .= $this->get_all_nav_option($v['sub_nav'],"----");
            }
        }
        return $opt;
    }

 /*
 *@name del  后台数据删除功能
 *@param $bases  指定的数据库
 *@param $id    删除的数据的id
 *@param $url   删除后跳转页面
 */
    private function del($bases,$id,$url){              //删除功能
        if($bases->delete($id)){
            $this->success("删除成功",U($url));die;     //删除成功跳转
        }else{
            $this->success("删除失败 ");die;        //删除失败提示
        }
    }

}