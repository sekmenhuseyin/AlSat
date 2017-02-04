<? if($_SESSION["UserID"]==""){$MID=$PHPSESSID;}else{$MID=$_SESSION["UserID"];}
if ($act=="sil"){$sec3="delete from sepet where id='$i'";$sor_sil=mysql_query($sec3);}
if ($act=='ekle'){
	$sor=mysql_query("select * from stok where id='$i'");$sat_num=mysql_num_rows($sor);
	$sec_sep=mysql_query("select * from sepet where StokID='$i' and MusteriID='$MID'");$sat_num2=mysql_num_rows($sec_sep);
	if(($sat_num!=0) and ($sat_num2==0)){
		$oku=mysql_fetch_assoc($sor);$ekle=mysql_query("insert into sepet(MusteriID,StokID,fiyat,adet) values('$MID','$oku[id]','$oku[fiyat]','$oku[adet]')");
	} 
}
$sec="select * from sepet where MusteriID='$MID'";$sor=mysql_query($sec);?>
 	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.frmode.Ad.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.Soyad.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.Tel.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.Adres.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.sehir.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.adi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.soyadi.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.number.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.cv2.value==""){alert("Lütfen tüm alanlarý doldurunuz !\n");return false;}
			else if (document.frmode.number.value.length!=16){alert("Lütfen kredi kartý numaranýzý eksiksiz yazýnýz !\n");return false;}
			else if (document.frmode.cv2.value.length!=3){alert("Lütfen CVC2 numaranýzý eksiksiz yazýnýz !\n");return false;}
				else {return true;}
		}
	// --></script>
	<form action="?act=ode" id="frmode" name="frmode" method="post" onSubmit="return CheckForm();"><table width="90%" align="center" border="0">
		<tr><td colspan="2" background="images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Bilgisi&nbsp; </td></tr></table>
		</td></tr>
		<tr><td colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr><th>Resim</th><th>Baþlýk</th><th>Fiyat</th><th>Adet</th><th>Ýþlem</th></tr>
				<tr><td colspan="5"><hr /></tr>
				<? $toplam=0;$i=0;while($oku=mysql_fetch_assoc($sor)){
					$sec2="select * from stok where id='$oku[StokID]'";$sor2=mysql_query($sec2);$okur=mysql_fetch_assoc($sor2);
					$sec5="select * from stok_resim where StokID='$oku[StokID]'";$sor3=mysql_query($sec5);$oku3=mysql_fetch_assoc($sor3);
					$toplam=intval($toplam)+intval($okur[hemen]);?>
					<tr bgcolor="<? if($i){echo"#80C5FD";$i=0;}else{echo"#BCE0FE";$i++;} ?>">
						<td><img src="<? if($oku3[resimtitle])echo"uploads/$oku3[resimtitle]";else echo"images/index/nophoto.gif";?>" width="70" height="70"></td>
						<td align="center"><? echo $okur[title];?></td>
						<td align="center"><? echo $okur[hemen];?></td>
						<td align="center"><? echo $okur[adet];?></td>
						<td align="center"> <a href="?act=sil&i=<? echo"$oku[id]";?>">Sil</a> </td>
					</tr>
				<? }?>
			</table>
		</td></tr>
		<tr><td colspan="2" align="right">Toplam Fiyat: <? echo $toplam;?></td></tr>
		<tr><td colspan="2"><br /></tr>
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Teslimat Bilgisi&nbsp; </td></tr></table></td></tr>
		<? $sec="select * from uye_active where id='$_SESSION[UserID]'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor)?>
		<tr><td width="35%">Adýnýz *</td><td> &nbsp;<input size="20" type="text" name="Ad" value="<? echo "$oku[ad]"; ?>"></td></tr>
		<tr><td>Soyadýnýz *</td><td> &nbsp;<input size="20" type="text" name="Soyad" value="<? echo "$oku[soyad]"; ?>"></td></tr>
		<tr><td>Telefonunuz *</td><td> &nbsp;<input size="20" type="text" name="Tel" value="<? echo "$oku[tel]"; ?>"></td></tr>
		<tr><td>Adresiniz *</td><td> &nbsp;<textarea cols="40" rows="5" name="Adres"><? echo "$oku[adres]"; ?></textarea></td></tr>
		<tr><td>Þehir *</td><td> &nbsp;<input size="20" type="text" name="sehir" value="<? echo "$oku[sehir]"; ?>"></td></tr>
		<tr><td>Ýlçe</td><td valign="top"> &nbsp;<input size="20" type="text" name="ilce" value="<? echo "$oku[ilce]"; ?>"></td></tr>
		<tr><td colspan="2"><br /><br /><input type="hidden" name="tutar" value="<? echo"$toplam" ?>" /></td></tr>
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kredi Kartý Bilgisi&nbsp; </td></tr></table></td></tr>
		<tr><TD height=26>Kart Sahibinin Adý :</TD><TD class=ariver12> &nbsp;<INPUT type="text" id="adi" name="adi"></TD></TR>
        <TR><TD width=220 height=26>Kart Sahibinin Soyadý :</TD><TD class=ariver12> &nbsp;<INPUT type="text" id="soyadi" name="soyadi"></TD></TR>
		<TR><TD height=26><div>Kredi Kartý Numaranýz:<BR><SMALL><SPAN style="COLOR: #666666">(Boþluk Býrakmayýnýz)</SPAN></SMALL></div></TD><TD> &nbsp;<INPUT type="text" id="number" maxLength="16" name="number"></TD></TR>
		<TR><TD height=26><div>CVC2 Numaranýz :<BR><SMALL><SPAN style="COLOR: #666666">(Kartýnýzýn arkasýndaki son 3 hane)</SPAN></SMALL></div></TD><TD> &nbsp;<INPUT type="text" id="cv2" maxLength="3" size="3" name="cv2"></TD></TR>				
        <TR><TD height=26><div>Son Kullanma Tarihi :</div></TD><TD class=ariver12> &nbsp;
			<SELECT size=1 name=expmon><? for($q=1;$q<=12;$q++){if(strlen($q)==1){$q="0".$q;}echo"<OPTION value='$q'>$q</OPTION>";} ?></SELECT>
			<SELECT size=1 name=expyear><? for($q=6;$q<=16;$q++){if(strlen($q)==1){$q="0".$q;}echo"<OPTION value='$q'>20$q</OPTION>";} ?></SELECT>
		</TD></TR>
		<tr><td colspan="2"><br /><br /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" value="  Ödeme Onayý  " name="ode"></td></tr>
	</table></form>
