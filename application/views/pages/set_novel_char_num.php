<body>

<?php echo validation_errors(); ?>

<?php echo form_open('pages/view/generate_char_num'); ?>

<input type="hidden" name="name" value=<?php echo $novelname?> size="50" />

<h5>每页字数</h5>
<input type="text" name="charnum" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
