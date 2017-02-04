<? if($Pay_List and (!$adi or !$soyadi or !$number or !$cv2)){?>
 	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.payForm.adi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.payForm.soyadi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.payForm.number.value.length!=16){alert("Lütfen kredi kartý numaranýzý eksiksiz yazýnýz !\n");return false;}
			else if (document.payForm.cv2.value.length!=3){alert("Lütfen CVC2 numaranýzý eksiksiz yazýnýz !\n");return false;}
			else {return true;}
		}
	// --></script>
	<form action="?page=pay&i=<? echo"$i"; ?>" method="post" name="payForm" onSubmit="return CheckForm();"><TABLE cellSpacing=0 cellPadding=0 width="80%" border=0 align="center">
		<? if($PayIt){
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
			if(!$Ad or !$Soyad or !$Adres or !$adi or !$soyadi or !$number or !$cv2){
				echo("<tr><td colspan=2 align=center><font class='hatan'>Lütfen boþ kýsýmlarý doldurun !</font></td></tr>");
			}else if(strlen($cv2)<>3)echo"<tr><td colspan=2 align=center><font class='hatan'>Lütfen CVC2 numaranýzý eksiksiz yazýnýz !</font></td></tr>";
			else if(strlen($number)<>16)echo"<tr><td colspan=2 align=center><font class='hatan'>Lütfen kredi kartý numaranýzý eksiksiz yazýnýz !</font></td></tr>";
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
		}else echo"<tr><td colspan='2'><br /><br /></td></tr>";?>
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kredi Kartý Bilgisi&nbsp; </td></tr></table></td></tr>
		<TR><TD height=26>Kart Sahibinin Adý :</TD><TD> &nbsp;<INPUT type="text" id="adi" name="adi"></TD></TR>
        <TR><TD width=220 height=26>Kart Sahibinin Soyadý :</TD><TD> &nbsp;<INPUT type="text" id="soyadi" name="soyadi"></TD></TR>
        <TR><TD height=26>Kredi Kartý Numaranýz:<BR><SMALL><SPAN style="COLOR: #666666">( Boþluk Býrakmayýnýz )</SPAN></SMALL></TD><TD> &nbsp;<INPUT type="text" id="number" maxLength="16" name="number"></TD></TR>
        <TR><TD height=26>CVC2 Numaranýz :<BR><SMALL><SPAN style="COLOR: #666666">( Kartýnýzýn arkasýndaki son 3 hane )</SPAN></SMALL></TD><TD> &nbsp;<INPUT type="text" id="cv2" maxLength="3" size="3" name="cv2"></TD></TR>
        <TR><TD height=26>Son Kullanma Tarihi :</TD><TD> &nbsp;<SELECT size="1" name="expmon"><? for($q=1;$q<=12;$q++){if(strlen($q)==1){$q="0".$q;}echo"<OPTION value='$q'>$q</OPTION>";} ?></SELECT>
		<SELECT size=1 name="expyear"> <? for($q=0;$q<=10;$q++){$yil=date("y")+$q;if(strlen($q)==1){$yil="0".$yil;}echo"<OPTION value='$yil'>20$yil</OPTION>";} ?></SELECT></TD></TR>
        <TR><TD colspan="2"><br /><br /><input type="text" name="Urun_Ucret" value="<? echo"$Urun_Ucret";?>" /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /></TD></TR>
        <TR><TD colspan="2" align="center"><INPUT id="PayIt" type="image" src="images/btn/b_ode.gif" value="Ödeme yap" name="PayIt"></TD></TR>
	</TABLE></form>
