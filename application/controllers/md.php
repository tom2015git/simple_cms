<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class md extends CI_Controller {

public function log_list()
{
	if ( ! file_exists(APPPATH.'/views/md/log_list.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
	$this->load->helper('url');
	//$this->load->helper('file');
	//$this->load->helper('form');
	 //$this->load->library('synDirectory-master/config');
	 //$this->load->library('synDirectory-master/synDirectory');

	$this->load->view('templates/mdheader');	
    
	$bodydata ='';

	$this->load->view('md/log_list', $bodydata);
	$this->load->view('templates/mdfooter'); 
}

public function file_proc()
{
	$this->load->library('common');
	$content=$_POST['content'];
	
	$author=$_POST['author'];
	$date=$_POST['date'];
	$title=$_POST['title'];
	$title1=$this->common->convert_gb2312($title);
	$tags=$_POST['tags'];
	$category=$_POST['category'];
	$status=$_POST['status'];
	$summary=$_POST['summary'];
	
	$content_pre="<!--\r\n"."author:".$author."\r\n"."date:".$date."\r\n"."title:".$title."\r\n"."tags:".$tags."\r\n"."category:".$category."\r\n"."status:".$status."\r\n"."summary:".$summary."\r\n"."-->"."\r\n"."\r\n"."\r\n";
	
	//var_dump($title);
	//var_export($title);
	
	$upload_path='../gitblog/blog/';
	//$upload_path='./application/models/md/';
	date_default_timezone_set('Asia/Shanghai');
	//$filename=$upload_path.date("YmdHis").'.md'; 
	$filename=$upload_path.$title1.'.md'; 
	$fp = fopen($filename, 'w');
	fwrite($fp, $content_pre);
	fwrite($fp, $content);
	fclose($fp);
}

public function editmd()
{
	if ( ! file_exists(APPPATH.'/views/md/editmd.php'))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
	$this->load->helper('url');
	$this->load->helper('file');
	$this->load->helper('form');

	$this->load->view('templates/mdheader');	
    
	$bodydata ='';

	$this->load->view('md/editmd', $bodydata);
	$this->load->view('templates/mdfooter'); 
}

// public function view($func)
// {
	// if ( ! file_exists(APPPATH.'/views/md/'.$page.'.php'))
	// {
		// // Whoops, we don't have a page for that!
		// show_404();
	// }
	
	// $this->load->helper('url');
	// $this->load->helper('file');
	// $this->load->helper('form');
	
	// //echo "<script LANGUAGE='JavaScript'>alert(\"$page\");</script>";
	
	// $this->load->library('common');

	// $this->load->view('templates/header');	
    
	// $bodydata ='';
	
	// if($page === 'file_proc')
	// {
		// $name=$_POST['firstName'];
		// mkdir($name);
		// //$bodydata['novelname'] = $novelname;
	// }
	
	// $this->load->view('md/'.$page, $bodydata);
	// $this->load->view('templates/footer'); 
// }


 
}


