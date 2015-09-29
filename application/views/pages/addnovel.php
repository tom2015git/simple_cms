
<body>

<?php echo $error;?>

<?php echo form_open_multipart('pages/view/upload_novel');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>