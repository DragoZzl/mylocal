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

	    <div class="con_r fr productMain">
	     <div class="productMain-A  clear">
	     	<div class="left fl pr">
				<ul class="rslides" id="slider3" style="height:370px">
                    <?php if(gettype($this_product_big) == 'array'): if(is_array($this_product_big)): $k = 0; $__LIST__ = $this_product_big;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li><a href="#"><img src="<?php echo ($v); ?>"  alt=""></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                            <li><a href="#"><img src="<?php echo ($this_product_big); ?>"  alt=""></a></li><?php endif; ?>
				</ul>
				<div class="lunb-zzc pa">
				</div>
				<ul id="slider3-pager" class="swiper-custompage pa">
                    <?php if(gettype($this_product_small) == 'array'): if(is_array($this_product_small)): $k = 0; $__LIST__ = $this_product_small;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li class="fl"><a href="javascript:;"><img src="<?php echo ($v); ?>"   alt=""></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                        <li class="fl"><a href="javascript:;"><img src="<?php echo ($this_product_small); ?>"   alt=""></a></li><?php endif; ?>
				</ul>
	     	</div>
			<div class="right fr">
				<div class="title">
					<p class="p1"><?php echo ($this_product["0"]["title"]); ?></p>
					<p class="p2"><?php echo ($this_product["0"]["etitle"]); ?></p>
				</div>
				<p class="wen-main pb-10">
					<?php echo ($this_product["0"]["desc"]); ?>
				</p>
				<p> 
				<a class="dingg-a db tc">我要订购</a>
				</p>
				<div  class="clear">
					<span class="fenx-msg fl mr-5">分享给好友</span>
						
					<div class=" fl bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				</div>
				<p class="line20">全国客服热线:
					<span class='ml-5'>400-888-888</span>
				</p>
			</div>
	     </div>
	      <div class="productMain-B line20">
	      	<h3 class="product-h3 pr "><span class="tc">产品详情</span></h3>
			<?php echo (htmlspecialchars_decode($this_product["0"]["content"])); ?>
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