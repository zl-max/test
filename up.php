<?php  
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片上传</title>
</head>
<body>
	<form method="post" action="upload_file.php" enctype="multipart/form-data">
		<label for="file">选择要上传的图片:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="提交">
	</form>	
	<?php  
		$_SESSION['name']='zhanglei';
	?>
</body>
</html>