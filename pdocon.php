<?php  
	$server="sqlsrv:server=localhost;database=test";
	$conn=new PDO($server,"sa","123");
	$sql="select * from t_user";
	$res=$conn->query($sql);
	while($row=$res->fetch()){
		print_r($row);
	}
?>