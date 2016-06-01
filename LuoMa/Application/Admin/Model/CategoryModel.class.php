<?php
namespace Admin\Model;
use Think\Model;
defined("THINK_VERSION") or die("Access Denied");
class CategoryModel extends Model
{

	protected $_auto = array(
		array('thumb',"upload_file",Model::MODEL_BOTH,"callback"), //设置默认值
	);

	protected $_validate = array(// 受保护的属性。，在外部用不了
		array('name','require','请填写导航名！'), //默认情况下用正则进行验证
		array('url','require','请填写路径'),	//只要已经验证了数据的安全性，那么，就会自动放到auto里面，会自动完成
		array('fid','require','1'),
		array('ename','require',"请填写英文名"),
		array('is_show','require',"请选择是否轮播"),
		//array('test','4,6','请填写4-6位',Model::MODEL_BOTH,'length'),
		//array('test','funcName','函数调用验证失败',0,'callback'), //函数验证
		//array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
		//array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
		//array('password','checkPwd','密码格式不正确',0,'callback'), // 自定义函数验证密码格式
	);

	 function upload_file(){
		import('ORG.Net.UploadFile'); //引入，文件上传的类
		$upload = new \UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/nav/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			return "";
		}else{// 上传成功
			$info = $upload->getUploadFileInfo();
			return $upload->savePath.$info[0]['savename'];
		}
 	}
 	/*
 	 * @name get_all_parent  获取所有父导航
 	 * @param $cid  导航id
 	 */
	public function get_all_parent($cid)
	{
		$data = $this->find($cid);
		if ($data['fid'] != 0){
			$this->get_all_parent($data['fid']);
		}
	}

	/*
	 * @name get_all_nav 获取所有导航
	 * @param $fid 父ID
	 */
	public function get_all_nav($fid)
	{
		$data = $this->where("fid='$fid'")->select();
		if ($data){
			foreach($data as $k => $v)
			{
				$data[$k]['sub_nav'] = $this->get_all_nav($v['cid']);
			}
		}
		return $data;
	}


}
?>



	 