<?php
header("content-type:text/html;charset=utf8");
$returnval=array('code'=>0);
if(!isset($_GET['date'])){
	$returnval['content']="正确的日期格式：域名后+?date=你想要查询的日期";
}else{
	// 获取输入日期
	$date=$_GET['date'];

	$dsn='mysql:host=localhost;dbname=holiday';
	$dbuser='root';
	$dbpwd='root';
	try{
		$conn=new PDO($dsn,$dbuser,$dbpwd);
	}catch(PDOException $e){
		exit('Please check the connect of database!');
	}

	$sql="select year,daytype,isworkday,holiday_date,holiday_name,holiday_remark from t_holiday where holiday_date='".$date."';";
	$result=$conn->query($sql);
	$data=$result->fetch();

	if(!empty($data) && $data['daytype']!=1){
		$returnval['code']=1;
	}
	$returnval['content']=$data;
	$conn=null;
}

echo json_encode($returnval,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);


