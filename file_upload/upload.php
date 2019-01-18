<?php
// +----------------------------------------------------------------------
// | ZL [ WE CAN DO IT！！！]
// +----------------------------------------------------------------------
// | Copyright (c) 2016~2019 Z.L All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( NO )
// +----------------------------------------------------------------------
// | Author: Z.L <582152734@qq.com>
// +----------------------------------------------------------------------
class Upload{
	private $filePath='upload';   // 文件保存路径
	private $tmpPath;    // 文件分块保存路径
	private $blobNum;     //当前文件为第几块
	private $totalBlobNum;  //总的文件块数量
	private $fileName;    //文件名

	public function __construct($tmpPath,$blobNum,$totalBlobNum,$fileName){
		$this->tmpPath=$tmpPath;
		$this->blobNum=$blobNum;
		$this->totalBlobNum=$totalBlobNum;
		$this->fileName=iconv("UTF-8", "GB2312", $fileName);

		$this->moveFile();
		$this->fileMerge();
	}

	// 创建文件夹
	private function touchDir(){
		if(!file_exists($this->filePath)){
			return mkdir($this->filePath);
		}
	}
	
	// 移动文件
	private function moveFile(){
		$this->touchDir();
		$filename=$this->filePath.'/'.$this->fileName.'_'.$this->blobNum;
		move_uploaded_file($this->tmpPath,$filename);
	}

	//合并文件
	private function fileMerge(){
		// 判断是否为最后一个文件
		if($this->blobNum==$this->totalBlobNum){
			$blob='';
			for ($i=1; $i<=$this->totalBlobNum ; $i++) { 
				$blob.=file_get_contents($this->filePath.'/'.$this->fileName.'_'.$i);
				$this->delTmpFile($i);
			}
			file_put_contents($this->filePath.'/'.$this->fileName,$blob);
		}
	}
	// 删除文件
	private function delTmpFile($i){
		@unlink($this->filePath.'/'.$this->fileName.'_'.$i);
	}
	// 对外访问api
	public function apiReturn(){
		if($this->blobNum==$this->totalBlobNum){
			if(file_exists($this->filePath.'/'.$this->fileName)){
				$data['code']=1;
				$data['msg']='success';
				$data['file_path']='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['DOCUMENT_URI']).str_replace('.','',$this->filepath).'/'. $this->fileName;
			}
		}else{
			if(file_exists($this->filePath.'/'.$this->fileName.'_'.$this->blobNum)){
				$data['code'] = 2;
		        $data['msg'] = 'waiting for all';
		        $data['file_path'] = '';
			}
		}

		header("Content-type:applicatin/json");
		echo json_encode($data);
	}
}


$upload=new Upload($_FILES['file']['tmp_name'],$_POST['blob_num'],$_POST['total_blob_num'],$_POST['file_name']);

$upload->apiReturn();