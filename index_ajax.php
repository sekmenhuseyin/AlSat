<? session_start();include("data/common.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" ><head>
    <META http-equiv="Content-Type" content="text/html; charset=windows-1254"><META http-equiv="imagetoolbar" content="no"><META http-equiv="Reply-to" content="">
	<META http-equiv=Page-Enter content=blendTrans(Duration=1.0)><META http-equiv=Page-Exit content=blendTrans(Duration=1.0)>
    <META http-equiv="Copyright" content="Copyright © 2006"><META name="Copyright" content="Copyright © 2006">
    <META http-equiv="Resource-type" content="document"><META http-equiv="Distribution" content="global">
    <META http-equiv="Content-Language" content="tr"><META http-equiv="Window-target" content="_top">
    <META name="Content-Language" content="tr"><META name="Description" content="">
    <META name="Author" content=""><META name="Keywords" content="">
	<title>Hesaplı Al Sat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . . : Hesabını Bilenlerin Sitesi : . . &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</title>
	<link rel="stylesheet" type="text/css" href="data/style.css"><script type="text/javascript">
	var xmlHttp

function index_page(page,p,i){
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){return} 
	var url="data/ajax_index.php?page="+page+"&p="+p+"&i="+i+"&psid="+Math.random()
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
} </script>
</head><body leftmargin=0 topmargin=0 style="margin:0;" bgcolor="#E6E6E6" background="images/index/fon.gif">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" background="images/index/fon_top.gif" height="147">
        <tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="740">
                <tr><td valign="middle" height="68"><img src="images/index/LOGO2.gif" alt="" border="0" align="left"></td></tr><tr><td><table border="0" cellpadding="0" cellspacing="0"><tr>
	                    <td><a href="#" title="Anasayfa" onclick="javascript:index_page('');"><img src="images/btn/b01.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="" onclick="javascript:index_page('cats');"><img src="images/btn/b02.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="" onclick="javascript:index_page('cats');"><img src="images/btn/b03.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="Satış" onclick="javascript:index_page('sale');"><img src="images/btn/b04.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="Hesap" onclick="javascript:index_page('account_stlk');"><img src="images/btn/b05.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="Son Gün" onclick="javascript:index_page('last');"><img src="images/btn/b06.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="İletişim" onclick="javascript:index_page('help_iletisim');"><img src="images/btn/b07.gif" height="42" alt="" border="0"></a></td>
	                    <td><a href="#" title="Yardım" onclick="javascript:index_page('help');"><img src="images/btn/b08.gif" height="42" alt="" border="0"></a></td>
	            </tr></table></td></tr><tr><td background="images/index/fon_top02.gif" width="740" height="37" align="right"><table border="0" cellpadding="5" cellspacing="0" background=""><tr>
							<td width="100" align="left" style="font-size:9px;font-weight:bold;">Dolar <? echo KurGoster("dolar");?> YTL<br />Euro&nbsp; <? echo KurGoster("avro");?> YTL</td>
							<form name="formArama" action=" " method="get"><td width="305" align="left"><input type="hidden" name="page" value="search" />
								<input type="text" name="AraText" size="17" value="<? echo"$AraText";?>" /><select name="AraKat">
                                <option value="-1"<? if($AraKat=="-1"){echo" selected='selected'";}?>>Tüm Kategoriler</option>
                                <? $sec="select * from kategori order by KategoriAd Asc";$sor=mysql_query($sec);
								while($oku=mysql_fetch_assoc($sor)){if($oku[id]!='0'){?><option value='<? echo"$oku[id]";?>'<? if($AraKat==$oku[id]){echo" selected='selected'";}echo">$oku[KategoriAd]</option>";}}?>
                                <option value="0"<? if($AraKat=="0"){echo" selected='selected'";}?>>Diğerleri</option>
								</select><input type="submit" value="  Ara  " />
							</td></form>
							<td width="30" align="center"><a href="#" class="titlemini" onclick="javascript:index_page('search_detail');">Detaylı<br>Ara</a></td>
	                        <td width="195" align="left">
								<? if(!$_SESSION["UserID"]){
									echo("<a href='?page=member_new_user' title='Üye Ol !'><img src='images/btn/b_uyeol.gif' border='0' alt='Üye Ol !' /></a> &nbsp;&nbsp;&nbsp;&nbsp;");
									echo("<a href='?page=member' title='Oturum Aç'><img src='images/btn/b_login.gif' border='0' alt='Oturum Aç' /></a>");
								}else{echo("<a href='?page=member_logout' title='Oturumu Kapat'><img src='images/btn/b_logout.gif' border='0' alt='Oturumu Kapat' /></a>");}?>
	                        </td>
                </tr></table></td></tr></table>
		</td></tr>
    </table><table border="0" cellpadding="0" cellspacing="0" width="850" align="center">
        <tr valign="top"><td width="149" rowspan="3"><br>
			<? $satno=10;if(substr($page,0,4)=="help"){?>
				<table border="0" cellpadding="0" cellspacing="0" width="149" background="images/index/fon_left02.gif">
                	<tr><td background="images/index/left01.gif" height="26"><p class="title">YARDIM</p></td></tr><tr><td>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_yeniuye');">Yeni Üyeler</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_alan');">Alıcı Rehberi</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_satan');">Satıcı Rehberi</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_artirimbitince');">Açık Artırma Bitince</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_hesap');">Hesabım</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_sozlesme');">Sözleşme Koşulları</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_kural');">Site Kuralları</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_sss');">Sıkça Sorulan Sorular</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_biz');">Hakkımızda</a></p>
						<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="#" onclick="javascript:index_page('help_gizli');">Gizlilik Politikası</a></p>
		            </td></tr><tr><td><img src="images/index/left_bot02.gif" alt="" width="149" height="17" border="0"></td></tr>
            	</table>
			<? }else{?>
				<table border="0" cellpadding="0" cellspacing="0" width="149" background="images/index/fon_left02.gif">
                	<tr><td background="images/index/left01.gif" height="26"><p class="title">KATEGORİLER</p></td></tr><tr><td>
						<? @$sec=mysql_query("select * from kategori order by KategoriAd Asc");@$satno=mysql_num_rows($sec);
						while(@$oku=mysql_fetch_assoc($sec)){if($oku[id]!=0) {
								echo("<p class='b01'><img src='images/index/e02.gif' width='6' height='5' alt='' border='0' align='absmiddle'>&nbsp;&nbsp;<a href='?page=search&AraKat=$oku[id]'>$oku[KategoriAd]</a></p>");
	                    		echo("<div align='center'><img src='images/index/hr01.gif' width='137' height='3' alt='' border='0'></div>");
						}}?>
	                    <p class="b01"><img src="images/index/e02.gif" width="6" height="5" alt="" border="0" align="absmiddle">&nbsp;&nbsp;<a href="./?page=search&amp;AraKat=0">Diğerleri</a></p>
		            </td></tr><tr><td><img src="images/index/left_bot02.gif" alt="" width="149" height="17" border="0"></td></tr>
            	</table>
			<? }?>
			</td><td colspan="3" background="images/index/mid_t2.gif"><table border="0" cellpadding="0" cellspacing="0" width="701">
					<tr><td width="15"><img src="images/index/mid_t1.gif" alt="" border="0" align="absbottom"></td><td>&nbsp;</td>
					<td width="15"><img src="images/index/mid_t3.gif" alt="" border="0" align="absbottom"></td></tr>
		</table></td></tr><tr><td bgcolor="#979797"><img src="images/index/px1.gif" width="1" height="1" alt="" border="0"></td><td bgcolor="#FFFFFF" width="699" height="<? echo(($satno+1)*22);?>" valign="top" id="Center_Content"><p class="px5">


