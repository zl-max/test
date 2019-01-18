<?php 
	$server="DRIVER={SQL Server};SERVER=localhost;DATABASE=test";
	$conn=odbc_connect($server,"sa","123");
	$sql="insert into t_user select 2;";
	$rs=odbc_exec($conn, $sql);
	
	odbc_close($server);

?>