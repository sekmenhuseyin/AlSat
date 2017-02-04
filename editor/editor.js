document.write('\
	<style type="text/css">\
	.btn     { width: 22px; height: 22px; border: 1px solid buttonface; margin: 0; padding: 0; }\
	.btnOver { width: 22px; height: 22px; border: 1px solid #316AC5; background-color: #C1D2EE; }\
	.btnDown { width: 22px; height: 22px; border: 1px solid #316AC5; background-color: #98B5E2; }\
	.btnNA   { width: 22px; height: 22px; border: 1px solid buttonface; filter: alpha(opacity=25); }\
	</style>\
');
var _editor_url="editor/";
var editor_obj;var editdoc;var editor_TabIndex;var config;
function editor_defaultConfig(objname){
	this.version="2.03";
	this.width="auto";
	this.height="auto";
	this.bodyStyle='background-color: #FFFFFF; font-family: "Verdana"; font-size: x-small;';
	this.imgURL='images/'+_editor_url;
	this.debug=0;this.replaceNextlines=1;
	this.toolbar=[['fontname'],['fontsize'],['bold','italic','underline','separator'],['justifyleft','justifycenter','justifyright','separator'],['OrderedList','UnOrderedList','Outdent','Indent','separator'],['forecolor','backcolor','separator'],['HorizontalRule','Createlink','InsertImage','InsertTable','htmlmode','separator'],['Smilie','Quote','Code','separator']];
	this.fontnames={"Arial":"arial, helvetica, sans-serif","Courier New":"courier new, courier, mono","Georgia":"Georgia, Times New Roman, Times, Serif","Tahoma":"Tahoma, Arial, Helvetica, sans-serif","Times New Roman":"times new roman, times, serif","Verdana":"Verdana, Arial, Helvetica, sans-serif","impact":"impact","WingDings":"WingDings"};
	this.fontsizes={"1 (8 pt)":"1","2 (10 pt)":"2","3 (12 pt)":"3","4 (14 pt)":"4","5 (18 pt)":"5","6 (24 pt)":"6","7 (36 pt)":"7"};
	this.btnList={"bold":['Bold','Bold','editor_action(this.id)','ed_format_bold.gif'],"italic":['Italic','Italic','editor_action(this.id)','ed_format_italic.gif'],"underline":['Underline','Underline','editor_action(this.id)','ed_format_underline.gif'],"strikethrough":['StrikeThrough','Strikethrough','editor_action(this.id)','ed_format_strike.gif'],"subscript":['SubScript','Subscript','editor_action(this.id)','ed_format_sub.gif'],"superscript":['SuperScript','Superscript','editor_action(this.id)','ed_format_sup.gif'],"justifyleft":['JustifyLeft','Justify Left','editor_action(this.id)','ed_align_left.gif'],"justifycenter":['JustifyCenter','Justify Center','editor_action(this.id)','ed_align_center.gif'],"justifyright":['JustifyRight','Justify Right','editor_action(this.id)','ed_align_right.gif'],"orderedlist":['InsertOrderedList','Ordered List','editor_action(this.id)','ed_list_num.gif'],"unorderedlist":['InsertUnorderedList','Bulleted List','editor_action(this.id)','ed_list_bullet.gif'],"outdent":['Outdent','Decrease Indent','editor_action(this.id)','ed_indent_less.gif'],"indent":['Indent','Increase Indent','editor_action(this.id)','ed_indent_more.gif'],"forecolor":['ForeColor','Font Color','editor_action(this.id)','ed_color_fg.gif'],"backcolor":['BackColor','Background Color','editor_action(this.id)','ed_color_bg.gif'],"horizontalrule":['InsertHorizontalRule','Horizontal Rule','editor_action(this.id)','ed_hr.gif'],"createlink":['CreateLink','Insert Web Link','editor_action(this.id)','ed_link.gif'],"insertimage":['InsertImage','Insert Image','editor_action(this.id)','ed_image.gif'],"inserttable":['InsertTable','Insert Table','editor_action(this.id)','insert_table.gif'],"htmlmode":['HtmlMode','View HTML Source','editor_setmode(\''+objname+'\')','ed_html.gif'],"removeformat":['removeformat','Remove Text Formatting','editor_action(this.id);','removeformat.gif'],"smilie":['Smilie','Insert Smilie','editor_action(this.id)','smile.gif'],"quote":['Quote','Wrap \[QUOTE\] tags around selected text','editor_action(this.id)','quote.gif'],"code":['Code','Wrap \[CODE\] tags around selected text','editor_action(this.id)','code.gif'],"cut":['Cut','Cut','editor_action(this.id)','ed_cut.gif'],"copy":['Copy','Copy','editor_action(this.id)','ed_copy.gif'],"paste":['Paste','Paste','editor_action(this.id)','paste.gif'],"redo":['Redo','Redo','editor_action(this.id)','ed_redo.gif'],"undo":['Undo','Undo','editor_action(this.id)','ed_undo.gif']
	};
}
function editor_generate(objname,userConfig){
	config=new editor_defaultConfig(objname);
	editor_TabIndex=document.all[objname].tabIndex;
	if(userConfig){
		for(var thisName in userConfig){
			if(userConfig[thisName]){
				config[thisName]=userConfig[thisName];
			}
		}
	}
	var obj=document.all[objname];
	if(!config.width||config.width=="auto"){
		if(obj.style.width){config.width=obj.style.width;}
		else if(obj.cols){config.width=(obj.cols*8)+22;}
		else{config.width='100%';}
	}
	if(!config.height||config.height=="auto"){
		if(obj.style.height){config.height=obj.style.height;}
		else if(obj.rows){config.height=obj.rows*17}
		else{config.height='200';}
	}
	var tblOpen='<table border=0 cellspacing=0 cellpadding=0 style="float: left;"  unselectable="on"><tr><td style="border: none; padding: 1 0 0 0"><nobr>';
	var tblClose='</nobr></td></tr></table>\n';
	var toolbar='';var btnGroup,btnItem,aboutEditor;
	for(var btnGroup in config.toolbar){
		if(config.toolbar[btnGroup].length==1&&config.toolbar[btnGroup][0].toLowerCase()=="linebreak"){toolbar+='<br clear="all">';continue;}
		toolbar+=tblOpen;
		for(var btnItem in config.toolbar[btnGroup]){
			var btnName=config.toolbar[btnGroup][btnItem].toLowerCase();
			if(btnName=="fontname"){
				toolbar+='<select id="_'+objname+'_FontName" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 2;">';
				for(var fontname in config.fontnames){toolbar+='<option value="'+config.fontnames[fontname]+'">'+fontname+'</option>'}
				toolbar+='</select>';continue;
			}
			if(btnName=="fontsize"){
				toolbar+='<select id="_'+objname+'_FontSize" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 0;">';
				for(var fontsize in config.fontsizes){toolbar+='<option value="'+config.fontsizes[fontsize]+'">'+fontsize+'</option>'}
				toolbar+='</select>\n';continue;
			}
			if(btnName=="separator"){toolbar+='<img src="'+config.imgURL+'brkspace.gif" />';continue;}
			var btnObj=config.btnList[btnName];
			if(btnName=='linebreak'){alert("Error: 'linebreak' must be in a subgroup by itself, not with other buttons.\n\nWysiwyg editor not created.");return;}
			if(!btnObj){alert("Error: button '"+btnName+"' not found in button list when creating the wysiwyg editor for '"+objname+"'.\nPlease make sure you entered the button name correctly.\n\nWysiwyg editor not created.");return;}
			var btnCmdID=btnObj[0];var btnTitle=btnObj[1];var btnOnClick=btnObj[2];var btnImage=btnObj[3];toolbar+='<button title="'+btnTitle+'" id="_'+objname+'_'+btnCmdID+'" class="btn" onClick="'+btnOnClick+'" onmouseover="if(this.className==\'btn\'){this.className=\'btnOver\'}" onmouseout="if(this.className==\'btnOver\'){this.className=\'btn\'}" unselectable="on"><img src="'+config.imgURL+btnImage+'" border=0 unselectable="on"></button>';
		}
		toolbar+=tblClose;
	}
	var editor='<span id="_editor_toolbar"><table border=0 cellspacing=0 cellpadding=0 bgcolor="buttonface" style="padding: 1 0 0 2" width='+config.width+' unselectable="on"><tr><td>\n'+toolbar+'</td></tr></table>\n'+'</td></tr></table></span>\n'+'<textarea ID="_'+objname+'_editor" style="width:'+config.width+'; height:'+config.height+'; margin-top: -1px; margin-bottom: -1px;" wrap=soft tabindex='+editor_TabIndex+'></textarea>';
	if(!config.debug){document.all[objname].style.display="none";}
	var contents=document.all[objname].value;contents=contents.replace(/\[CODE\]/g,"[code]").replace(/\[\/CODE\]/g,"[/code]");
	while((innerCodeArray=contents.match(/\[code\]([\s\S]+?)\[\/code\]/))!=null){var innerCode=innerCodeArray[1];innerCode=innerCode.replace(/</ig,"&lt;").replace(/>/g,"&gt;");contents=contents.replace("[code]"+innerCodeArray[1]+"[/code]","[CODE]"+innerCode+"[/CODE]");}
	contents=contents.replace(/\r\n/g,'<br>').replace(/\n/g,'<br>').replace(/\r/g,'<br>');document.all[objname].value=contents;document.all[objname].insertAdjacentHTML('afterEnd',editor);editor_obj=document.all["_"+objname+"_editor"];window.attachEvent("onload",doStart);function doStart(){if(document.all[objname].form.adv_toolbar)document.all[objname].form.adv_toolbar.value=1;editor_setmode(objname,'init');}
	for(var idx=0;idx<document.forms.length;idx++){var r=document.forms[idx].attachEvent('onsubmit',function(){editor_filterOutput(objname);});if(!r){alert("Error attaching event to form!");}}
	return true;
}
function editor_action(button_id){
	var BtnParts=Array();BtnParts=button_id.split("_");var objname=button_id.replace(/^_(.*)_[^_]*$/,'$1');var cmdID=BtnParts[BtnParts.length-1];var button_obj=document.all[button_id];if(cmdID=='Smilie'){smilieWindow();return;}
	if(editor_obj.tagName.toLowerCase()=='textarea'){return;}
	editor_focus(editor_obj);var idx=button_obj.selectedIndex;var val=(idx!=null)?button_obj[idx].value:null;
	if(0){}
	else if(cmdID=='Quote'){editor_insertHTML(objname,'[QUOTE]','[/QUOTE]',0);}
	else if(cmdID=='Code'){editdoc.execCommand('removeformat');editor_insertHTML(objname,'[CODE]','[/CODE]',0);}
	else if(cmdID=='FontName'&&val){editdoc.execCommand(cmdID,0,val);}
	else if(cmdID=='FontSize'&&val){editdoc.execCommand(cmdID,0,val);}
	else if(cmdID=='FontStyle'&&val){editdoc.execCommand('RemoveFormat');editdoc.execCommand('FontName',0,'636c6173734e616d6520706c616365686f6c646572');var fontArray=editdoc.all.tags("FONT");for(i=0;i<fontArray.length;i++){if(fontArray[i].face=='636c6173734e616d6520706c616365686f6c646572'){fontArray[i].face="";fontArray[i].className=val;fontArray[i].outerHTML=fontArray[i].outerHTML.replace(/face=['"]+/,"");}}button_obj.selectedIndex=0;}
	else if(cmdID=='ForeColor'||cmdID=='BackColor'){var oldcolor=_dec_to_rgb(editdoc.queryCommandValue(cmdID));var newcolor=showModalDialog(_editor_url+"select_color.html",oldcolor,"resizable: no; help: no; status: no; scroll: no;");if(newcolor!=null){editdoc.execCommand(cmdID,false,"#"+newcolor);}}
	else{
		if(cmdID.toLowerCase()=='subscript'&&editdoc.queryCommandState('superscript')){editdoc.execCommand('superscript');}
		if(cmdID.toLowerCase()=='superscript'&&editdoc.queryCommandState('subscript')){editdoc.execCommand('subscript');}
		if(cmdID.toLowerCase()=='createlink'){editdoc.execCommand(cmdID,1);}
		else if(cmdID.toLowerCase()=='insertimage'){showModalDialog(_editor_url+"insert_image.html",editdoc,"resizable: no; help: no; status: no; scroll: no; ");}
		else if(cmdID.toLowerCase()=='inserttable'){showModalDialog(_editor_url+"insert_table.html",window,"resizable: yes; help: no; status: no; scroll: no; ");}
		else{editdoc.execCommand(cmdID);}
	}
	editor_event(objname);
}
function editor_event(objname,runDelay){
	if(runDelay==null){runDelay=0;}
	var editEvent=editor_obj.contentWindow?editor_obj.contentWindow.event:event;
	if(editEvent&&editEvent.keyCode){
		var ord=editEvent.keyCode;var ctrlKey=editEvent.ctrlKey;var altKey=editEvent.altKey;var shiftKey=editEvent.shiftKey;
		if(ord==16)return;
		if(ord==17)return;
		if(ord==18)return;
		if(ord==13&&editEvent.type=='keypress'){
			if(config.mode!="textedit"){
				var sRange=editdoc.selection.createRange();var parentelm=sRange.parentElement();
				try{while(parentelm.tagName!="P"&&parentelm.tagName!="DIV"){parentelm=parentelm.parentNode;}if(parentelm.tagName=="P"){parentelm.style.margin="0px";}
				}catch(e){}
			}
			return;
		}
		if(ctrlKey&&(ord==122||ord==90)){return;}
		if((ctrlKey&&(ord==121||ord==89))||ctrlKey&&shiftKey&&(ord==122||ord==90)){return;}
	}
	if(runDelay>0){return setTimeout(function(){editor_event(objname);},runDelay);}
	if(this.tooSoon==1&&runDelay>=0){this.queue=1;return;}
	this.tooSoon=1;setTimeout(function(){this.tooSoon=0;if(this.queue){editor_event(objname,-1);};this.queue=0;},333);editor_updateOutput(objname);editor_updateToolbar(objname);
}
function editor_updateToolbar(objname,action){
	if(action=="enable"||action=="disable"){
		var tbItems=new Array('FontName','FontSize','FontStyle');
		for(var btnName in config.btnList){tbItems.push(config.btnList[btnName][0]);}
		for(var idxN in tbItems){
			var cmdID=tbItems[idxN].toLowerCase();
			var tbObj=document.all["_"+objname+"_"+tbItems[idxN]];
			if(cmdID=="htmlmode"||cmdID=="about"||cmdID=="showhelp"||cmdID=="popupeditor"){continue;}
			if(tbObj==null){continue;}
			var isBtn=(tbObj.tagName.toLowerCase()=="button")?true:false;
			if(action=="enable"){tbObj.disabled=false;if(isBtn){tbObj.className='btn'}}
			if(action=="disable"){tbObj.disabled=true;if(isBtn){tbObj.className='btnNA'}}
		}
		return;
	}
	if(editor_obj.tagName.toLowerCase()=='textarea'){return;}
	var fontname_obj=document.all["_"+objname+"_FontName"];
	if(fontname_obj){
		var fontname=editdoc.queryCommandValue('FontName');
		if(fontname==null){fontname_obj.value=null;}
		else{var found=0;for(i=0;i<fontname_obj.length;i++){if(fontname.toLowerCase()==fontname_obj[i].text.toLowerCase()){fontname_obj.selectedIndex=i;found=1;}}if(found!=1){fontname_obj.value=null;}}
	}
	var fontsize_obj=document.all["_"+objname+"_FontSize"];
	if(fontsize_obj){
		var fontsize=editdoc.queryCommandValue('FontSize');
		if(fontsize==null){fontsize_obj.value=null;}
		else{var found=0;for(i=0;i<fontsize_obj.length;i++){if(fontsize==fontsize_obj[i].value){fontsize_obj.selectedIndex=i;found=1;}}if(found!=1){fontsize_obj.value=null;}}
	}
	var classname_obj=document.all["_"+objname+"_FontStyle"];
	if(classname_obj){
		var curRange=editdoc.selection.createRange();var pElement;
		if(curRange.length){pElement=curRange[0];}
		else{pElement=curRange.parentElement();}
		while(pElement&&!pElement.className){pElement=pElement.parentElement;}
		var thisClass=pElement?pElement.className.toLowerCase():"";
		if(!thisClass&&classname_obj.value){classname_obj.value=null;}
		else{var found=0;for(i=0;i<classname_obj.length;i++){if(thisClass==classname_obj[i].value.toLowerCase()){classname_obj.selectedIndex=i;found=1;}}if(found!=1){classname_obj.value=null;}}
	}
	var IDList=Array('Bold','Italic','Underline','JustifyLeft','JustifyCenter','JustifyRight','InsertOrderedList','InsertUnorderedList');
	for(i=0;i<IDList.length;i++){
		var btnObj=document.all["_"+objname+"_"+IDList[i]];
		if(btnObj==null){continue;}
		var cmdActive=editdoc.queryCommandState(IDList[i]);
		if(!cmdActive){
			if(btnObj.className!='btn'){btnObj.className='btn';}
			if(btnObj.disabled!=false){btnObj.disabled=false;}
		}else if(cmdActive){
			if(btnObj.className!='btnDown'){btnObj.className='btnDown';}
			if(btnObj.disabled!=false){btnObj.disabled=false;}
		}
	}
}
function editor_updateOutput(objname){
	var editEvent=editor_obj.contentWindow?editor_obj.contentWindow.event:event;
	var isTextarea=(editor_obj.tagName.toLowerCase()=='textarea');
	var contents;if(isTextarea){contents=editor_obj.value;}else{contents=editdoc.body.innerHTML;}
	if(config.lastUpdateOutput&&config.lastUpdateOutput==contents){return;}else{config.lastUpdateOutput=contents;}
	document.all[objname].value=contents;
}
function editor_filterOutput(objname){
	editor_updateOutput(objname);var contents=document.all[objname].value;
	if(contents.toLowerCase()=='<p>&nbsp;</p>'||contents.toLowerCase()=='<p></p>'){contents="";}
	var filterTag=function(tagBody,tagName,tagAttr){
		tagName=tagName.toLowerCase();var closingTag=(tagBody.match(/^<\//))?true:false;
		if(tagName=='img'){tagBody=tagBody.replace(/(src\s*=\s*.)[^*]*(\*\*\*)/,"$1$2");}
		if(tagName=='a'){tagBody=tagBody.replace(/(href\s*=\s*.)[^*]*(\*\*\*)/,"$1$2");}
		if(tagName=='a'&&!closingTag){tagBody=tagBody.substring(0,tagBody.length-1)+" target=_blank>";}
		return tagBody;
	};RegExp.lastIndex=0;var matchTag=/<\/?(\w+)((?:[^'">]*|'[^']*'|"[^"]*")*)>/g;contents=contents.replace(matchTag,filterTag);
	if(config.replaceNextlines){contents=contents.replace(/\r\n/g,' ').replace(/\n/g,' ').replace(/\r/g,' ');}
	contents=contents.replace(/<\?xml:[^>]*>/g,'').replace(/<\/?st1:[^>]*>/g,'').replace(/<\/?[a-z]\:[^>]*>/g,'');contents=contents.replace(/\[CODE\]/g,"[code]").replace(/\[\/CODE\]/g,"[/code]");
	while((innerCodeArray=contents.match(/\[code\]([\s\S]+?)\[\/code\]/))!=null){var innerCode=innerCodeArray[1];innerCode=innerCode.replace(/<p([^>]*)>([\s\S]+?)<\/p>/ig,"$2\r\n").replace(/<br>/ig,"\r\n").replace(/<[\s\S]+?>/g,"").replace(/\&nbsp\;/g," ");contents=contents.replace("[code]"+innerCodeArray[1]+"[/code]","[CODE]"+innerCode+"[/CODE]");}
	document.all[objname].value=contents;
}
function editor_setmode(objname,mode){
	var TextEdit='<textarea ID="_'+objname+'_editor" style="width:'+editor_obj.style.width+'; height:'+editor_obj.style.height+'; margin-top: -1px; margin-bottom: -1px;" tabindex='+editor_TabIndex+'></textarea>';
	var RichEdit='<iframe ID="_'+objname+'_editor"    style="width:'+editor_obj.style.width+'; height:'+editor_obj.style.height+';" tabindex='+editor_TabIndex+' hideFocus></iframe>';
	if(mode=="textedit"||editor_obj.tagName.toLowerCase()=='iframe'){
		config.mode="textedit";var contents=editdoc.body.createTextRange().htmlText;
		editor_obj.outerHTML=TextEdit;editor_obj=document.all["_"+objname+"_editor"];
		editor_obj.value=contents;editor_event(objname);editor_updateToolbar(objname,"disable");
		editor_obj.onkeydown=function(){editor_event(objname);}
		editor_obj.onkeypress=function(){editor_event(objname);}
		editor_obj.onkeyup=function(){editor_event(objname);}
		editor_obj.onmouseup=function(){editor_event(objname);}
		editor_obj.ondrop=function(){editor_event(objname,100);}
		editor_obj.oncut=function(){editor_event(objname,100);}
		editor_obj.onpaste=function(){editor_event(objname,100);}
		editor_obj.onblur=function(){editor_event(objname,-1);}
		editor_updateOutput(objname);editor_focus(editor_obj);
	}else{
		config.mode="wysiwyg";
		var contents=editor_obj.value;
		if(mode=='init'){if(document.all[objname].value){contents=document.all[objname].value;}if(contents==''){contents="<p></p>";}}
		editor_obj.outerHTML=RichEdit+'<a href="#" onfocus="forwardFocus('+objname+');" tabindex='+(document.all[objname].tabIndex+1)+'><img border=0 width=0 height=0></a>';editor_obj=document.all["_"+objname+"_editor"];editdoc=editor_obj.contentWindow.document;var html="";html+='<html><head>\n';html+='<style>\n';html+='body {'+config.bodyStyle+'} \n';html+='</style>\n'+'</head>\n'+'<body contenteditable="true" topmargin=1 leftmargin=1>'+contents+'</body>\n'+'</html>\n';editdoc.open();editdoc.write(html);editdoc.close();editor_updateToolbar(objname,"enable");
		editdoc.onkeydown=function(){editor_event(objname);}
		editdoc.onkeypress=function(){editor_event(objname);}
		editdoc.onkeyup=function(){editor_event(objname);}
		editdoc.onmouseup=function(){editor_event(objname);}
		editdoc.body.ondrop=function(){editor_event(objname,100);}
		editdoc.body.oncut=function(){editor_event(objname,100);}
		editdoc.body.onpaste=function(){editor_event(objname,100);}
		editdoc.body.onblur=function(){editor_event(objname,-1);}
		if(mode!='init'){editor_focus(editor_obj);}
	}
	if(mode!='init'){editor_event(objname);}
}
function editor_focus(editor_obj){if(editor_obj.tagName.toLowerCase()=='textarea'){var myfunc=function(){editor_obj.focus();};setTimeout(myfunc,100);}else{var editorRange=editdoc.body.createTextRange();var curRange=editdoc.selection.createRange();if(curRange.length==null&&!editorRange.inRange(curRange)){editorRange.collapse();editorRange.select();curRange=editorRange;}}}
function _dec_to_rgb(value){var hex_string="";for(var hexpair=0;hexpair<3;hexpair++){var myByte=value&0xFF;value>>=8;var nybble2=myByte&0x0F;var nybble1=(myByte>>4)&0x0F;hex_string+=nybble1.toString(16);hex_string+=nybble2.toString(16);}return hex_string.toUpperCase();}
function editor_insertHTML(objname,str1,str2,reqSel){
	if(str1==null){str1='';}
	if(str2==null){str2='';}
	if(document.all[objname]&&editor_obj==null){document.all[objname].focus();document.all[objname].value=document.all[objname].value+str1+str2;return;}
	if(editor_obj==null){return alert("Unable to insert HTML.  Invalid object name '"+objname+"'.");}
	editor_focus(editor_obj);var tagname=editor_obj.tagName.toLowerCase();var sRange;
	if(tagname=='iframe'){
		sRange=editdoc.selection.createRange();
		var sHtml=sRange.htmlText;
		if(sRange.length){return alert("Unable to insert HTML.  Try highlighting content instead of selecting it.");}
		var oldHandler=window.onerror;window.onerror=function(msg,url,linenumber){alert("Unable to insert HTML for current selection.");return true;}
		if(sHtml.length){if(str2){var txt=sRange.htmlText.replace(/<p([^>]*)>(.*)<\/p>/i,'$2');sRange.pasteHTML(str1+txt+str2);}else{sRange.pasteHTML(str1);}
		}else{if(reqSel){return alert("Unable to insert HTML.  You must select something first.");}sRange.pasteHTML(str1+str2);}
		window.onerror=oldHandler;
	}
	else if(tagname=='textarea'){editor_obj.focus();sRange=document.selection.createRange();var sText=sRange.text;if(sText.length){if(str2){sRange.text=str1+sText+str2;}
	else{sRange.text=str1;}}else{if(reqSel){return alert("Unable to insert HTML.  You must select something first.");}
	sRange.text=str1+str2;}}else{alert("Unable to insert HTML.  Unknown object tag type '"+tagname+"'.");}
	sRange.collapse(false);sRange.select();
}
function editor_getHTML(objname){var isTextarea=(editor_obj.tagName.toLowerCase()=='textarea');if(isTextarea){return editor_obj.value;}else{return editor_obj.contentWindow.document.body.innerHTML;}}
function editor_setHTML(objname,html){var isTextarea=(editor_obj.tagName.toLowerCase()=='textarea');if(isTextarea){editor_obj.value=html;}else{editor_obj.contentWindow.document.body.innerHTML=html;}}
function editor_appendHTML(objname,html){var isTextarea=(editor_obj.tagName.toLowerCase()=='textarea');if(isTextarea){editor_obj.value+=html;}else{editor_obj.contentWindow.document.body.innerHTML+=html;}}
function forwardFocus(objname){for(i=0;i<document.all.length;i++){if(document.all(i).tabIndex==(editor_TabIndex+1)&&document.all(i).href!="#"){document.all(i).focus();}}}