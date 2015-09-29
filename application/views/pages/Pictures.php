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
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
</ul>
</div>
</div>
</nav>


<div class="container theme-showcase" role="main">

<div class="page-header">
<h1><?php echo $title?></h1>
</div>

<p>
<!--button type="button" class="btn btn-lg btn-primary" style="margin: 5px" onClick="location.href=('http://localhost/simplealbum/index.php/pages/view/PicturesManage/<?php echo $dir?>')">相册管理</button-->
<button type="button" class="btn btn-lg btn-primary" style="margin: 5px" onClick="location.href=('<?php echo base_url('index.php/pages/view/PicturesManage/'.$dir)?>')">相册管理</button>
</p>

<?php
$imagesAllCount=count($images);

echo "<div class=\"row\">";

$i=0;
while($i<$imagesAllCount)
{
	echo "<div class=\"col-md-4\">";
	$orginal_photo=str_replace("thumbs/t_", "", $images[$i]);
	$orginal_photo=base_url($orginal_photo);
	$images[$i]=base_url($images[$i]);
	$content="<a href=\"$orginal_photo\" data-lightbox=\"album1\" data-title=\"My caption\"><img src=\"$images[$i]\" border=\"0\"/></a>";
	echo $content;
	echo "<br></br>";
	echo "</div>";
	$i++;
}

echo "</div>";

?>

<hr />


</div>

</body>


