<?php
namespace Home\Controller;
use Think\Controller;
class JoinController extends AllJoinController {
    public function index(){
        if(IS_POST){                               //如果获取到了 POST 传入的数据
            if(D('Guestbook')->create()){           //根据模板 GuestbookModel  的规则将数据插入数据库
                D('Guestbook')->add();
                $this->success('留言成功');die;
            }else{                                  //插入失败显示失败语句
                $this->error(D('Guestbook')->getError());
            }
        }
        $this->display("jointo");
    }
}