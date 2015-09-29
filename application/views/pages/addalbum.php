
<body>
<!--form action="http://localhost/simplealbum/index.php/pages/view/AlbumTableProc" method="post" enctype="multipart/form-data"-->
<form action=<?php echo base_url('index.php/pages/view/AlbumTableProc')?> method="post" enctype="multipart/form-data">
<table>
<tr>
<td>album name</td>
<td><input type="text" name="albumname"/></td>
</tr>
<tr>
<td colspan="2" style="text-align:center;">
<input type="submit" name="submit" />
</td>
</tr>
</table>
</form>

</body>