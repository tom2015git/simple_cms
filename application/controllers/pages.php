<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {

/* public function home()
{
	if ( ! file_exists(APPPATH.'/views/pages/home.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"$page\");</script>";
	
	$this->load->library('common');

	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$dir="application/models/simple_album";
	$album=$this->common->myScandir($dir);
	$dir="application/models/novel/";
	$novelname=$this->common->get_novel_name($dir);
	$bodydata['album'] = $album;
	$bodydata['novelname'] = $novelname;
	
	$this->load->view('pages/home', $bodydata);
	$this->load->view('templates/footer'); 
}

public function Pictures()
{
	if ( ! file_exists(APPPATH.'/views/pages/Pictures.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
		
	$albumDir=urldecode($this->uri->uri_string());
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumDir}\");</script>";
	$albumDir=substr($albumDir,strpos($albumDir,"application"));
	
	$images=$this->common->getImages($albumDir);
	$dir=dirname($albumDir);
	$title=$this->common->get_basename($dir);
	$bodydata['dir'] = $dir;
	$bodydata['images'] = $images;
	$bodydata['title'] = $title;
	
	$this->load->view('pages/Pictures', $bodydata);
	$this->load->view('templates/footer'); 
}

public function PicturesManage()
{
	if ( ! file_exists(APPPATH.'/views/pages/PicturesManage.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$albumdir=urldecode($this->uri->uri_string());
	$albumdir=substr($albumdir,strpos($albumdir,"application"));
	$albumdir11=urlencode($albumdir);
	$bodydata['albumdir'] = $albumdir;
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumdir}\");</script>";
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumdir11}\");</script>";
	$bodydata['albumdir11'] = $albumdir11;
	
	$this->load->view('pages/PicturesManage', $bodydata);
	$this->load->view('templates/footer'); 
}

public function upload()
{
	if ( ! file_exists(APPPATH.'/views/pages/upload.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$this->load->view('pages/upload', $bodydata);
	$this->load->view('templates/footer'); 
}

public function novel()
{
、if ( ! file_exists(APPPATH.'/views/pages/novel.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	// $filename = "application/models/novel/config.txt";
	// $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
	
	// //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
	// $content = fread($handle, filesize ($filename));
	// fclose($handle);
	$novel_name=$this->uri->segment(4);
	
	$file = file(base_url("application/models/novel/$novel_name/config.txt"));
	foreach($file as &$line) $pagenum=$line;
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$this->config->item('novel_length')}\");</script>";
	$this->load->library('pagination');
	
	//$config['base_url'] = 'http://192.168.1.108/simplealbum/index.php/pages/view/novel/'.$novel_name.'/';
	$config['base_url'] = base_url('index.php/pages/view/novel/'.$novel_name.'/');
	$config['total_rows'] = $pagenum;
	//$config['per_page'] = 1; 
	$config['num_links'] = 10;
	$config['use_page_numbers'] = TRUE;
	$config['first_link'] = '首页';
	$config['last_link'] = '尾页';
	//$config['full_tag_open'] = '<p>';
	//$config['full_tag_close'] = '</p>'; 
	
	//下面是一个参数列表，你可以通过初始化方法来定制你喜欢的显示效果。
 

	$config['full_tag_open'] = '<ul class="pagination">';
	//把打开的标签放在所有结果的左侧。
	
	$config['full_tag_close'] = '</ul>';
	//把关闭的标签放在所有结果的右侧。
	
	//自定义起始链接
	
	//$config['first_link'] = '第一页';
	//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
	
	$config['first_tag_open'] = '<li>';
	//“第一页”链接的打开标签。
	
	$config['first_tag_close'] = '</li>';
	//“第一页”链接的关闭标签。
	
	//自定义结束链接
	
	//$config['last_link'] = '最后一页';
	//你希望在分页的右边显示“最后一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
	
	$config['last_tag_open'] = '<li>';
	//“最后一页”链接的打开标签。
	
	$config['last_tag_close'] = '</li>';
	//“最后一页”链接的关闭标签。
	
	//自定义“下一页”链接
	
	$config['next_link'] = '>';
	//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
	
	$config['next_tag_open'] = '<li>';
	//“下一页”链接的打开标签。
	
	$config['next_tag_close'] = '</li>';
	//“下一页”链接的关闭标签。
	
	//自定义“上一页”链接
	
	$config['prev_link'] = '<';
	//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
	
	$config['prev_tag_open'] = '<li>';
	//“上一页”链接的打开标签。
	
	$config['prev_tag_close'] = '</li>';
	//“上一页”链接的关闭标签。
	
	//自定义“当前页”链接
	
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	//“当前页”链接的打开标签。
	
	$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
	//“当前页”链接的关闭标签。
	
	//自定义“数字”链接
	
	$config['num_tag_open'] = '<li>';
	//“数字”链接的打开标签。
	
	$config['num_tag_close'] = '</li>';

	$this->pagination->initialize($config); 
	
	$pageid=$this->uri->segment(5);
	
	if(empty($pageid))
	{
		$fileindex=1;
	}
	else{
		$fileindex=$pageid;
	}
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$fileindex}\");</script>";
	
	//$content = file_get_contents(base_url('application/models/novel/'.$novel_name.'/'.'newfile_'.$fileindex.'.txt')); 
	
	$content=array();
	
	$handle = @fopen(base_url('application/models/novel/'.$novel_name.'/'.'newfile_'.$fileindex.'.txt'), "r");
	if ($handle) {
		while (($buffer = fgets($handle, 4096)) !== false) {
			//echo $buffer;
			//echo "<br/>";
			array_push($content, $buffer);
		}
		if (!feof($handle)) {
			echo "Error: unexpected fgets() fail\n";
		}
		fclose($handle);
	}
	
	//$type1 = mb_detect_encoding($content, array("ASCII","GB2312","GBK","UTF-8")); 
	//$type1 = mb_detect_encoding($content,array('ASCII','GB2312','GBK','UTF-8'));
	//$content=iconv('utf-8', 'gb2312', $content);
	 //$content=mb_convert_encoding($content,"UTF-8","GBK"); 
	
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"{$content}\");</script>";
	
	$bodydata['title']=$novel_name;
	$bodydata['content'] = $content;
	//$bodydata['content']=$this->config->item('novel_content');
	
	$this->load->view('pages/novel', $bodydata);
	$this->load->view('templates/footer'); 
}

public function addnovel()
{
	if ( ! file_exists(APPPATH.'/views/pages/addnovel.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$bodydata['error']='';
	
	$this->load->view('pages/addnovel', $bodydata);
	$this->load->view('templates/footer'); 
}

public function upload_novel()
{
	if ( ! file_exists(APPPATH.'/views/pages/upload_novel.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$upload_path='./application/models/novel/';
	$config['upload_path'] = $upload_path;
	//$config['allowed_types'] = 'gif|jpg|png';
	$config['allowed_types'] = 'txt';
	//$config['max_size'] = '100';
	$config['max_size'] = '2048';
	//$config['max_width']  = '1024';
	//$config['max_height']  = '768';
	
	$this->load->library('upload', $config);
	
	if ( ! $this->upload->do_upload())
	{
	$error =$this->upload->display_errors();
	$bodydata['error']=$error;
	
	} 
	else
	{
		$error =$this->upload->data();
		$filename=$error["file_name"];
		
		$encode = mb_detect_encoding($filename, array('GB2312','UTF-8'));

		if($encode=="GB2312")
		{
		}
		else if($encode=="UTF-8")
		{
			$newfilename=iconv('utf-8', 'gb2312', $filename);
		}
		
		rename($upload_path.$filename,$upload_path.$newfilename);
		$filedirec=str_replace('.txt', '', $newfilename);
		
		if (!file_exists($upload_path.$filedirec))
		{ 	
			mkdir ($upload_path.$filedirec); 
			rename($upload_path.$newfilename,$upload_path.$filedirec.'/'.$newfilename);
		} 
		else 
		{
		}
		
		$this->common->novel_proc($upload_path.$filedirec.'/',$newfilename,1500);
		
		$bodydata['error']=$filename;
	}	
	
	this->load->view('pages/upload_novel', $bodydata);
	$this->load->view('templates/footer'); 
}

public function set_novel_char_num()
{
	if ( ! file_exists(APPPATH.'/views/pages/set_novel_char_num.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$bodydata['novelname']=urldecode($this->uri->segment(4));
	
	$this->load->view('pages/set_novel_char_num', $bodydata);
	$this->load->view('templates/footer'); 
}

public function generate_char_num()
{
	if ( ! file_exists(APPPATH.'/views/pages/generate_char_num.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
		
	$this->load->library('common');
	$this->load->helper('url');
	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	$upload_path='./application/models/novel/';
	$novelname=$this->input->post('name');
	$charnum=$this->input->post('charnum');
	
	$this->common->novel_proc($upload_path.$novelname.'/',$novelname.'.txt',$charnum);
	$bodydata['novelname']=$novelname;
	
	$this->load->view('pages/generate_char_num', $bodydata);
	$this->load->view('templates/footer'); 
}
 */
 
public function view($page = 'init')
{
	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
	$this->load->helper('url');
	$this->load->helper('file');
	$this->load->helper('form');
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"$page\");</script>";
	
	$this->load->library('common');

	$this->load->view('templates/header');	
    
	$bodydata ='';
	
	//echo "<script LANGUAGE='JavaScript'>alert(\"abc\");</script>";
	// if($page === 'init')
	// {
		// $filename = "application/models/novel/test.txt";
		// $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
		
		// //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
		// $content = fread($handle, filesize ($filename));
		// fclose($handle);
		
		// $AllNum = mb_strlen($content,'utf8');
		// $num=100;
		// $pagenum=$AllNum/$num;
		// $this->config->set_item('novel_length',$pagenum );
		// $this->config->set_item('novel_content',$content );
		
		// echo "<script LANGUAGE='JavaScript'>alert(\"{$this->config->item('novel_length')}\");</script>";
	// }
	if($page === 'home')
	{
		$dir="application/models/simple_album";
		$album=$this->common->myScandir($dir);
		$dir="application/models/novel/";
		$novelname=$this->common->get_novel_name($dir);
		$bodydata['album'] = $album;
		$bodydata['novelname'] = $novelname;
	}
	else if($page === 'Pictures')
	{
		$albumDir=urldecode($this->uri->uri_string());
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumDir}\");</script>";
		$albumDir=substr($albumDir,strpos($albumDir,"application"));
		
		$images=$this->common->getImages($albumDir);
		$dir=dirname($albumDir);
		$title=$this->common->get_basename($dir);
		$bodydata['dir'] = $dir;
		$bodydata['images'] = $images;
		
		$bodydata['title'] = $title;
	}
	else if($page==='PicturesManage')
	{
		$albumdir=urldecode($this->uri->uri_string());
		$albumdir=substr($albumdir,strpos($albumdir,"application"));
		$albumdir11=urlencode($albumdir);
		$bodydata['albumdir'] = $albumdir;
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumdir}\");</script>";
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$albumdir11}\");</script>";
		$bodydata['albumdir11'] = $albumdir11;
	}
	else if($page==='upload')
	{
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$page}\");</script>";
	}
	else if($page==='novel')
	{
		// $filename = "application/models/novel/config.txt";
		// $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
		
		// //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
		// $content = fread($handle, filesize ($filename));
		// fclose($handle);
		$novel_name=$this->uri->segment(4);
		
		$file = file(base_url("application/models/novel/$novel_name/config.txt"));
		foreach($file as &$line) $pagenum=$line;
		
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$this->config->item('novel_length')}\");</script>";
		$this->load->library('pagination');
		
		//$config['base_url'] = 'http://192.168.1.108/simplealbum/index.php/pages/view/novel/'.$novel_name.'/';
		$config['base_url'] = base_url('index.php/pages/view/novel/'.$novel_name.'/');
		$config['total_rows'] = $pagenum;
		//$config['per_page'] = 1; 
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		//$config['full_tag_open'] = '<p>';
		//$config['full_tag_close'] = '</p>'; 
		
		//下面是一个参数列表，你可以通过初始化方法来定制你喜欢的显示效果。
 

		$config['full_tag_open'] = '<ul class="pagination">';
		//把打开的标签放在所有结果的左侧。
		
		$config['full_tag_close'] = '</ul>';
		//把关闭的标签放在所有结果的右侧。
		
		//自定义起始链接
		
		//$config['first_link'] = '第一页';
		//你希望在分页的左边显示“第一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
		
		$config['first_tag_open'] = '<li>';
		//“第一页”链接的打开标签。
		
		$config['first_tag_close'] = '</li>';
		//“第一页”链接的关闭标签。
		
		//自定义结束链接
		
		//$config['last_link'] = '最后一页';
		//你希望在分页的右边显示“最后一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
		
		$config['last_tag_open'] = '<li>';
		//“最后一页”链接的打开标签。
		
		$config['last_tag_close'] = '</li>';
		//“最后一页”链接的关闭标签。
		
		//自定义“下一页”链接
		
		$config['next_link'] = '>';
		//你希望在分页中显示“下一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
		
		$config['next_tag_open'] = '<li>';
		//“下一页”链接的打开标签。
		
		$config['next_tag_close'] = '</li>';
		//“下一页”链接的关闭标签。
		
		//自定义“上一页”链接
		
		$config['prev_link'] = '<';
		//你希望在分页中显示“上一页”链接的名字。如果你不希望显示，可以把它的值设为 false 。
		
		$config['prev_tag_open'] = '<li>';
		//“上一页”链接的打开标签。
		
		$config['prev_tag_close'] = '</li>';
		//“上一页”链接的关闭标签。
		
		//自定义“当前页”链接
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		//“当前页”链接的打开标签。
		
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		//“当前页”链接的关闭标签。
		
		//自定义“数字”链接
		
		$config['num_tag_open'] = '<li>';
		//“数字”链接的打开标签。
		
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config); 
		
		$pageid=$this->uri->segment(5);
		
		if(empty($pageid))
		{
			$fileindex=1;
		}
		else{
			$fileindex=$pageid;
		}
		
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$fileindex}\");</script>";
		
		//$content = file_get_contents(base_url('application/models/novel/'.$novel_name.'/'.'newfile_'.$fileindex.'.txt')); 
		
		$content=array();
		
		$handle = @fopen(base_url('application/models/novel/'.$novel_name.'/'.'newfile_'.$fileindex.'.txt'), "r");
		if ($handle) {
			while (($buffer = fgets($handle, 4096)) !== false) {
				//echo $buffer;
				//echo "<br/>";
				array_push($content, $buffer);
			}
			if (!feof($handle)) {
				echo "Error: unexpected fgets() fail\n";
			}
			fclose($handle);
		}
		
		//$type1 = mb_detect_encoding($content, array("ASCII","GB2312","GBK","UTF-8")); 
		//$type1 = mb_detect_encoding($content,array('ASCII','GB2312','GBK','UTF-8'));
		//$content=iconv('utf-8', 'gb2312', $content);
		 //$content=mb_convert_encoding($content,"UTF-8","GBK"); 
	
	
		//echo "<script LANGUAGE='JavaScript'>alert(\"{$content}\");</script>";
	
		$bodydata['title']=$novel_name;
		$bodydata['content'] = $content;
		//$bodydata['content']=$this->config->item('novel_content');
	}
	else if($page==='addnovel')
	{
		$bodydata['error']='';
	}
	else if($page==='upload_novel')
	{
		$upload_path='./application/models/novel/';
		$config['upload_path'] = $upload_path;
		//$config['allowed_types'] = 'gif|jpg|png';
		$config['allowed_types'] = 'txt';
		//$config['max_size'] = '100';
		$config['max_size'] = '2048';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
		$error =$this->upload->display_errors();
		$bodydata['error']=$error;
		
		} 
		else
		{
			$error =$this->upload->data();
			$filename=$error["file_name"];
			
			$encode = mb_detect_encoding($filename, array('GB2312','UTF-8'));

			if($encode=="GB2312")
			{
			}
			else if($encode=="UTF-8")
			{
				$newfilename=iconv('utf-8', 'gb2312', $filename);
			}
			
			rename($upload_path.$filename,$upload_path.$newfilename);
			$filedirec=str_replace('.txt', '', $newfilename);
			
			if (!file_exists($upload_path.$filedirec))
			{ 	
				mkdir ($upload_path.$filedirec); 
				rename($upload_path.$newfilename,$upload_path.$filedirec.'/'.$newfilename);
			} 
			else 
			{
			}
			
			$this->common->novel_proc($upload_path.$filedirec.'/',$newfilename,1500);
			
			$bodydata['error']=$filename;
		}	 
	}
	else if($page==='set_novel_char_num')
	{
		$bodydata['novelname']=urldecode($this->uri->segment(4));
	}
	else if($page==='generate_char_num')
	{
		$upload_path='./application/models/novel/';
		$novelname=$this->input->post('name');
		$charnum=$this->input->post('charnum');
		
		$this->common->novel_proc($upload_path.$novelname.'/',$novelname.'.txt',$charnum);
		$bodydata['novelname']=$novelname;
	}
	
	$this->load->view('pages/'.$page, $bodydata);
	$this->load->view('templates/footer'); 
}


 
}


