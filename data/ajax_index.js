var xmlHttp

function index_page(page){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){return} 
	var url="ajax_index.php?page="+page+"&psid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedindexPage
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
} 

function stateChangedindexPage() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){document.getElementById("Center_Content").innerHTML=xmlHttp.responseText } 
} 

function GetXmlHttpObject(){ 
	var objXMLHttp=null
	if (window.XMLHttpRequest){objXMLHttp=new XMLHttpRequest()}
	else if (window.ActiveXObject){objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")}
	return objXMLHttp
} 