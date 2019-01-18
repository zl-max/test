<?php
// include 't2.php';
// $t2=new t2\t2();
// $str=$t2->show('123','456')->str1;
// echo $str;
// //->str1;
// 
namespace t1;
class t1{
	protected  $name='wangwu';

	public function inmsg1(){
		$ex1=new self();
		return $ex1->name;
	}
	
	public function inmsg2(){
		$ex2=new static();
		return $ex2->name;
	}
}
		
class t2 extends t1{
	protected $name='zhangsan';
}

$t = new t2();

echo $t->inmsg1().'<br>';
echo $t->inmsg2();