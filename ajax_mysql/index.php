<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax查询数据库</title>
	<style type="text/css">
		#sel,div select{
			font-size: 150%;
		}
		table{
			border-collapse: collapse;
		}
	</style>
	<script type="text/javascript" src="js/operation.js"></script>
</head>
<body>
	<div id="sel">
		Please Choose One Person:
		<select name="ch" onchange="select(this.value)">
			<option value=""></option>
			<option value="张三">张三</option>
			<option value="李四">李四</option>
			<option value="王五">王五</option>
		</select>
	</div>	
	<hr>
	<div id="txtres"><b>这里将显示用户的信息!</b></div>
</body>
</html>