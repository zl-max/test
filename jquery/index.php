<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<script type="text/javascript" src="showmsg.js"></script>
	<script type="text/javascript">
		function clickd(options){
			alert('hello');
		}
	</script>
</head>
<body>
	<div id="msg" name="zhangsan">121212</div>
	<button onclick='clickd()'>点击我</button>
</body>
<script type="text/javascript">
	$(function(){
		$('#msg').show();
	})
</script>
</html>