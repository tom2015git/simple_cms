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
<!--li class="active"><a href="http://localhost/simplealbum/index.php/pages/view/home">主页</a></li-->
<li class="active"><a href=<?php echo base_url('index.php/pages/view/home')?>>主页</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
</ul>
</div>
</div>
</nav>

<div class="container theme-showcase" role="main">

<p>
<!--button type="button" class="btn btn-lg btn-primary" onClick="location.href=('http://localhost/simplealbum/index.php/pages/view/addnovel')">添加小说</button-->
<button type="button" class="btn btn-lg btn-primary" onClick="location.href=('<?php echo base_url('index.php/pages/view/addnovel')?>')">添加小说</button>
<button type="button" class="btn btn-lg btn-primary" onClick="location.href=('<?php echo base_url('index.php/pages/view/set_novel_char_num/'.$title)?>')">设置文章字数</button>
</p>

<!--form class="form-horizontal" role="form">
<div class="form-group">
		<div class="col-sm-1">
		<label for="charnum" class="control-label">每页字数</label>
		</div>
		<div class="col-sm-1">
		<input class="form-control" id="charnum"  placeholder="输入每页字数"/>
		</div>
		<div class="col-sm-1">
		<button type="submit" class="btn btn-default">提交</button>
		</div>
		</div>
</form-->

<p>
<?php
	foreach ($content as $line){
		echo $line.'<br/>';
}

	//echo $content;
 
?>

</p>

<?php echo $this->pagination->create_links(); ?>
</div>
</body>
