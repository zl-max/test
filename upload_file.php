<?php
	session_start();
	header("content-type:text/html;charset=utf-8");
	if($_FILES["file"]["type"]=="image/jpeg"
	|| $_FILES["file"]["type"]=="image/pjpeg"
	|| $_FILES["file"]["type"]=="image/gif"
	)
	{	
		if($_FILES["file"]["size"]<20000){
			if ($_FILES["file"]["error"]>0) {
				echo "error:".$_FILES["file"]["error"];
			}else{
				echo "文件名：".$_FILES["file"]["name"]."<br>";
				echo "文件名类型：".$_FILES["file"]["type"];
				echo "<br>";
				echo "文件名大小：".($_FILES["file"]["size"]/1024)."KB";
				echo "<br>";
				echo "服务器副本名：".$_FILES["file"]["tmp_name"]."<br>";

				if(file_exists("upload/".$_FILES["file"]["name"])){
					echo "文件已经存在！";
				}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file1"]["name"]);
					echo '<h3 style="color:red">图片已经上传成功！</h3>';
				}
			}
		}
		else
		{
			echo "照片大小应在20kb内";
		}
		
	}
	else
	{
		echo "请输入以jpeg,gif为后缀名的图片！";
	}  
	echo "<hr>";
	echo $_SESSION['name'];
	
?>