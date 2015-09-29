<body style="font: 13px Verdana">

<h1>请选择文件</h1>

<div id="filelist"></div>
<br />

<div id="container">
<a id="pickfiles" href="javascript:;">[Select files]</a>
<a id="uploadfiles" href="javascript:;">[Upload files]</a>
</div>
<br />
<pre id="console"></pre>

<!--必须在这里将传入的变量进行赋值，否则js无法看到这些变量 -->
<?php $albumdir_local=$albumdir?>
<?php $albumdir11_local=$albumdir11;?>
<?php $pro_url=base_url('application/views/pages/upload.php?dir='.$albumdir11_local)?>
<?php $flase_url=base_url('application/libraries/plupload-2.1.3/js/Moxie.swf')?>
<?php $silverlight_url=base_url('application/libraries/plupload-2.1.3/js/Moxie.xap')?>
<?php $redirect_url=base_url('index.php/pages/view/Pictures/'.$albumdir_local.'/thumbs')?>

<script type="text/javascript">

var uploader = new plupload.Uploader({
runtimes : 'html5,flash,silverlight,html4',
browse_button : 'pickfiles', 
container: document.getElementById('container'), 
//url : 'http://localhost/simplealbum/application/views/pages/upload.php?dir=<?php echo $albumdir11_local?>',
url : '<?php echo $pro_url?>',

//flash_swf_url : 'http://localhost/simplealbum/application/libraries/plupload-2.1.3/js/Moxie.swf',
//silverlight_xap_url : 'http://localhost/simplealbum/application/libraries/plupload-2.1.3/js/Moxie.xap',
 
flash_swf_url : '<?php echo $flase_url?>',
silverlight_xap_url : '<?php echo $silverlight_url?>',
 
filters : {
max_file_size : '10mb',
mime_types: [
{title : "Image files", extensions : "jpg,gif,png"},
{title : "Zip files", extensions : "zip"}
]
},

init: {
PostInit: function() {
document.getElementById('filelist').innerHTML = '';

document.getElementById('uploadfiles').onclick = function() {
uploader.start();
return false;
};
},

FilesAdded: function(up, files) {
plupload.each(files, function(file) {
document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
})
},

UploadProgress: function(up, file) {
document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + '%</span>';
},

UploadComplete: function (uploader,files) {
//window.location.href='http://localhost/simplealbum/index.php/pages/view/Pictures/<?php echo $albumdir_local?>/thumbs';
window.location.href='<?php echo $redirect_url?>';
},

Error: function(up, err) {
document.getElementById('console').innerHTML += "Error" + err.code + ": " + err.message;
}
}
});

uploader.init();

</script>
</body>                                                                                                                                                     