<? }else if($Pay_Buy and (!$Ad or !$Soyad or !$Adres or !$adi or !$soyadi or !$number or !$cv2)){
	$sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
?>
 	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.frmode.Ad.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.Soyad.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.Adres.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.adi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.soyadi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.number.value.length!=16){alert("Lütfen kredi kartý numaranýzý eksiksiz yazýnýz !\n");return false;}
			else if (document.frmode.cv2.value.length!=3){alert("Lütfen CVC2 numaranýzý eksiksiz yazýnýz !\n");return false;}
			else {return true;}
		}
	// --></script>
	<form action="?page=pay&i=<? echo"$i";?>" id="frmode" name="frmode" method="post" onSubmit="return CheckForm();"><table width="90%" align="center" border="0">
		<? if($PayIt){
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
			if(!$Ad or !$Soyad or !$Adres or !$adi or !$soyadi or !$number or !$cv2){
				echo("<tr><td colspan=2 align=center><font class='hatan'>Lütfen boþ kýsýmlarý doldurun !</font></td></tr>");
			}else if(strlen($cv2)<>3)echo"<tr><td colspan=2 align=center><font class='hatan'>Lütfen CVC2 numaranýzý eksiksiz yazýnýz !</font></td></tr>";
			else if(strlen($number)<>16)echo"<tr><td colspan=2 align=center><font class='hatan'>Lütfen kredi kartý numaranýzý eksiksiz yazýnýz !</font></td></tr>";
			echo("<tr><td colspan='2' align='center'>&nbsp;<hr>&nbsp;</td></tr>");
		}else echo"<tr><td colspan='2'><br /><br /></td></tr>";?>
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Teslimat Bilgisi&nbsp; </td></tr></table></td></tr>
		<tr><td align="center" colspan="2">Satýn aldýðýnýz ürün aþaðýdaki adrese gönderileceðinden lütfen adresinizi doðru ve tam giriniz.<br /><br /></td></tr>
		<tr><td width="35%">Adýnýz *</td><td><input size="20" type="text" name="Ad" value="<? echo "$oku[ad]"; ?>"></td></tr>
		<tr><td>Soyadýnýz *</td><td><input size="20" type="text" name="Soyad" value="<? echo "$oku[soyad]"; ?>"></td></tr>
		<tr><td>Adresiniz *</td><td><textarea cols="40" rows="5" name="Adres"><? echo "$oku[adres]"; ?></textarea></td></tr>
		<tr><td>Þehir</td><td><select size="1" name="sehir"><? $sec_sehir=mysql_query("select * from sehir order by plaka asc");
			while($oku_sehir=mysql_fetch_assoc($sec_sehir)){if(intval($oku_sehir[plaka])!=0){?> <option value='<? echo("$oku_sehir[plaka]");?>'<? if(intval($oku[sehir])==intval($oku_sehir[plaka]))echo" selected='selected'";?>><? echo("$oku_sehir[ad]");?></option><? }}?>
            <option value="00"<? if(intval($oku[sehir])==0)echo" selected='selected'";?>>Diðer Yerler</option></select>
		</td></tr>
		<tr><td>Ýlçe</td><td valign="top"><input size="20" type="text" name="ilce" value="<? echo "$oku[ilce]"; ?>"></td></tr>
		<tr><td colspan="2"><br /><br /><input type="hidden" name="tutar" value="<? if($info=="timeout")echo"$en_oku[teklif]"; else echo"$oku2[hemen]" ?>" /></td></tr>
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kredi Kartý Bilgisi&nbsp; </td></tr></table></td></tr>
		<tr><TD height=26>Kart Sahibinin Adý :</TD><TD> &nbsp;<INPUT type="text" id="adi" name="adi"></TD></TR>
        <TR><TD width=220 height=26>Kart Sahibinin Soyadý :</TD><TD> &nbsp;<INPUT type="text" id="soyadi" name="soyadi"></TD></TR>
		<TR><TD height=26>Kredi Kartý Numaranýz:<BR><SMALL><SPAN style="COLOR: #666666">(Boþluk Býrakmayýnýz)</SPAN></SMALL></TD><TD> &nbsp;<INPUT type="text" id="number" maxLength="16" name="number"></TD></TR>
		<TR><TD height=26>CVC2 Numaranýz :<BR><SMALL><SPAN style="COLOR: #666666">(Kartýnýzýn arkasýndaki son 3 hane)</SPAN></SMALL></TD><TD> &nbsp;<INPUT type="text" id="cv2" maxLength="3" size="3" name="cv2"></TD></TR>				
        <TR><TD height=26>Son Kullanma Tarihi :</TD><TD> &nbsp;
			<SELECT size=1 name=expmon><? for($q=1;$q<=12;$q++){if(strlen($q)==1){$q="0".$q;}echo"<OPTION value='$q'>$q</OPTION>";} ?></SELECT>
			<SELECT size=1 name=expyear> <? for($q=0;$q<=10;$q++){$yil=date("y")+$q;if(strlen($q)==1){$yil="0".$yil;}echo"<OPTION value='$yil'>20$yil</OPTION>";} ?></SELECT>
		</TD></TR>
        <TR><TD colspan="2"><br /><br /><input type="text" name="Urun_Ucret" value="<? echo"$Urun_Ucret";?>" /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /></TD></TR>
        <TR><TD colspan="2" align="center"><INPUT id="PayIt" type="image" src="images/btn/b_ode.gif" value="Ödeme yap" name="PayIt"></TD></TR>
	</table></form>
<? }else if($PayIt and ($psid==$PHPSESSID)){
	$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);$sure=$oku[tarih];
	if($sure<100){
		$tarih=mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$sure,date("y"));$trh=date("Ym");$trh.=date("d")+$sure;$trh.=date("His");
		$guncelle=mysql_query("UPDATE stok SET durum='1',trh='$trh',tarih='$tarih' where id='$i'");
	}
}?>
