<?php 
$val=$_POST['p'];
$weekarray=array('日','一','二','三','四','五','六');
if(is_numeric($val)){
	$data['code']=200;
	$data['tip']='success';
	$data['msg']['week']='今天是星期'.$weekarray[date('w')];
}elseif(is_string($val)){
	$data['code']=500;
	$data['tip']='error';
	$data['msg']['week']='今天是星期'.$weekarray[date('w')];
}else{
	$data['code']=800;
	$data['tip']='other';
	$data['msg']['week']='今天是星期'.$weekarray[date('w')];
};
$data['msg']['author']='zhangsan';

echo json_encode($data);
// echo gettype($val);
