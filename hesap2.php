<script language="JavaScript"><!-- 
	function searchSwitch(p,t){
		if(p=='1'){
			document.getElementById("stlk_list").style.display='none';
			document.getElementById("stlk_timeout").style.display='none';
			document.getElementById("stlk_ode").style.display='none';
			document.getElementById("stlk_buy").style.display='none';
		}else if(p=='2'){
			document.getElementById("tklf_ver").style.display='none';
			document.getElementById("tklf_win").style.display='none';
			document.getElementById("tklf_lose").style.display='none';
		}
		document.getElementById(t).style.display='';
	}
// --></script>
	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
				<td class="title01" align="center"><a href="?page=account_stlk"><? if($page=="account_stlk")echo"<big><u>Satýlýða Çýkardýklarým</u></big>";else echo"Satýlýða Çýkardýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_tklf"><? if($page=="account_tklf")echo"<big><u>Tekliflerim</u></big>";else echo"Tekliflerim";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_buy"><? if($page=="account_buy")echo"<big><u>Satýn Aldýklarým</u></big>";else echo"Satýn Aldýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_puan"><? if($page=="account_puan")echo"<big><u>Puanlama</u></big>";else echo"Puanlama";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_izle"><? if($page=="account_izle")echo"<big><u>Ýzlemeye Aldýklarým</u></big>";else echo"Ýzlemeye Aldýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_kisi"><? if($page=="account_kisi")echo"<big><u>Kiþisel Bilgilerim</u></big>";else echo"Kiþisel Bilgilerim";?></a></td>
		</tr></table></td></tr><tr><td colspan="6">
			<? $trh=date("YmdHis");if($page=="account_stlk"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tr>
					<td onclick="javascript:searchSwitch('1','stlk_list');" class="title02"><a class="title02" href="#">Listelenenler</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_timeout');" class="title02"><a class="title02" href="#">Zamaný Dolanlar</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_ode');" class="title02"><a class="title02" href="#">Ücreti Ödenecekler</a></td>
					<td onclick="javascript:searchSwitch('1','stlk_buy');" class="title02"><a class="title02" href="#">Sattýklarým</a></td>
				</tr></table>
			<? }else if($page=="account_tklf"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tr>
					<td onclick="javascript:searchSwitch('2','tklf_ver');" class="title02"><a class="title02" href="#">Verdiðim Teklifler</a></td>
					<td onclick="javascript:searchSwitch('2','tklf_win');" class="title02"><a class="title02" href="#">Kazandýðým Teklifler</a></td>
					<td onclick="javascript:searchSwitch('2','tklf_lose');" class="title02"><a class="title02" href="#">Kazanamadýðým Teklifler</a></td>
				</tr></table>
			<? }?>
		<hr /></td></tr><tr><td>
			<? if($page=="account_stlk"){?>
				<div id="stlk_list" name="stlk_list">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='1' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){if($oku[trh]>=$trh){$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"0");}}?>
				</table>
				</div><div id="stlk_timeout" name="stlk_timeout" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='1' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){if($oku[trh]<=$trh){$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"1");}}?>
				</table>
				</div><div id="stlk_ode" name="stlk_ode" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
	    			<? $sec="select id,title,KatID,fiyat,hemen,tarih from stok where MusteriID='$_SESSION[UserID]' and durum='0' order by title Asc";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],-$oku[tarih],$i,"2");}?>
				</table>
				</div><div id="stlk_buy" name="stlk_buy" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
	    			<? $sec="select id,title,KatID,fiyat,hemen from stok where MusteriID='$_SESSION[UserID]' and durum='3' order by title Asc";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
					while($oku=mysql_fetch_assoc($sor)){$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],"0",$i,"5");}?>
				</table>
				</div>
			<? }else if($page=="account_tklf"){?>
				<div id="tklf_ver" name="tklf_ver">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						if($oku[trh]>=$trh){$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"0");}}?>
				</table>
				</div><div id="tklf_win" name="tklf_win" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$en_oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						if(($oku[trh]<=$trh) and ($_SESSION["UserID"]==$en_oku[MusteriID])){$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"4");}}?>
				</table>
				</div><div id="tklf_lose" name="tklf_lose" style="display:none;">
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
    				<? $sec="select distinct StokID from stok_teklif where MusteriID='$_SESSION[UserID]'";$sor=mysql_query($sec);while($oku=mysql_fetch_assoc($sor)){
						$en_yuksek="select * from stok_teklif where StokID='$oku[StokID]' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
						$sec2="select id,title,KatID,fiyat,hemen,tarih from stok where id='$en_oku[StokID]'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						if(($oku[trh]<=$trh) and ($_SESSION["UserID"]!=$en_oku[MusteriID])){$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku2[fiyat],$oku2[hemen],$klnzmn,$i,"0");}}?>
				</table>
				</div>
			<? }else if($page=="account_buy"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
    				<? $sec="select * from stok_sale where alanID='$_SESSION[UserID]'";$sor=mysql_query($sec);
					while($oku=mysql_fetch_assoc($sor)){
						$sec2=mysql_query("select id,title,KatID,fiyat,hemen,tarih,durum from stok where id='$oku[StokID]'");$oku2=mysql_fetch_assoc($sec2);
						if($oku2[durum]==3){$i=StokShow($oku2[id],$oku2[title],$oku2[KatID],$oku[fiyat],"0","0",$i,"6");}
	 				}?>
				</table>
			<? }else if($page=="account_puan"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
					<tr><th>Üyenin Adý</th><th>Puaným</th><th>Yorumum</th><th>Ýþlem</th></tr>
	    			<? if(($istek=="puanlama") and $i and ($psid==$PHPSESSID)){
						$trh=date("d/m/Y");$guncelle=mysql_query("UPDATE uye_puan SET puan='$puan_val',yorum='$yorum_txt',tarih='$trh' where id='$i' and verenMID=$_SESSION[UserID] and puan='0'");
					}
					$sec=mysql_query("select * from uye_puan where verenMID='$_SESSION[UserID]' and puan='0'");
					while($oku=mysql_fetch_assoc($sec)){
						$sec_uye=mysql_query("select username from uye_active where id='$oku[verilenMID]'");$oku_uye=mysql_fetch_assoc($sec_uye);?>
						<form action="?page=account&p=puan&istek=puanlama&i=<? echo"$oku[id]";?>" method="post" name="frm_puan">
							<tr><td><? echo"$oku_uye[username]";?></td><td><input name="puan_val" type="radio" value="1" /><input name="puan_val" type="radio" value="2" />
							<input name="puan_val" type="radio" value="3" /><input name="puan_val" type="radio" value="4" /><input name="puan_val" type="radio" value="5" checked="checked" /><br /> 
							&nbsp; 1 &nbsp;&nbsp;&nbsp; 2 &nbsp;&nbsp;&nbsp; 3 &nbsp;&nbsp;&nbsp; 4 &nbsp;&nbsp;&nbsp; 5
							</td><td><textarea name="yorum_txt" rows="4" cols="60"></textarea></td>
							<td><input type="hidden" name="psid" value="<? echo"$PHPSESSID";?>" /><input type="submit" name="puanla" value="Onayla" /></td></tr>
						</form>
		 			<? }?>
				</table>
			<? }else if($page=="account_izle"){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
					<? if($i){
						$sec="select * from stok_teklif where MusteriID='$_SESSION[UserID]' and StokID='$i' ";$sor=mysql_query($sec);$sat_num=mysql_num_rows($sor);
						$sec2="select id,MusteriID from stok where id='$i'  ";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
						$sec3="select * from izleme where MusteriID='$_SESSION[UserID]' and StokID='$i'";$sor3=mysql_query($sec3);$sat_num3=mysql_num_rows($sor3);
						if(($sat_num==0) and ($_SESSION[UserID]!=$oku2[MusteriID]) and ($sat_num3==0)){
							$soru=mysql_query("insert into izleme(MusteriID,StokID) values($_SESSION[UserID],'$i')");?>
							<tr><td colspan="2" align="center"><font class='bildirim'>Ürün, izleme listenize eklendi !</font></td></tr><? 
						}else if($_SESSION[UserID]==$oku2[MusteriID]){?><tr><td colspan="2" align="center"><font class='hatan'>Bu sizin ürününüz !</font></td></tr><? 
						}else if($sat_num3!=0){?><tr><td colspan="2" align="center"><font class='bildirim'>Ürün, izleme listenize eklendi !</font></td></tr><? 
						}else if($sat_num!=0){?><tr><td colspan="2" align="center"><font class='hatan'>Bu ürüne teklif verdiniz !</font></td></tr><? 
						}
					}
					$secin="select * from izleme where MusteriID='$_SESSION[UserID]'";$soru=mysql_query($secin);?>
					<tr><th>Resim</th><th>Baþlýk</th><th>Kategori</th><th>Fiyat</th><th>Kalan Süre</th></tr>
					<? while($okur=mysql_fetch_assoc($soru)){
						$sec="select * from stok where id='$okur[StokID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
						$klnzmn=formatetimestamp($oku[tarih],"no"); 
						$i=StokShow($oku[id],$oku[title],$oku[KatID],$oku[fiyat],$oku[hemen],$klnzmn,$i,"0");
					} ?>
				</table>
			<? }else if($page=="account_kisi"){
				$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
				if($istek==dgstr){
					if(($submit) and ($psid==$PHPSESSID)){
						$guncelle=mysql_query("UPDATE uye_active SET ad='$ad',soyad='$soyad',EPosta='$EPosta',adres='$adres',tel='$tel',sehir='$sehir',ilce='$ilce' where id='$_SESSION[UserID]'");$bsr="blg";
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm1 () {
							if(document.frmBlg.EPosta.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else {return true;}
						}
						function kontrolet(){
							var str=document.frmBlg.EPosta.value;var filtrele=/^(\w+(?:\.\w+)*)@((?:\w+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
							if (filtrele.test(str)){}else{document.getElementById('hint_mail').innerHTML="<b>Mail adresinizi eksik yada yanlýþ girdiniz !</b><br /><br />";}
						}
						// --></script>
						<form name="frmBlg" method="post" action="?page=account_kisi&istek=dgstr" onSubmit="return CheckForm1();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr><td width="30%">Kullanýcý Adýnýz</td><td><? echo"$oku[username]";?></td></tr>
							<tr><td>Adýnýz</td><td><input type="text" name="ad" value="<? echo"$oku[ad]";?>" /></td></tr>
							<tr><td>Soyadýnýz</td><td><input type="text" name="soyad" value="<? echo"$oku[soyad]";?>" /></td></tr>
							<tr><td>E-Posta Adresiniz*</td><td><input type="text" name="EPosta" onblur="kontrolet();" value="<? echo"$oku[EPosta]";?>" /></td></tr>
							<tr><td></td><td><span id="hint_mail"></span></td></tr>
							<tr><td>Telefon Numaranýz</td><td><input type="text" name="tel" value="<? echo"$oku[tel]";?>" /></td></tr>
							<tr><td>Adresiniz</td><td><input type="text" name="adres" value="<? echo"$oku[adres]";?>" /></td></tr>
							<tr><td>Bulunduðunuz Þehir</td><td><select size="1" name="sehir">
                					<? $sec_sehir=mysql_query("select * from sehir order by plaka asc");
									while($oku_sehir=mysql_fetch_assoc($sec_sehir)){if(intval($oku_sehir[plaka])!=0){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if(intval($oku[sehir])==intval($oku_sehir[plaka]))echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
                					<option value="00"<? if(intval($oku[sehir])==0)echo" selected='selected'";?>>Diðer Yerler</option>
              					</select></td>
							</tr>
							<tr><td>Bulunduðunuz Ýlçe</td><td><input type="text" name="ilce" value="<? echo"$oku[ilce]";?>" /></td></tr>
							<tr><td colspan="2"><br /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /></td></tr>
							<tr><td align="center"><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?page=account&p=kisisel';" /></td><td><input type="submit" name="submit" value="Tamamla" /></td></tr>
						</table></form><br /><br />
						<script language="javascript">document.formBlg.ad.focus();</script>
					<? }
				}else if($istek==sfr){
					if($submit and ($new1_pass==$new2_pass) and ($oku[userpass]==md5($old_pass)) and (strlen($new1_pass)>=6) and ($psid==$PHPSESSID)){
						if ($new1_pass==$new2_pass){
							$guncelle=mysql_query("UPDATE uye_active SET userpass='".md5($new1_pass)."' where id='$_SESSION[UserID]'");$bsr=sfr;
						}else echo "<script language=\"JavaScript\">window.location.href = '?page=account_kisi&istek=sfr&err=new';</script>";
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm2 () {
							if (document.frmSfr.old_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new1_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new2_pass.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
							else if (document.frmSfr.new1_pass.value!=document.frmSfr.new2_pass.value){alert("Parolalarýnýz birbiriyle uyuþmuyor !\n");return false;}
							else if (document.frmSfr.new1_pass.value.length<6){alert("Parolanýz 6 haneden kýsa olamaz !\n");return false;}
							else {return true;}
						}
						// --></script>
  						<form name="frmSfr" action="?page=account_kisi&istek=sfr" method="post" onSubmit="return CheckForm2();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($Submit or $err) {
								if($Submit and (($old_pass=="") or ($new1_pass=="") or ($new2_pass==""))){?><tr><td colspan=2 align=center><font class='hatan'>Lütfen boþ kýsýmlarý doldurun !</font></td></tr><? };
								if($err=="new"){?><tr><td colspan=2 align=center><font class='hatan'>Þifreleriniz birbiriyle uyuþmuyor !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
      						<tr><td width="30%">Þu anki Þifreniz : &nbsp;</td><td><input name="old_pass" type="password" value="<? echo"$old_pass";?>" /></td></tr>
      						<tr><td>Yeni Þifreniz : &nbsp;</td><td><input name="new1_pass" type="password" value="<? echo"$new1_pass";?>" /></td></tr>
      						<tr><td>Yeni Þifreniz (Tekrar) : &nbsp;</td><td><input name="new2_pass" type="password" value="<? echo"$new2_pass";?>" /></td></tr>
     						<tr><td align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?page=account&p=kisisel';" /></td>
							<td><br /><input name="submit" type="submit" value="   Þifreyi Deðiþtir   " /></td></tr>
    					</table></form>
						<script language="javascript">document.formSfr.old_pass.focus();</script>
					<? }
				}else if($istek=="srcvp"){
					if($submit and (md5($userpass)==$oku[userpass]) and (strlen($userpass)>=6) and ($psid==$PHPSESSID)){
						$guncelle=mysql_query("UPDATE uye_active SET ozelcevap='".md5($ozelcevap)."',ozelsoru=$ozelsoru where id='$_SESSION[UserID]'");$bsr=srcvp;
					}else{?>
						<script language="JavaScript"><!-- 
						function CheckForm3 () {
							if (document.frmsrcvp.userpass.value==""){alert("Lütfen þifrenizi giriniz !\n");return false;}
							else if (document.frmsrcvp.userpass.value.length<6){alert("Lütfen þifrenizi eksiksiz giriniz !\n");return false;}
							else {return true;}
						}
						// --></script>
  						<form name="frmsrcvp" action="?page=account_kisi&istek=srcvp" method="post" onSubmit="return CheckForm3();"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($Submit) {
								if($Submit and ($userpass=="")){?><tr><td colspan=2 align=center><font class='hatan'>Lütfen þifrenizi giriniz !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
							<tr><td>Özel Sorunuz : &nbsp;</td><td><select name="ozelsoru">
								<option value="1" <? if($oku[ozelsoru]==1){ echo("selected='selected'");} ?>>En beðendiðiniz sporcu kimdir?</option>
								<option value="2" <? if($oku[ozelsoru]==2){ echo("selected='selected'");} ?>>En sevdiðiniz öðretmeniniz kimdir?</option>
								<option value="3" <? if($oku[ozelsoru]==3){ echo("selected='selected'");} ?>>Ýlkokulunuzun adý nedir?</option>
								<option value="4" <? if($oku[ozelsoru]==4){ echo("selected='selected'");} ?>>En sevdiðiniz oyuncu/yazar kimdir?</option>
								<option value="5" <? if($oku[ozelsoru]==5){ echo("selected='selected'");} ?>>Ýlk oyuncaðýnýz neydi?</option>
								<option value="6" <? if($oku[ozelsoru]==6){ echo("selected='selected'");} ?>>Evcil hayvanýnýzýn adý nedir?</option>
								<option value="7" <? if($oku[ozelsoru]==7){ echo("selected='selected'");} ?>>En büyük kahramýnýz kim?</option>
							</select></td></tr>
      						<tr><td>Cevabýnýz : &nbsp;</td><td><input name="ozelcevap" type="text" value="<? echo"$ozelcevap";?>" /></td></tr>
      						<tr><td>Þifreniz : &nbsp;</td><td><input name="userpass" type="password" value="<? echo"$userpass";?>" /></td></tr>
     						<tr><td align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="button" value="   Ýptal   " name="btn_iptal" onclick="javascript:window.location.href='?page=account&p=kisisel';" /></td>
							<td><br /><input name="submit" type="submit" value="   Sorumu ve Cevabýmý Deðiþtir   " /></td></tr>
    					</table></form>
						<script language="javascript">document.frmsrcvp.ozelsoru.focus();</script>
					<? }
				}
				if(!$istek or $bsr){
					$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
					$sec_sehir=mysql_query("select ad from sehir where plaka='$oku[sehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<? if($bsr) {
								if($bsr=="blg"){?><tr><td colspan=2 align=center><font class='bildirim'>Bilgileriniz güncellendi !</font></td></tr><? }
								if($bsr=="sfr"){?><tr><td colspan=2 align=center><font class='bildirim'>Þifreniz deðiþti !</font></td></tr><? }
								if($bsr=="srcvp"){?><tr><td colspan=2 align=center><font class='bildirim'>Özel sorunuz ve cevabýnýz deðiþti !</font></td></tr><? }?>
								<tr><td colspan='2' align='center'><br /></td></tr>
							<? }?>
						<tr><td width="30%">Kullanýcý Adýnýz</td><td><? echo"$oku[username]";?></td></tr>
						<tr><td>Adýnýz</td><td><? echo"$oku[ad]";?></td></tr>
						<tr><td>Soyadýnýz</td><td><? echo"$oku[soyad]";?></td></tr>
						<tr><td>E-Posta Adresiniz</td><td><? echo"$oku[EPosta]";?></td></tr>
						<tr><td>Telefon Numaranýz</td><td><? echo"$oku[tel]";?></td></tr>
						<tr><td>Adresiniz</td><td><? echo"$oku[adres]";?></td></tr>
						<tr><td>Bulunduðunuz Þehir</td><td><? $sec_sehir=mysql_query("select * from sehir where plaka='$oku[sehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);echo"$oku_sehir[ad]";?></td></tr>
						<tr><td>Bulunduðunuz Ýlçe</td><td><? echo"$oku[ilce]";?></td></tr>
					</table><br />
					<a href="?page=account_kisi&istek=dgstr">Kiþsel Bilgilerimi Deðiþtir</a><br />
					<a href="?page=account_kisi&istek=sfr">Þifremi Deðiþtir</a><br />
					<a href="?page=account_kisi&istek=srcvp">Özel Sorumu ve Cevabýmý Deðiþtir</a><br />
				<? }
			}?>
		<br /><br /></td></tr>
	</table>	
