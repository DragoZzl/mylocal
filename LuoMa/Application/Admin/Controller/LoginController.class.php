<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        if(IS_POST){                   //如果获取到POST 则验证是否正确
            if(D('User')->create()){       //验证 用户和密码
                $this->success("登陆成功",U('index/index'));
            }else{
                $this->error(D('User')->geterror());
            }
            die;
        }

        C('LAYOUT_ON',false);    //获取配置 LAYOUT_ON  设置为false
        $this->display("login");
    }
    public function logout(){       //退出登陆 清空session
        session('user_data',null);
        $this->success("退出成功",U('login'));
        die;
    }

}