
<body role="document">

<nav class="navbar navbar-inverse navbar-static-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">

<li class="active"><a href=<?php echo base_url('index.php/pages/view/home')?>>主页</a></li>
<!--li class="active"><a href="http://localhost/simplealbum/index.php/pages/view/novel">小说</a></li-->
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">小说<span class="caret"></span></a>
<ul class="dropdown-menu">

<?php 
foreach ($novelname as $item){
	$linkurl=base_url('index.php/pages/view/novel/'.$item);
	//echo "<li><a href=\"http://localhost/simplealbum/index.php/pages/view/novel/$item\">$item</a></li>";
	echo "<li><a href=$linkurl>$item</a></li>";
}
?>

<!--li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li-->
</ul>
</li>
<li><a href=<?php echo base_url('index.php/md/log_list')?>>日志</a></li>
<li><a href=<?php echo base_url('index.php/pages/view/shutdown')?>>About</a></li>
<li><a href="#contact">Contact</a></li>
</ul>
</div>
</div>
</nav>

 <div class="container theme-showcase" role="main">

<div class="page-header">
<h1>光影记录</h1>

</div>

<p>
<!--button type="button" class="btn btn-lg btn-primary" onClick="location.href=('http://localhost/simplealbum/index.php/pages/view/addalbum')">新增相册</button-->
<button type="button" class="btn btn-lg btn-primary" onClick="location.href=('<?php echo base_url('index.php/pages/view/addalbum')?>')">新增相册</button>
</p>

<div class="row">
<?php foreach ($album as $item):?>
<div class="col-md-4">

<?php 
 $dirName=dirname($item);
 $linkUrl=base_url('index.php/pages/view/Pictures/'.$dirName);
 
 if(strpos($item,"albumdefault")===false){
	$item=base_url($item);
 
 $content="<a href=$linkUrl><img src=\"$item\" border=\"0\" width=\"300\"/></a>";
 }
 else
 {
 $defaultImage=base_url('application/models/simple_album/'.basename($item));
 
 //echo $defaultImage;
 
 $content="<a href=$linkUrl><img src=\"$defaultImage\" border=\"0\" width=\"300\"/></a>";
 }
 
 $real_name=$this->common->get_basename(dirname($dirName));
 echo $content;
?>
 
<br></br>
<?php echo $real_name;?>
<br></br>
<br></br>
</div>
<?php endforeach;?>

</div>
</div> 
</body>