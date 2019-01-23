// ajax
var xmlHttp;
var provinceTag=document.getElementById('province');
var cityTag=document.getElementById('city');
var areaTag=document.getElementById('area');
var pub_parent_type;
function select(id,parent_type)
{
	pub_parent_type=parent_type;
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
	xmlHttp.open("POST",url,false);
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
		var object=JSON.parse(xmlHttp.responseText);
		for (var i = 0; i < object.length; i++) {
			var tag=pub_parent_type=='province'?provinceTag:(pub_parent_type=='city'?cityTag:areaTag);
			tag.add(new Option(object[i].name,object[i].id));

		}		
	}
}

function provinceShow(th){
	cityTag.options.length=1; //初始化
	areaTag.options.length=1;  //初始化
	select(th.value,'city');
}

function cityShow(th){
	areaTag.options.length=1;  //初始化
	select(th.value,'area');
}

window.onload=select(0,'province');


