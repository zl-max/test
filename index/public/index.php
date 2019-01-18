<?php  
class Show{
	const res='hello';
	static $name='zhangsan';
	static function showMsg(){
		echo $this->name;
	}

	function showMsg1(){
		echo self::$name;
	}

	static function showMsg2(){
		echo self::$name;
	}
}
?>