<? 
if(substr($page,0,6)=="member"){include("uye.php");}
else if(substr($page,0,7)=="account"){include("hesap.php");}
else if(substr($page,0,4)=="help"){include("help.php");}
else if(substr($page,0,4)=="sale"){include("sat.php");}
else if(substr($page,0,6)=="search"){include("arama.php");}
else if($page=="cart"){include("sepet.php");}
else if($page=="buy"){include("hemenal.php");}
else if($page=="pay"){include("ode.php");}
else if($page=="detail"){include("detay.php");}
else if($page=="last"){
	@$sc="select * from stok";@$sr=mysql_query($sc);$bugun=date("YmdHis");?> 
	<table border="0" cellpadding="0" cellspacing="5" align="center" width="97%">
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Son Gün&nbsp; </td></tr></table></td></tr>
		<? while(@$oku=mysql_fetch_assoc($sr)){$i=SearchShow2("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$oku[MusteriID]","$i","yes");}if($i==1)echo"<td width='50%'>&nbsp;</td>";?>
	</table>
<? }else if($page=="cats"){?>
	<table align="center"><tr><? $i=0;$sec=mysql_query("select * from kategori order by KategoriAd Asc");while($oku=mysql_fetch_assoc($sec)){
	echo"<td><a href='?page=search&AraKat=$oku[id]'><img src='images/kategori/$oku[id].gif' border=0 /><br />$oku[KategoriAd]</a></td>";$i++;if($i==5){echo"</tr><tr>";$i=0;};}?></tr></table>
<? }else{?>
	<table border="0" cellpadding="0" cellspacing="4" align="center" width="97%">
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Vitrin&nbsp; </td></tr></table></td></tr>
		<? $q=0;$trh=date("YmdHis");@$sec=mysql_query("select * from stok where vitrin='1' and durum='1' and trh>$trh");while(@$oku=mysql_fetch_assoc($sec)){
		$vtr_list0[$q]=$oku[id];$vtr_list1[$q]=$oku[tarih];$vtr_list2[$q]=$oku[title];$vtr_list3[$q]=$oku[fiyat];$vtr_list4[$q]=$oku[bold];$vtr_list5[$q]=$oku[hemen];$vtr_list6[$q]=$oku[MusteriID];$vtr_list[$q]=$q;$q++;}
		if($q){@shuffle($vtr_list);$i=0;for($vtr=0;$vtr<6;$vtr++){$tmp=$vtr_list[$vtr];$i=SearchShow2("$vtr_list1[$tmp]","$vtr_list0[$tmp]","$vtr_list2[$tmp]","$vtr_list3[$tmp]","$vtr_list4[$tmp]","$vtr_list5[$tmp]","$vtr_list6[$tmp]","$i","no");} 
		if($i==1)echo"<td width='50%'>&nbsp;</td></tr>";}?>
	</table>
<? }?>


            </p></td>
	        <td bgcolor="#979797"><img src="images/index/px1.gif" width="1" height="1" alt="" border="0"></td>
        </tr><tr><td colspan="3" background="images/index/mid_b2.gif"><table border="0" cellpadding="0" cellspacing="0" width="701">
			<tr><td width="15"><img src="images/index/mid_b1.gif" alt="" border="0" align="absbottom"></td><td>&nbsp;</td><td width="15"><img src="images/index/mid_b3.gif" alt="" border="0" align="absbottom"></td></tr>
		</table></td></tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="850" align="center"><tr><td width="202" background="images/index/bot_1.gif">&nbsp;</td>
	    	<td height="38" align="right" background="images/index/bot_2.gif"><table border="0" cellpadding="0" cellspacing="0" width="490"><tr><td><p class="menu02" align="center">
                        <a href="#" onclick="javascript:index_page('');">Anasayfa</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="javascript:index_page('help_biz');">Hakkımızda</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="javascript:index_page('help_iletisim');">İletişim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="javascript:index_page('help');">Yardım</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="javascript:index_page('help_sss');">SSS</a>
			</p></td></tr></table></td><td width="51" background="images/index/bot_3.gif">&nbsp;
	</td></tr><tr><td colspan="3" align="center"><small><br />Copyright &copy;2007<br /><br /></small></td></tr></table>
</body></html>