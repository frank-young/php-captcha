<?php 
	session_start();
	$image = imagecreatetruecolor(100, 30);//底图  black
	$bgcolor = imagecolorallocate($image, 255, 255, 255);//创建颜色
	imagefill($image,0,0,$bgcolor);//将背景颜色填进图像   区域填充
	$captch_code="";
	for($i = 0;$i<4;$i++){ 
		$fontsize = 6;
		$fontcolor = imagecolorallocate($image, rand(1,120), rand(1,120), rand(1,120));
		$data = 'abcdefghijkmnpqrstuvwxy3456789';//去掉了像1，l 2,z, o 0 等不好识别的字母
		$fonttext = substr($data,rand(0,strlen($data)),1);
		$captch_code .= $fonttext;
		$x = ($i*100/4)+rand(5,10);
		$y = rand(5,10);
		imagestring($image, $fontsize, $x, $y, $fonttext, $fontcolor);
	}
	$_SESSION['authcode'] = $captch_code;

	/*干扰点*/
	for($i=0;$i<200;$i++){ 
		$pointcolor = imagecolorallocate($image,  rand(50,120), rand(50,120),  rand(50,120));//干扰点的颜色
		imagesetpixel($image, rand(0,100), rand(0,30), $pointcolor);//画一个单一像素
	}
	/*干扰线*/
	for($i = 0; $i<3;$i++){ 
		$linecolor = imagecolorallocate($image,  rand(80,220), rand(80,220),rand(80,220));//干扰线的颜色
		imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);//画一条线段
	}


	header('content-type:image/png');//输出内容格式，输出图像前一定要输出header
	imagepng($image);//将$image输出，输出图像
	imagedestroy($image);//销毁图像
