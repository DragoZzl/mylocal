<?php
namespace Admin\Model;
use Think\Model;
defined("THINK_VERSION") or die("Access Denied");
class NewsModel extends Model{
		protected $_validata = array(
			array('title','require','请填写新闻标题!'),
			array('desc','require','请填写新闻描述!'),
			array('cid','require',1),
			array("is_show",'require',"请选择是否显示"),
			);
		protected $_auto = array(
			array('time','time',Model::MODEL_BOTH,"function"),
			array('thumb',"upload_file",Model::MODEL_BOTH,"callback"),
			array('content',"content_back",Model::MODEL_BOTH,"callback"),
			);
		function content_back(){
			return I("post.editorValue");
		} 

		function upload_file(){
			import('ORG.Net.UploadFile'); //引入，文件上传的类
			$upload = new \UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/News';// 设置附件上传目录
			if(!$upload->upload()){// 上传错误提示错误信息
				return "";
			}else{// 上传成功
				$info = $upload->getUploadFileInfo();
				return $upload->savePath.$info[0]['savename'];
			}
	 }
	}