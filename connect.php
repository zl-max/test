<?php 
	header("content-type:text/html;charset=utf-8"); 
	$conn=mysql_connect("localhost","root","root");
	if(!$conn){
		echo "连接失败！";
	}else{
		mysql_select_db("test",$conn);
		$sql="select * from t_user_info order by user_age;";
		$table=mysql_query($sql,$conn);
		echo "<table border='1'><tr><th>姓名</th><th>年龄</th>";
		while ($row=mysql_fetch_array($table)) {
			echo "<tr>";
			echo "<td><a style='color:red'>".$row["user_name"]."</a></td>"."<td><a style='color:red'>".$row["user_age"]."</a></td>";
			echo "</tr>";
		}
	}
	mysql_close($conn);
?>