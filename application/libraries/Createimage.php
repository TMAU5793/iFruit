<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Createimage {
	public function create($path,$w,$h,$t_w,$t_h){
		$path_info = pathinfo($path);
		$extention=$path_info['extension'];
		$filename=$path_info['basename'];
	
		$filesize =$path;
		list($width, $height) = getimagesize($filesize);
		$x=0;
		$y=0;
		if($width<$w){
			$x=($w-$width)/2;
		}
		if($height<$h){
			$y=($h-$height)/2;
		}
		$imagecontainer = imagecreatetruecolor($w, $h);
		imagesavealpha ($imagecontainer, true);
		$alphacolor	= imagecolorallocatealpha($imagecontainer, 0,0,0,93);
		imagefill($imagecontainer,0,0,$alphacolor);
		if($extention=="jpg"||$extention=="JPEG"||$extention=="JPG"){
			$background = imagecreatefromjpeg($path);
		}
		if($extention=="png"||$extention=="PNG"){
			$background = imagecreatefrompng($path);
		}
		imagecopyresampled($imagecontainer, $background, $x, $y, 0, 0, $width, $height, $width, $height);
		
		if(imagepng($imagecontainer,$path)){
			imagedestroy($imagecontainer);
			$this->createThumb($path,$t_w,$t_h);
		}
		
	}
	public function createThumb($path,$w,$h){
		$CI =& get_instance();

		$CI->load->library('image_lib');
		$path_info = pathinfo($path);
		$extention=$path_info['extension'];
		$filename=$path_info['basename'];
		$thumb_cf=array(
		'image_library' => 'gd2',
		'source_image' =>$path,
		'create_thumb' =>TRUE,
		'maintain_ratio' => TRUE,
		'master_dim' => 'width',
		'width' =>$w,
		'height' => $h,
		'new_image'=>str_replace(".".$extention,"-thumb.".$extention,$path)
		);
		$CI->image_lib->initialize($thumb_cf);
		if(!$CI->image_lib->resize())
		{ 
			echo $path;
			echo $CI->image_lib->display_errors();
		}
	}

	public function createlarg($path,$w,$h){
		$path_info = pathinfo($path);
		$extention=$path_info['extension'];
		$filename=$path_info['basename'];
	
		$filesize =$path;
		list($width, $height) = getimagesize($filesize);
		$x=0;
		$y=0;
		if($width<$w){
			$x=($w-$width)/2;
		}
		if($height<$h){
			$y=($h-$height)/2;
		}
		$imagecontainer = imagecreatetruecolor($w, $h);
		imagesavealpha ($imagecontainer, true);
		$alphacolor	= imagecolorallocatealpha($imagecontainer, 0,0,0,93);
		imagefill($imagecontainer,0,0,$alphacolor);
		if($extention=="jpg"||$extention=="JPEG"||$extention=="JPG"){
			$background = imagecreatefromjpeg($path);
		}
		if($extention=="png"||$extention=="PNG"){
			$background = imagecreatefrompng($path);
		}
		imagecopyresampled($imagecontainer, $background, $x, $y, 0, 0, $width, $height, $width, $height);
		imagepng($imagecontainer,$path);
		imagedestroy($imagecontainer);
		
	}
	public function createlargNobg($path,$w,$h){
		$path_info = pathinfo($path);
		$extention=$path_info['extension'];
		$filename=$path_info['basename'];
	
		$filesize =$path;
		list($width, $height) = getimagesize($filesize);
		$x=0;
		$y=0;
		if($width<$w){
			$x=($w-$width)/2;
		}
		if($height<$h){
			$y=($h-$height)/2;
		}
		$imagecontainer = imagecreatetruecolor($w, $h);
		imagesavealpha ($imagecontainer, true);
		$alphacolor	= imagecolorallocatealpha($imagecontainer, 0,0,0,127);
		imagefill($imagecontainer,0,0,$alphacolor);
		if($extention=="jpg"||$extention=="JPEG"||$extention=="JPG"){
			$background = imagecreatefromjpeg($path);
		}
		if($extention=="png"||$extention=="PNG"){
			$background = imagecreatefrompng($path);
		}
		imagecopyresampled($imagecontainer, $background, $x, $y, 0, 0, $width, $height, $width, $height);
		imagepng($imagecontainer,$path);
		imagedestroy($imagecontainer);
		
	}
}
?>