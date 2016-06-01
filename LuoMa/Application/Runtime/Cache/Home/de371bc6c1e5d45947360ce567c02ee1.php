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

		<link type="text/css" rel="stylesheet" href="/Public/css/backtotop.css" />
	<script src="/Public/js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
	<script src="/Public/js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
	<script src="/Public/js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
	<!--Include flickerplate-->
	<link href="/Public/css/flickerplate.css"  type="text/css" rel="stylesheet">
	<script src="/Public/js/min/flickerplate.min.js" type="text/javascript"></script>
	<!--Execute flickerplate-->
	<script>
		$(document).ready(function(){
			
			$('.flicker-example').flicker();
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
	
			<div class="banner1">
				<div class="ban_mid">
				<img src="/Public/Images/banner1.jpg" alt="" style="width:1000px;">
				</div>
			</div>

	<div class="con_mid w1000">

			<div class="tt">
	 <p class="fright">
     <a href="/">首页</a><img src="/Public/Images/sanjiao.png" class="mr-5 ml-5">
     <a href="<?php echo U($parent_nav['url']);?>"><?php echo ($parent_nav["name"]); ?></a><img src="/Public/Images/sanjiao.png" class="mr-5 ml-5">
     <a href=""><?php echo ($nav["0"]["name"]); ?></a>
     </p>

	 </div>

	  <div class="con_l fl">
	        	<dl>
	        		<dt><img src="/Public/Images/row.png" alt=""class="mr-5"><?php echo ($parent_nav["name"]); ?><span>&nbsp;&nbsp;/&nbsp;<?php echo ($parent_nav["ename"]); ?></span></dt>
	        		<div class="clearxd"></div>
                    <?php if(is_array($nav)): $k = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><dd <?php if($k==1): ?>class="mr"<?php elseif($k==5): ?>style="border:none;"<?php endif; ?> ><a href="javascript:;"><?php echo ($v["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
	        		<!-- <dd "><a href="javascript:;">电子相册</a></dd> -->
	        	</dl>
	        	<div class="clearxd"></div>
	        	<div class="tu"><a href="<?php echo U('product/main');?>"><img src="/Public/Images/ima2.png" alt=""></a></div>
	        	<div class="tu"><a href="<?php echo U('product/main');?>"><img src="/Public/Images/ima2.png" alt=""></a></div>
	    </div>

	    <div class="con_r fr">
	      <ul class="product-ul clear">
	      	<?php if(is_array($this_product)): $i = 0; $__LIST__ = $this_product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="fl">
	      			<a class="top-img oh pr db" href='<?php echo U("main");?>?id=<?php echo ($v["pid"]); ?>'>
	      				<img src="<?php echo ($v["imgurl"]["0"]); ?>"   alt="">
	      				<span class="more pa tc">MORE</span>
	      			</a>
					<p>
						<a class="title db tc wen-oh" href='<?php echo U("main");?>?id=<?php echo ($v["pid"]); ?>'><?php echo ($v["title"]); ?></a>
					</p>
	      		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	      </ul>  	
	      <div class="page-list">
	      	<?php echo ($page); ?>
	      </div>
	    </div>
	</div>
</div>




<div class="clearxd"></div>

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