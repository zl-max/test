// 通过ajax请求数据
var xmlHttp;
function select(val)
{
	if(val.length=="")  //没有选择数据
	{
		document.getElementById("txtres").innerHTML="";
		return;
	}

	xmlHttp=getXMLHttpObject();
	if(xmlHttp==null){
		document.getElementById("txtres").innerHTML="Error:Don't Support the HTTP!";
		return;
	}
	// GET传数据的写法
	/*var url="remsg.php";
	url+="?name="+val;
	url+="&sid="+Math.random();
	xmlHttp.onreadystatechange=statechanged;   // 执行成功需要操作
	xmlHttp.open("GET",url,true);
	xmlHttp.send();*/
	

	// POST传数据的写法
	var url="remsg.php";
	var msg="name="+val;
	xmlHttp.onreadystatechange=statechanged;   // 执行成功需要操作
	xmlHttp.open("POST",url,true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send(msg);

}

//适合浏览器版本的http请求方式
function getXMLHttpObject(){
	xmlHttp=null;
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

// ajax返回数据操作
function statechanged(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		document.getElementById("txtres").innerHTML=xmlHttp.responseText;
	}
}