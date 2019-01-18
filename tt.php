<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>单机创建文本</p>
	<button onclick="addtext()">点我</button>
	<h1 id="change">我是要被改变的内容！</h1>
	<h1>我没被改变</h1>
	<h1>我也没被改变</h1>
	<table>
		<tr>
			<td>haha haha</td>
			<td>123</td>
		</tr>
		<tr>
			<td>456</td>
			<td>678</td>
		</tr>
	</table>
	<script type="text/javascript">
		var arr=["zhangsan","lisi","wangwu","zhaoliu"];
		//var arr={"zhangsan","male"};
		for(var name in arr)
		{
			alert("序号："+name+"姓名："+arr[name]);
		}
	</script>
</body>
</html>



