<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style type="text/css">
		#cho,div select{font-size: 150%}
	</style>
	<script type="text/javascript" src="js/querydata.js"></script>
	<title>ajax向xml查询数据</title>
</head>
<body>
	<div id="cho">
	Please Choose Your Vehicle:
	<select name="cds" onchange="select(this.value)">
		<option value=""></option>
		<option value="BMW">BMW</option>
		<option value="Benz">Benz</option>
		<option value="Audi">Audi</option>
	</select>
	</div>
	<hr>
	<div id="txtres"><b>这里显示查询的结果！</b></div>
</body>
</html>