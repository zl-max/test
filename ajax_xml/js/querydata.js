var xmlHttp;
function select(val){
	// 输入字符串是否为空
	if(val.length==0){
		document.getElementById("txtres").innerHTML="";
		return;
	}
	// 初始化ajax
	xmlHttp=getXmlHttpObject();
	if(xmlHttp==null){
		document.getElementById("txtres").innerHTML="Can not support Http!";
		return;
	}

	// ajax处理数据
	var url="supply.php";
	url+="?q="+val;
	url+="&sid="+Math.random();

	xmlHttp.onreadystatechange=statechanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
}

// 数据返回结果处理
function statechanged(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200)
	{
		document.getElementById("txtres").innerHTML=xmlHttp.responseText;
	}
}



// 网页支持的ajax请求方式
function getXmlHttpObject(){
	var xmlHttp=null;
	try{
		xmlHttp=new XMLHttpRequest();
	}catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}