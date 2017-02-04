var xmlHttp

function hesap_page(page,p){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){return} 
	var url="data/ajax_hesap.php?page="+page+"&p="+p+"&psid=1"+Math.random()
	xmlHttp.onreadystatechange=stateChangedHesapPage
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
} 

function stateChangedHesapPage() {
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){document.getElementById("account_page").innerHTML=xmlHttp.responseText } 
} 

function GetXmlHttpObject(){ 
	var objXMLHttp=null
	if (window.XMLHttpRequest){objXMLHttp=new XMLHttpRequest()}
	else if (window.ActiveXObject){objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")}
	return objXMLHttp
} 