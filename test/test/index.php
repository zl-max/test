<?php 
namespace tt;
class Reg{
	public $header=[];
	protected $contentType='text/html';
	protected $charset='utf-8';

	static function load($class=null){
		echo $class.'<br>';
		include dirname(dirname(__FILE__)).'/index.php';
	}

	static function regs($auload=null){
		
		echo 'zhangsan'.'<br>';
		spl_autoload_register($auload ?:'self::load');
	}

	public function contentType(){
		$this->header['content-type']=$this->contentType.";".$this->charset;
		return $this;
	}
}