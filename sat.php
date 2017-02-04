<? 
if (($p==2) and (($submit and $adet and (intval($adet)!=0) and ($fiyat or $hemen) and ((intval($fiyat)!=0 or intval($hemen)!=0)) and $title and ($psid==$PHPSESSID)) or $i)){
		$ozellik=$cmts;$title=htmlspecialchars($title,ENT_QUOTES);$krgNot=htmlspecialchars($krgNot,ENT_QUOTES);if($vitrin=="on"){$vitrin=1;}else{$vitrin=0;}if($bold=="on"){$bold=1;}else{$bold=0;}
		if($i and $submit){
			$guncelle=mysql_query("UPDATE stok SET adet='$adet',fiyat='$fiyat',hemen='$hemen',tarih='$sure',trh='$sure',title='$title',ozellik='$ozellik',KatID='$KatID',krgSehir='$krgSehir',krgUcret='$krgUcret',krgNot='$krgNot',bold='$bold',vitrin='$vitrin' where id='$i'");
			$sec_resim=mysql_query("select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='$i'");$resim=mysql_num_rows($sec_resim);
		}else if($i and !$submit){
			$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
			$fiyat=$oku[fiyat];$hemen=$oku[hemen];$vitrin=$oku[vitrin];$bold=$oku[bold];
			$sec_resim=mysql_query("select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='$i'");$resim=mysql_num_rows($sec_resim);
		}else{
			$MusteriID=$_SESSION["UserID"];$date=$sure;$trh=$sure;$durum=0;
			$ekle = mysql_query("INSERT INTO stok(adet, fiyat, hemen, tarih, trh, title, MusteriID, ozellik, KatID, durum, krgSehir, krgUcret, krgNot, bold, vitrin) VALUES
			('$adet', '$fiyat', '$hemen', '$date', '$trh', '$title', '$MusteriID', '$ozellik', '$KatID', '$durum', '$krgSehir', '$krgUcret', '$krgNot', '$bold', '$vitrin')");
			$sec="select * from stok where adet='$adet' and fiyat='$fiyat' and hemen='$hemen' and tarih='$date' and trh='$trh' and title='$title' and MusteriID='$MusteriID' 
			and ozellik='$ozellik' and KatID='$KatID' and durum='$durum' and krgSehir='$krgSehir' and krgUcret='$krgUcret' and krgNot='$krgNot' and bold='$bold' and vitrin='$vitrin'";
			$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);$i=$oku[id];
			$sec_resim=mysql_query("select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='0'");$resim=mysql_num_rows($sec_resim);$rsm_title=$resim;
			while($rsm_title){$guncelle=mysql_query("UPDATE stok_resim SET StokID='$i' where MusteriID='$_SESSION[UserID]' and StokID='0'");$rsm_title--;}
		}
		if($fiyat){$totalList=(intval($fiyat)*0.1);}else if($hemen){$totalList=(intval($hemen)*0.1);}$totalTutar=$totalList;
		$totalTutar=$totalTutar+(0.25*$resim);if($vitrin){$totalTutar=$totalTutar+0.75;}if($bold){$totalTutar=$totalTutar+0.5;}?>
		<table width="95%" align="center"><tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ücret Bilgisi&nbsp; </td></tr></table></td></tr></table>
		<table align="center" border="0" cellpadding="0" cellspacing="3">
			<tr><td width=120><b>Servis</b></td><td><b>Ücreti</b></td></tr>
			<tr><td>Temel Listeleme</td><td><? echo"$totalList";?></td></tr>
			<? if($resim>0) echo("<tr><td>Resim Yayýnlama</td><td>".(0.25*$resim)."</td></tr>"); ?>
			<? if($vitrin)echo("<tr><td>Vitrin</td><td>0.75</td></tr>"); ?>
			<? if($bold)echo("<tr><td>Kalýn Baþlýk</td><td>0.5</td></tr>"); ?>
			<tr><td><b>Toplam</b></td><td><b><? echo($totalTutar);?> YTL</b></td></tr>
			<tr><td colspan="2" align="center"><br /><form action="?page=pay&i=<? echo"$i";?>" method="post"><input type="hidden" name="Urun_Ucret" value="<? echo($totalTutar);?>" />
			<input type="submit" value="Ücreti Öde !" name="btn_Urun_Ucret_Ode" /></form></td></tr>
		</table>
		
		
		
<? }else{
		$sec=mysql_query("select * from stok where id='$i'");$oku=mysql_fetch_assoc($sec);
		if($i){
			$title=$oku[title];$KatID=$oku[KatID];$adet=$oku[adet];$fiyat=$oku[fiyat];$hemen=$oku[hemen];$sure=$oku[trh];$cmts=$oku[ozellik];
			$vitrin=$oku[vitrin];$bold=$oku[bold];$krgSehir=$oku[krgSehir];$krgUcret=$oku[krgUcret];$krgNot=$oku[krgNot];$_SESSION[temp]=$i;
		}else{
			$_SESSION[temp]=0;$KatID=1;$adet=1;$fiyat=0;$hemen=0;$sure=3;$krgSehir=1;
		}
		$trh=date("YmdHis");if((($oku[trh]>30) or ($oku[tarih]>30) or ($oku[durum]!=0)) and ($oku[trh]>$trh))echo"<script language=\"JavaScript\">window.location.href='?page=detail&i=$i';</script>";?>
		<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.formSat.title.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.formSat.fiyat.value=="" && document.formSat.hemen.value==""){alert("Lütfen fiyatýný veya Hemen Al! fiyatýný doldurunuz !\n");return false;}
			else if (document.formSat.fiyat.value=="0" && document.formSat.hemen.value=="0"){alert("Lütfen fiyatýný veya Hemen Al! fiyatýný doldurunuz !\n");return false;}
			else if (document.formSat.adet.value==""){alert("Lütfen ürünün adedini belirtiniz !\n");return false;}
			else if (document.formSat.adet.value=="0"){alert("Lütfen ürünün adedini belirtiniz !\n");return false;}
			else {return true;}
		}
		function win(url) {
			config='toolbar=no,location=no,directories=no,status=no,menubar=no,width=400,height=300,top=30,left=40,scrollbars=yes,resizable=yes';
			window.open ('upload.php?a='+url,"Resimci",config);
		}
		// --></script>
		<form id="formSat" name="formSat" method="post" action="?page=sale&p=2<? if($i)echo"&i=$i";?>" onSubmit="return CheckForm();" autocomplete="off"><table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr><th colspan="4">Ürün Satýþ Formu</th></tr>
			<tr><td colspan="4" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Genel Bilgiler&nbsp; </td></tr></table>
			</td></tr>
			<? if($Submit) {?>
				<tr><td colspan="4" align='center'>&nbsp;<hr>&nbsp;</td></tr><? 
				if(($title=="") or ($fiyat=="") or ($hemen=="") or ($adet=="")){?>
					<tr><td colspan="4" align=center><font class='hatan'>Lütfen boþ kýsýmlarý doldurun !</font></td></tr><? }
				if(intval(fiyat)<=0 or intval(hemen)<=0){?><tr><td colspan="4" align=center><font class='hatan'>Lütfen ürünün fiyatýný belirleyin !</font></td></tr><? }?>
				<tr><td colspan="4" align='center'>&nbsp;<hr>&nbsp;<br /><br /></td></tr><? 
			}?>
			<tr>
				<td>Baþlýk *</td><td colspan="3"> &nbsp;<input type="text" size="57" name="title" value="<? echo"$title";?>" /></td>
			</tr>
			<tr><td colspan="4"><br /></td></tr>
			<tr>
				<td>Kategori</td><td> &nbsp;<select name="KatID">
	            	<? $secKat=mysql_query("select * from kategori order by KategoriAd Asc");while($okuKat=mysql_fetch_assoc($secKat)){
						if(($okuKat[id]!=0) and ($KatID!=$okuKat[id])) echo("<option value='$okuKat[id]'>$okuKat[KategoriAd]</option>");
						else if(($okuKat[id]!=0) and ($KatID==$okuKat[id])) echo("<option value='$okuKat[id]' selected='selected'>$okuKat[KategoriAd]</option>");
					}?>
					<option value="0"<? if($KatID==0)echo" selected='selected'";?>>Diðerleri</option>
				</select></td>
			<td>Adet *</td><td> &nbsp;<input type="text" name="adet" value="<? echo"$adet";?>" size="7" /></td></tr>
			<tr><td colspan="4"><br /><br /></td></tr>
			<tr><td colspan="4" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Fiyat ve Süre Bilgileri&nbsp; </td></tr></table>
			</td></tr>
			<tr><td width="10%">Fiyatý</td><td width="35%"> &nbsp;<input type="text" name="fiyat" value="<? echo"$fiyat"?>" size="7" /> YTL</td><td width="15%">Heman Al ! fiyatý</td><td> &nbsp;<input type="text" name="hemen" value="<? echo"$hemen";?>" size="7" /> YTL</td></tr>
			<tr><td colspan="4"><br /></td></tr>
			<tr>
				<td>Süre</td><td> &nbsp;<select name="sure">
					<option value="3"<? if($sure==3)echo" selected='selected'";?>>3 Günlük</option>
					<option value="5"<? if($sure==5)echo" selected='selected'";?>>5 Günlük</option>
					<option value="7"<? if($sure==7)echo" selected='selected'";?>>7 Günlük</option>
					<option value="11"<? if($sure==14)echo" selected='selected'";?>>14 Günlük</option>
					<option value="21"<? if($sure==21)echo" selected='selected'";?>>21 Günlük</option>
				</select></td>
			<td><input type="checkbox" name="vitrin"<? if($vitrin==1)echo" checked='checked'";?> />&nbsp; Vitrin</td>
			<td><input type="checkbox" name="bold"<? if($bold==1)echo" checked='checked'";?> />&nbsp; Kalýn Baþlýk</td></tr>
			<tr><td colspan="4"><br /><br /></td></tr>
			<tr><td colspan="4" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Açýklama&nbsp; </td></tr></table>
			</td></tr>
			<tr><td colspan="4"><? echo"$cmts<br />";include("data/editor.php");?><br /><br /></td></tr>
			<tr><td colspan="4" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Resimleri&nbsp; </td></tr></table>
			</td></tr>
			<tr><td colspan="4"><iframe width="600" height="180" name="resim_edit" src="upload.php" frameborder="0" marginheight="0" marginwidth="0"></iframe><br /><br /></td></tr>
			<tr><td colspan="4" background="images/index/fon_bar01.gif">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table>
			</td></tr>
			<tr><td>Bulunduðu þehir</td><td colspan="3"> &nbsp;
			  	<select size="1" name="krgSehir">
                	<? $sec_sehir="select * from sehir order by plaka Asc";$sor_sehir=mysql_query($sec_sehir);
					while($oku_sehir=mysql_fetch_assoc($sor_sehir)){if($oku_sehir[plaka]!='00'){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if(intval($krgSehir)==intval($oku_sehir[plaka]))echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
                	<option value="00"<? if(intval($krgSehir)==0)echo" selected='selected'";?>>Diðer Yerler</option>
              	</select></td>
			</tr>
			<tr><td>Kargo Ücreti</td><td colspan="3"> &nbsp;<input type="radio" name="krgUcret" value="0" checked="checked" />Alýcý Öder &nbsp;<input type="radio" name="krgUcret" value="1" <? if($krgUcret==1)echo" checked='checked'";?> />Satýcý Öder</td></tr>
			<tr><td valign="top">Kargo Notu</td><td colspan="3"> &nbsp;<textarea name="krgNot" cols="50" rows="3"><? echo"$krgNot";?></textarea><br /><br /><br /></td></tr>
			<tr><td colspan="4" align="center"><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><br /><input type="submit" name="submit" value="Devam >>" /></td></tr>
		</table></form>
		<script language="javascript">document.formSat.title.focus();</script>
<? }?>