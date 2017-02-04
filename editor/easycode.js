function wrapText(b,h,f,a){
	if(b.selected){
		if(!a)a=b.selected.text;b.selected.text=h+a+f;b.selected.select();
	}else if(b.selectionEnd){
		var l=b.selectionStart;var n=b.selectionEnd;var m=(b.value).substring(0,l);if(!a)a=(b.value).substring(l,n);var o=(b.value).substring(n,b.textLength);b.value=m+h+a+f+o;b.selectionStart=n+h.length+f.length;b.selectionEnd=b.selectionStart;
	}else{
		if(!a)a="";b.value+=h+a+f;
	}
	b.focus();
}
function entercode(b,c,j){
	saveSel(b);if(!hasSelection(b))var a=prompt(j,"");wrapText(b,"["+c+"]","[/"+c+"]",a);
}
function advcode(b,c){
	saveSel(b);var e,d;if(c=="URL"){
		e="Köprü için gerekli olan tüm adresi giriniz";d="http://";
	}else{
		e="Köprü için gerekli olan eposta adresini giriniz";d="";
	}
	var g=prompt(e,d);if(g=="http://"||!g)return;if(!hasSelection(b))var i=prompt("Enter the text to be displayed for the link \(Optional\)","Click Here");if(i||hasSelection(b)){
		wrapText(b,"["+c+"="+g+"]","[/"+c+"]",i);
	}else{
		wrapText(b,"["+c+"]","[/"+c+"]",g);
	}
}
function hasSelection(b){
	if(b.selected&&b.selected.text.length>0)return true;else if(b.selectionEnd&&(b.selectionEnd-b.selectionStart>0))return true;else return false;
}
function saveSel(b){
	if(b.createTextRange){
		b.focus();b.selected=document.selection.createRange().duplicate();
	}
}
function bOut(k){
	if(k.className=='btnOver')k.className='btn';
}
function bOver(k){
	if(k.className=='btn')k.className='btnOver';
}
