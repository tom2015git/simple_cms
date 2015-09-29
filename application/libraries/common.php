<?php
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class common {

public function wp_is_mobile() {
	static $is_mobile;

	if ( isset($is_mobile) )
		return $is_mobile;

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}

	return $is_mobile;
}

public function getImages($dir)
{
	$encode = mb_detect_encoding($dir, array('GB2312','UTF-8'));

	if($encode=="GB2312")
	{
	}
	else if($encode=="UTF-8")
	{
		$dir=iconv('utf-8', 'gb2312', $dir);
	}
	
	$images = array();
	if ( $handle = opendir($dir) ) {
		while ( ($file = readdir($handle)) !== false )
		{
			if ( $file != ".." && $file != "." )
			{
				if ( is_dir($dir . "/" . $file) )
				{
				}
				else
				{
					//echo "<script LANGUAGE='JavaScript'>alert(\"{$dir}\");</script>";
					array_push($images, iconv('gb2312','utf-8',  $dir . "/" .$file));
				}
			}
		}
		closedir($handle);
	
		return $images;
	}
}

public function getFirstImage($dir)
{
$encode = mb_detect_encoding($dir, array('GB2312','UTF-8'));

	if($encode=="GB2312")
	{
	}
	else if($encode=="UTF-8")
	{
		$dir=iconv('utf-8', 'gb2312', $dir);
	}
	
//	$dirs = array();
	$dir=$dir.'/thumbs';
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$dir}\");</script>";
	
	if ( $handle = opendir($dir) ) {
		while ( ($file = readdir($handle)) !== false )
		{
			$file=iconv("gb2312","utf-8",$file);
			
			if ( $file != ".." && $file != "." )
			{
				if ( is_dir($dir . "/" . $file) )
				{
					//$files[$file] = my_scandir($dir . "/" . $file);
					//$dirs[] = $file;
				}
				else
				{
					//$files[] = $file;
					break;
				}
			}
		}
		closedir($handle);
		
		$filePath=$dir . "/" . $file;
		
		if($file==null)
		{
			$defaultImage="albumdefault.jpg";
			return iconv("gb2312","utf-8",$dir . "/".$defaultImage);
		}
		
		//php遍历文件夹，中文名乱码
		$filePath=iconv("gb2312","utf-8",$filePath);
		
		return $filePath;
	}
}

public function get_novel_name($dir)
{
	$encode = mb_detect_encoding($dir, array('GB2312','UTF-8'));

	if($encode=="GB2312")
	{
	}
	else if($encode=="UTF-8")
	{
		$dir=iconv('utf-8', 'gb2312', $dir);
	}
	
	 $novel_name = array(); 
	
	if ( $handle = opendir($dir) ) {
		while ( ($file = readdir($handle)) !== false )
		{
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$file}\");</script>";
			//$file=iconv("utf-8","gb2312",$file);
			//echo "<script LANGUAGE='JavaScript'>alert(\"{$file}\");</script>";
		
			if ( $file != ".." && $file != ".")
			{	 
				if ( is_dir($dir.$file) )
				{	
				 $file=iconv("gb2312","utf-8",$file);
					array_push($novel_name, $file);
					
					//echo "<script LANGUAGE='JavaScript'>alert(\"{$file}\");</script>";
				}
				else
				{
				}
			}
		}
		closedir($handle);
		return $novel_name;
	}
}

public function myScandir($dir)
{
$encode = mb_detect_encoding($dir, array('GB2312','UTF-8'));

	if($encode=="GB2312")
	{
	}
	else if($encode=="UTF-8")
	{
		$dir=iconv('utf-8', 'gb2312', $dir);
	}
	
	//$dirs = array();
	 $album = array(); 
	 
	 
   
	if ( $handle = opendir($dir) ) {
		while ( ($file = readdir($handle)) !== false )
		{
			
			
			if ( $file != ".." && $file != ".")
			{
				 $file=$dir . "/" . $file;
				 
				if ( is_dir($file) )
				{
					$firstFilePath=$this->getFirstImage($file);
					
					//echo "<script LANGUAGE='JavaScript'>alert(\"{$firstFilePath}\");</script>";
					
					array_push($album, $firstFilePath);
				}
				else
				{
				}
			}
		}
		closedir($handle);
		return $album;
	}
}

//php自带的basename不支持中文
public function get_basename($filename){    
     return preg_replace('/^.+[\\\\\\/]/', '', $filename);    
 } 

public function generateThumb($image_path)
{	
	 include_once(base_url('application/libraries/easyphpthumbnail/PHP5/easyphpthumbnail.class.php'));
	 $thumb = new easyphpthumbnail;
	 
	 //$image_path=str_replace("\\", "/", $image_path);
	 $image_path=str_replace("\\", "/", './');
	 
	 $dir=dirname($image_path);
	 
	 $thumb -> Thumbheight = 300;
	 $thumb -> Thumbwidth = 300;
	 //$thumb -> Thumblocation = $dir.'/thumbs/';
	 $thumb -> Thumblocation = './';
	 $thumb -> Thumbprefix = 't_';
	 $thumb -> Createthumb($image_path,'file');
}

function convert_gb2312($in_str)
{
	$encode = mb_detect_encoding($in_str, array('GB2312','UTF-8'));

	if($encode=="GB2312")
	{
		return $in_str;
	}
	else if($encode=="UTF-8")
	{
		$out_str=iconv('utf-8', 'gb2312', $in_str);
		return $out_str;
	}
	
	return $in_str;
}

function novel_proc($filepath,$filename,$charnum)
 {
	$filepath=$this->convert_gb2312($filepath);
	$filename=$this->convert_gb2312($filename);
	
    $handle = fopen($filepath.$filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
    //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
    $content = fread($handle, filesize ($filepath.$filename));
    fclose($handle);
	
	$AllNum = mb_strlen($content,'utf8');
	
	
	//echo $AllNum;
	
	//echo "<br></br>";
	
	$array=array();
	$i=0;
	$num=$charnum;//默认为1500
	$filenum=ceil($AllNum/$num);
	$file1 = $filepath.'config.txt';
	$fp = fopen($file1, 'w');
	fwrite($fp, $filenum);
	fclose($fp);
	
	for ($i;$i<$filenum;$i++){
 
	$start=$num*$i;
	
	
	$array[$i] = mb_substr($content,$start,$num,'utf8');
	
	$file1 = $filepath.'newfile_'.($i+1).'.txt';
	$fp = fopen($file1, 'w');
	fwrite($fp, $array[$i]);
	fclose($fp);
	
	//echo $array[$i];
	//echo "<br></br>";
	}
 }
}