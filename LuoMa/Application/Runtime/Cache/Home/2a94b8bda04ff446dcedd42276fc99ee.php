<?php if (!defined('THINK_PATH')) exit();?>	<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>罗马国际-首页</title>
	<link href="/Public/Css/base.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Css/main.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Css/lrtk.css" rel="stylesheet" type="text/css" />
	<script src="/Public/js/jquery.min.js"></script>
	<script src="/Public/js/lrtk.js"></script> 

	<link href="/Public/Css/swiper.min.css" rel="stylesheet" />
	<script  src="/Public/js/responsiveslides.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function () {
			$("#slider3").responsiveSlides({	
				pager: true,
				speed: 300,			
			  });	
	  });
	</script>
	
	</head>
<body>
		<a href="#0" class="cd-top">Top</a>
		<div class="header">
		<div class="header_mid">
			<div class="logo fl"><img src="/Public/Images/logo.jpg"/></div>
			<div class="header_r fr pr">
			<span class="c-f f-12 mt-10 t-r fr">全国服务热线：020-84130064 / 400-678-5751</span>
			<ul class="nav fr pa">
			<?php
 $navs = M("category")->where("fid=0")->limit(0,8)->select(); ?>
			<?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($v[url]);?>" class="language-tg" data-title="<?php echo ($v["ename"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div>	
		</div>
	</div>
<!-- 	banner -->

	 <div class="index-lun">
	 	<ul class="rslides" id="slider3">
	 	<?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 轮播图 -->
			<li><a href="<?php echo ($v["url"]); ?>"><img src="<?php echo ($v["thumb"]); ?>" alt=""></a></li><?php endforeach; endif; else: echo "" ;endif; ?>											<!-- 轮播图 -->		
		</ul>
    </div>
	

	<div class="index-con">
		<div class="con_a">
			<div class="con_a_a  w1000  clear">
				<img src="/Public/Images/pro_l.png"/class="fl mt-30 " >
				<h3 class="fl t-c"><i>产品展示</i><br/><span><i>Product  display</i></span></h3>
				<img src="/Public/Images/pro_r.png"/class="fl mt-30">
				
			</div>
<ul class="zhanshi  clear  w1000">
			<?php if(is_array($shows)): $i = 0; $__LIST__ = $shows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 展示图 -->
				<li class="pr">
					<a href="<?php echo U('product/main');?>?id=<?php echo ($v["pid"]); ?>"><img src="<?php echo ($v["imgurl"]["1"]); ?>"/></a>
					<div class="show hover-tg  " >
						<div class="zbc pa">
						</div>
						<span class="ff pa c-f f-16"><?php echo ($v["title"]); ?></span>
						<a href="<?php echo U('product/main');?>?id=<?php echo ($v["pid"]); ?>" class="ee pa c-f">查看产品</a>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>									<!-- 展示图 -->
		</ul>
	</div>
		<div class="con-b">
			<div class="con_a_a  w1000  clear">
				<img src="/Public/Images/pro_l.png"/class="fl mt-30 " >
				<h3 class="fl t-c"><i>新品展示</i><br/><span><i>New features</i></span></h3>
				<img src="/Public/Images/pro_r.png"/class="fl mt-30">
				
			</div>
			<div class="w1000">
				<img src="<?php echo ($banner2["0"]["imgurl"]["0"]); ?>" alt="" />
				<div class="new-main">
					<h3 class="title-h3">
						<img class="fl" src="/Public/Images/row.png" alt="" />
						<span class="fl"><?php echo ($banner2[0]["title"]); ?></span>
					</h3>
					<p>
						<?php echo ($banner2[0]["desc"]); ?>
					</p>
				</div>
			</div>


		</div>
	</div>

    	<div class="footer">
<div class="foot">
         <div class="foot1 foot1_border layout2">
         	<ul class="clear oh">
                <?php
 $navs = M("category")->where("fid=0")->limit(8,8)->select(); ?>
                 <?php if(is_array($navs)): $k = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li>
                       <div class="foot1_s" <?php if($k==5): ?>style="background: none;<?php endif; ?>">
                            <b> <a href="<?php echo ($v["url"]); ?>"><?php echo ($v["name"]); ?> | <?php echo ($v["ename"]); ?> </a></b>
                            <ul>
                            <?php
 $cid = $v['cid']; $son_nav = M("category")->where("fid=$cid")->select(); ?>
                                <?php if(is_array($son_nav)): $i = 0; $__LIST__ = $son_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vv["url"]); ?>"><?php echo ($vv["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                    	</div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
      
         
	</div>
		</div>
		<div class="foot2">
			<p class="t-c ">粤ICP备120860000号     Copyright © 2015 罗马国际 All Rights Reserved  </p>
		</div>
	</div>



    <!-- Swiper JS -->






	
</body>
</html>