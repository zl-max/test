<?php
$q=strtolower($_GET["q"]);
$xmlDoc=new DOMDocument();
$xmlDoc->load("vehicle.xml"); // 加载xml文件
$x=$xmlDoc->getElementsByTagName("BRAND");  //返回标签为"BRAND"的DOM对象

// 从DOM对象中遍历得到和传进来的值相同的父级的DOM对象
for($i=0;$i<$x->length;$i++) { 
	if($x->item($i)->nodeType==1)
	{
		if (strtolower($x->item($i)->childNodes->item(0)->nodeValue) == $q)
	    { 
	    $y=($x->item($i)->parentNode);
	    }
	}
}

$cd=($y->childNodes); // 父级节点的所有子节点

// 父级节点下所有的节点名和节点值
for ($i=0;$i<$cd->length;$i++)
{ 
//只能为元素节点
	if($cd->item($i)->nodeType==1){
		echo($cd->item($i)->nodeName);
		echo(": ");
		echo($cd->item($i)->childNodes->item(0)->nodeValue);
		echo("<br />");
	} 
}
?>