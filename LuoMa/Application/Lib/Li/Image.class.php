<?php 
	namespace Lib\Li;
	class Image{
		function get_thumb($filename,$width,$height,$sy=0){
			if (!file_exists($filename)){
				die("原图不存在");
			}
			$arr = getimagesize ($filename);

			$exts = array(
				IMG_GIF	=> 'gid',
				IMG_JPG	=> 'jpg',
				IMG_JPEG	=> 'jpg',
				IMG_PNG	=> 'png',
				3		=> 'png',
			);
			$new_name = "Public/Uploads/product/".md5($filename)."-{$width}x{$height}.{$exts[$arr[2]]}";
			if (file_exists($new_name)){
				return $new_name;
			}
			//$arr[0] 宽度  $arr[1] 高度 $arr[2] 类型
			//header("Content-Type:{$arr['mime']}");

			$open_funcs = array(
				IMG_GIF	=> 'imagecreatefromgif',
				IMG_JPG	=> 'imagecreatefromjpeg',
				IMG_JPEG	=> 'imagecreatefromjpeg',
				IMG_PNG	=> 'imagecreatefrompng',
				3		=> 'imagecreatefrompng',
			);
			$display_funcs = array(
				IMG_GIF	=> 'imagegif',
				IMG_JPG	=> 'imagejpeg',
				IMG_JPEG	=> 'imagejpeg',
				IMG_PNG	=> 'imagepng',
				3		=> 'imagepng',
			);
			$im = $open_funcs[$arr[2]]($filename);
			$nim = imagecreatetruecolor($width,$height);

			$w = $arr[0];
			$h = $arr[1];
			if ($w >= $h){
				$nh = min($height,$h);
				$nw = $w / $h * $nh;
			}else{
				$nw = min($width,$w);
				$nh = $h / $w * $nw;
			}
			$x = ($width-$nw)/2;
			$y = ($height-$nh)/2;


			imagecopyresampled ($nim, $im, $x ,$y, 0,0, $nw, $nh, $arr[0], $arr[1] );
			if ($sy){
				$im = imagecreatefrompng("./sy.png");
				imagecopyresampled ($nim, $im, $width-129,$height-50, 0,0, 129, 50, 129, 50);
			}

			$display_funcs[$arr[2]]($nim,$new_name);
			return '/'.$new_name;
		}

	}
 ?>