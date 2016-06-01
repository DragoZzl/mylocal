<?php
namespace Home\Model;
use Think\Model;
class GuestbookModel extends Model{

    protected $_validate = array(                       //自动验证
        array('name','require','请填写姓名'),
        array('phone','number','请填写正确电话'),
        array('fox','require','请填写传真'),
        array('email','email','请填写邮箱'),
        array('qq','number','请填写qq'),
        array('title','require','请填写标题'),
        array('content','require','请填写内容'),
    );

    protected $_auto = array(                          //自动完成
         array('time','time',Model::MODEL_BOTH,"function"),
    );


}

?>