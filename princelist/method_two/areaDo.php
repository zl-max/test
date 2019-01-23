<?php 
$dsn='mysql:host=localhost;dbname=china_area';
$dbuser='root';
$dbpwd='root';
try {
	$conn=new PDO($dsn,$dbuser,$dbpwd);
} catch (PDOException $e) {
	exit('Could not connect the database:<br>'.$e);
}
$sql="select id,name from area where parent_id=".$_POST["parent_id"];
$result=$conn->query($sql);
$data=$result->fetchAll();
// print_r($data);
echo json_encode($data);
$conn=null;


