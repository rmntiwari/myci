<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo form_open_multipart('upload/imageupload');?>

    <input type="file" name="userfile[]" size="20" multiple="" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>