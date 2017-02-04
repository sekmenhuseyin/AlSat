var xmlHttp

function check_username(str){
	if (str.length==0){return}
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){return} 
	var url="data/username.php"
	url=url+"?q="+str
	url=url+"&psid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedUserName
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
} 

function stateChangedUserName() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){document.getElementById("hint_username").innerHTML=xmlHttp.responseText } 
} 

function GetXmlHttpObject(){ 
	var objXMLHttp=null
	if (window.XMLHttpRequest){objXMLHttp=new XMLHttpRequest()}
	else if (window.ActiveXObject){objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")}
	return objXMLHttp
} 