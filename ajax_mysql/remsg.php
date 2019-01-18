<?php 
	$name=$_POST["name"]; 
	// 数据库连接
	$conn=mysqli_connect("localhost","root","root","test");
	$sql="select user_id,name,age,sex from t_user where name='".$name."';";
	$res=mysqli_query($conn,$sql);
	mysqli_close($conn);
	$count=count($res);
	if(!empty($count))
	{
		echo "<table border='1'>
		<tr>
			<th>用户id</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
		</tr>";

		while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>".$row["user_id"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["age"]."</td>";
			echo "<td>".$row["sex"]."</td>";
			echo "</tr>";
		}
		mysqli_free_result($res); // 释放结果集
		echo "</table>";
	}else{
		echo "Not Exist Data!";
	}
	

?>