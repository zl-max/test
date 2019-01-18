<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件传输</title>
	<style type="text/css">
		#progress{
			width: 300px;
			height:20px;
			background-color: #f7f7f7;
			box-shadow:0 1px 2px rgba(0,0,0,0.1) inset;
			border-radius: 6px;
			background-image: linear-gradient(to bottom,#f5f5f5,#f9f9f9);
		}
		#finish{
	      background-color: #149bdf;
	      background-image:linear-gradient(45deg,rgba(255,255,255,0.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,0.15) 50%,rgba(255,255,255,0.15) 75%,transparent 75%,transparent);
	      background-size:40px 40px;
	      height: 100%;
	    }
	</style>
</head>
<body>
	<div id="progress">
		<div id="finish" style="width:0%"></div>
	</div>
	<form action="upload.php">
		<input type="file" name="file" id="file">
		<input type="button" name="" value="停止" id="stop">
	</form>
	<div id="msg"></div>
	<script type="text/javascript">
		var fileForm=document.getElementById("file");
		var stopBtn=document.getElementById("stop");

		var upload=new Upload();
		fileForm.onchange=function(){
			upload.addFileAndSend(this);
			// console.log(this.files[0]);
			// console.log(upload.aa);
		}

		stopBtn.onclick=function(){
			this.value='停止中';
			upload.stop();
			this.value='已停止';
		}
		
		// 上传对象
		function Upload(){
			// 实例化请求
			// this.aa='ceshi';
			var xhr=new XMLHttpRequest();
			var form_data=new FormData();
			const LENGTH=1024*1024;
			var start=0;
			var end=start+LENGTH;
			var blob;
			var blob_num=1;
			var is_stop=0;

			//对外方法
			this.addFileAndSend=function(that){
				var file=that.files[0];
				// console.log(file);
				blob=cutFile(file);
				// console.log(blob);
				sendFile(blob,file);
				blob_num++;
			};

			this.stop=function(){
				// xhr.abort();
				is_stop=1;
			};
			//切割文件
			function cutFile(file){
				var file_blob=file.slice(start, end);
				start=end;
				end=start+LENGTH;
				return file_blob;
			};

			function sendFile(blob,file){
				// 文件大小
				var total_blob_num=Math.ceil(file.size/LENGTH);
				form_data.append('file',blob);
				form_data.append('blob_num',blob_num);
				form_data.append('total_blob_num',total_blob_num);
				form_data.append('file_name',file.name);

			 	// console.log(form_data);
				xhr.open("POST", 'upload.php',true);
				//xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
				xhr.onreadystatechange=function(){
						var progress;
					  	var progressObj=document.getElementById('finish');

					  	if(blob_num==1){
					  		progress='100%';
					  	}else{
					  		progress=Math.min(100,(blob_num/total_blob_num)*100)+'%';
					  	}

					  	progressObj.style.width=progress;

					  	var t=setTimeout(function(){
					  		if(start<file.size && is_stop==0){
					  			blob=cutFile(file);
					  			sendFile(blob,file);
					  			blob_num++;
					  		}else{
					  			setTimeout(t);
					  		}
					  	},2000);
					}
					xhr.send(form_data);
				}	
			}
		
	</script>
</body>
</html>