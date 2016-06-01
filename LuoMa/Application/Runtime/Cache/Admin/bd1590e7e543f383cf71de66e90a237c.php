<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/Public/admin/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/Public/admin/stylesheets/theme.css">
    <link rel="stylesheet" href="/Public/admin/lib/font-awesome/css/font-awesome.css">

    <script src="/Public/admin/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                
                    <li>
                        <a href="<?php echo U('login/login');?>" role="button">
                        <?php if($_SESSION['user_data']['id']== 0): ?><i class="icon-user"></i> 登陆
                        <?php else: ?>
                             <i class="icon-user"></i> 你好<?php echo ($_SESSION['user_data']['username']); endif; ?>
                        </a>
                    </li>
                    <li><a href="<?php echo U('login/logout');?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
                </ul>
                <a class="brand" href="index.html"><span class="first">Blog</span> <span class="second">Admin</span></a>
        </div>
    </div>
    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>控制面板</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="<?php echo U('index');?>">首页</a></li>
            <li ><a href="<?php echo U('list_nav');?>">导航列表</a></li>
            <li><a href="<?php echo U('add_nav');?>">导航添加</a></li>
            <li><a href="<?php echo U('add_news');?>">新闻添加</a></li>
            <li ><a href="<?php echo U('list_news');?>">新闻列表</a></li>
            <li><a href="<?php echo U('add_product');?>">产品添加</a></li>
            <li><a href="<?php echo U('list_product');?>">产品列表</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
    <script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.all.min.js"> </script>
            <h1 class="page-title">发布文章</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">发布文章</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo U('list_product');?>'"><i class="icon-list"></i> 文章列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo ($data["pid"]); ?>" name="pid"/>
            <label>新闻分类</label>
            <select name="cid" class="input-xlarge">
              <?php echo ($navs); ?>
            </select>
            <label>产品标题</label>
              <input type="text" name="title" value="<?php echo ($data["title"]); ?>" class="input-xxlarge">
            <label>产品描述</label>
              <textarea value="Smith" name="desc" rows="3" class="input-xxlarge"> <?php echo ($data["desc"]); ?>  </textarea>
            <label>产品英文</label>
             <input type="text" name="etitle" value="<?php echo ($data["etitle"]); ?>" class="input-xxlarge"><br/>
             <label>是否展示</label>
             <input type="radio" name="is_show" <?php if(($data["is_show"]) == "1"): ?>checked<?php endif; ?> value="1" class="input-xxlarge" />首页展示
             <input type="radio" name="is_show" <?php if(($data["is_show"]) == "2"): ?>checked<?php endif; ?> value="2" class="input-xxlarge" />首页图文
             <input type="radio" name="is_show" <?php if(($data["is_show"]) == "3"): ?>checked<?php endif; ?> value="3" class="input-xxlarge" />首页轮播
             <input type="radio" name="is_show" <?php if(($data["is_show"]) == "0"): ?>checked<?php endif; ?> value="0" class="input-xxlarge" />否<br/>
             <labei>产品图片 ---<b onclick="moreimg()">添加多图</b></labei>
             <ul id='imgs'> 
               <input type='file' name="thumb[]" class="input-xxlarge"/>
             </ul>
             <script type="text/javascript">
               function moreimg(){
                  var str ='<li><input type="file" name="thumb[]" class="input-xxlarge"/></li>';
                  document.getElementById('imgs').innerHTML += str;
               }
             </script>
            <label>新闻内容</label>
              <script id="editor" type="text/plain" style="width:900px;height:500px;"><?php echo ($data["etitle"]); ?></script>
            <label></label>
              <input class="btn btn-primary" type="submit" value="提交" />
        </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

    <script>
      window.UEDITOR_CONFIG.serverUrl = "/php/controller.php";
      var ue = UE.getEditor('editor');
    </script>

                    

                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="/Public/admin/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>

  </body>
</html>