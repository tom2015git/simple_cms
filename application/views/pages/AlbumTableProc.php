<?php 

//防止js alert中文乱码
header("Content-Type:text/html; charset=utf-8");

$newAlbum='application\models\simple_album'.DIRECTORY_SEPARATOR.$_POST['albumname'];

$newAlbum=iconv('utf-8', 'gb2312', $newAlbum);

if (!file_exists($newAlbum))
{ 	mkdir ($newAlbum); 

	if(!file_exists($newAlbum.'/thumbs'))
	{
		mkdir ($newAlbum.'/thumbs');
		
		echo "<script>alert('相册创建成功')</script>";
	}
} 
else 
{
	echo "<script>alert('相册已经存在')</script>";
}

//echo "<script language=\"javascript\">window.location= \"http://localhost/simplealbum/index.php/pages/view/home \";</script>";

$mainpage=base_url('index.php/pages/view/home');

echo "<script language=\"javascript\">window.location= \"{$mainpage}\";</script>";

?>