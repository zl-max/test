var xmlHttp;
var i=0;
var interval;
var btn;
function myfirst(val){
	if(val.length==0){
		document.getElementById("txtres").innerHTML="No Result!";
		return;
	}	
	xmlHttp=getXmlHttpObject();
	if(xmlHttp==null){
		alert("Can not use Http!");
		return;
	}

	var url="./getdata.php";
	/*url+="?p="+val;
	url+="&sid="+Math.random();*/

	xmlHttp.onreadystatechange=statechanged;
	xmlHttp.open('post',url,true);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send('p='+val);
}


function show(){
	if(btn.value==1){
		console.log(btn.value);
		clearInterval(interval);
	}
	var mailName=document.getElementById('mailName').value;
	if(mailName=='')
	{
		alter('请填写正确的邮件地址！');
		return;
	}

	xmlHttp=getXmlHttpObject();
	if(xmlHttp==null){
		alert("Can not use Http!");
		return;
	}

	var url='../PHPMailer/index.php';
	xmlHttp.onreadystatechange=stateclick;
	xmlHttp.open('post',url,true);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send('mailaddr='+mailName);
}

function fivesend(){
	btn=document.getElementById('btn');
	if(btn.value==1){
		btn.innerHTML='关闭轰炸';
		btn.value=0;
		interval=setInterval(show,10000);
	}else{
		btn.innerHTML='开启轰炸';
		btn.value=1;
	}	
}

function stateclick(){
	if (xmlHttp.readyState==4 && xmlHttp.status==200){
		var obj=xmlHttp.responseText;
		if(obj==1){
			document.getElementById('msg').innerHTML=++i;
		}
	}
}

function statechanged(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200)
	{
		var obj=JSON.parse(xmlHttp.responseText);

		document.getElementById("txtres").innerHTML=obj.msg.week;
		// document.getElementById("txtres").innerHTML=xmlHttp.responseText;
	}
}

// 获取浏览器支持的http方式
function getXmlHttpObject(){
	var xmlHttp=null;
	try{
		xmlHttp=new XMLHttpRequest();
	}catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}