// ajax
var xmlHttp;

function select(id)
{
	xmlHttp=getXMLHttpObject();
	if(xmlHttp==null){
		alert("Error:Don't Support the HTTP!");
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
	var url="areaDo.php";
	var msg="parent_id="+id+"&rand="+Math.random();
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
		console.log(xmlHttp.responseText);
	}
}

window.onload=select(0);