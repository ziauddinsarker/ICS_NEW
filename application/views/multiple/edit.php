<!DOCTYPE html>
<html>
<head>

<title></title>
</head>

<body>
<?php if(isset($error)){echo $error; } ?>
<form enctype="multipart/form-data" action="<?= site_url('Multiple/do_upload') ?>" method="post">
	Product Description: <input type="text" value="<?php echo $row->product_description ?>" name="product_description">
	Product Picture: <input type="file" name="userfile[]" multiple="">
	<input type="submit" value="Upload Multiple" name="save">	
</form>

</body>
</html>