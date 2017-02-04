<? 	$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor); 
	if($oku[tarih]<100 and $oku[durum]=='0'){$klnzmn="$oku[tarih] günlük ürün henüz iþleme alýnmadý.";}else{$klnzmn=formatetimestamp($oku[tarih],"no");if(!$klnzmn){$klnzmn="Süresi dolmuþtur !";}}?>
	<script language="JavaScript"><!-- 
		function CheckForm () {
			if (document.frmTeklif.teklifmiktar.value==""){alert("Lütfen teklif miktrýnýzý giriniz !");return false;}
			else if (document.frmTeklif.teklifmiktar.value<"0"){alert("Lütfen teklif miktrýnýzý giriniz !");return false;}
			else {return true;}
		}
		function win(url) {
			config='toolbar=no,location=no,directories=no,status=no,menubar=no,width=400,height=300,top=30,left=40,scrollbars=yes,resizable=yes';
			window.open ('upload.php?a='+url,"Resimci",config);
		}
	// --></script>
		<? $sec3="select * from uye_active where id='$oku[MusteriID]'";$sor3=mysql_query($sec3);$oku3=mysql_fetch_assoc($sor3);
		$en_yuksek="select * from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if($oku[fiyat]<$en_oku[teklif])$fiyat=$en_oku[teklif];else $fiyat=$oku[fiyat];
		$sec_sehir=mysql_query("select ad from sehir where plaka='$oku[krgSehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);
		$uye_puan_sec="select * from uye_puan where verilenMID='$oku3[id]' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
		if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}?>
		<table width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr><th colspan="2" align="center"><h1><font size="+3"><? echo"$oku[title]" ?></font></h1></th></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Bilgisi&nbsp; </td></tr></table></td></tr>
			<? if($oku[fiyat])echo"<tr><td width='20%'>Þu anki Fiyatý </td><td>: &nbsp;$fiyat YTL</td></tr>";?>
			<? if(($oku[hemen]>0) and ($fiyat<$oku[hemen])){echo"<tr><td width='20%'>Hemen Al! fiyatý </td><td>: &nbsp;$oku[hemen] YTL</td>";}?>
			<tr><td>Kalan Süre </td><td>: &nbsp;<? echo"$klnzmn";?></td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td>Ürün </td><td>: &nbsp;<? echo"$oku[adet] adet $oku[title]" ?></td></tr>
			<tr><td>Kategorisi </td><td>: &nbsp;<? echo LearnCat($oku[KatID]); ?></td></tr>
			<? if($oku[fiyat])echo"<tr><td>Açýlýþ Fiyatý </td><td>: &nbsp;$oku[fiyat] YTL</td></tr>";?>
			<tr><td>Sahibi </td><td>: &nbsp;<? echo"<a href='?page=member_profile&i=$oku3[id]'>$oku3[username]";
			while($uye_puan_MID){echo"<img src='images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='images/index/star2.gif' border='0' />";$nouye_puan_MID--;}?></a></td></tr>
			<tr><td colspan="2"><br /><br /><br /></td></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Açýklama&nbsp; </td></tr></table></td></tr>
			<tr><td colspan="2"><? echo"$oku[ozellik]"; ?><br /><br /><br /></td></tr>
			<? $sec="select * from stok_resim where StokID='$i'";$sor=mysql_query($sec);$sat=mysql_num_rows($sor);
			if($sat>0){?>
				<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Resimleri&nbsp; </td></tr></table></td></tr>
				<tr><td colspan="2" align="center"><font class="titlemini">Büyütmek için týklayýnýz...<br /></font>
					<? while($okuresim=mysql_fetch_assoc($sor)){?>
						<img onclick="win('<? echo"$okuresim[resimtitle]";?>')" alt="Büyütmek için týklayýnýz" src="uploads/<? echo"$okuresim[resimtitle]";?>" border="1" height="70" width="70" />
						<? $picNo++;if($picNo==8){echo"<br />";$picNo=0;}
					} ?><a name="r"></a>
				</td></tr>
				<tr><td colspan="2"><br /><br /><br /></td></tr>
			<? }?>
			<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table></td></tr>
			<tr><td>Bulunduðu þehir </td><td>: &nbsp;<? echo"$oku_sehir[ad]" ?></td></tr>
			<tr><td>Kargo Ücreti </td><td>: &nbsp;<? if($krgUcret==0){echo"Alýcý Öder";}else if($krgUcret==1){echo"Satýcý Öder";}?></td></tr>
			<tr><td>Kargo Notu </td><td>: &nbsp;<? echo"$oku[krgNot]" ?></td></tr>
			<tr><td colspan="2"><br /><br /><br /><a name="tklf"></a></td></tr>
			<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ücret&nbsp; </td></tr></table></td></tr>
			<tr><td colspan="2" align="center">
				<? if($teklif=="yes")echo"Teklifiniz kabul edildi !<br />";
				else if($teklif=="no")echo"Teklifiniz kabul edilemedi !<br />";
				else if($teklif=="you")echo"Teklifiniz reddedildi ! Kendi sattýðýnýz ürüne teklif veremezsiniz !<br />";
				else if($teklif=="small")echo"Teklifiniz reddedildi ! Verdiðiniz tekliften daha yüksek teklif var !<br />";
				else if($teklif=="fiyat")echo"Teklifiniz reddedildi ! Verdiðiniz teklif malýn fiyatýndan düþük !<br />";
				else if($teklif=="sure")echo"Teklifiniz reddedildi ! Malýn teklif süresi sona ermiþtir !<br />";?>
			</td></tr>
			<? if(($klnzmn!="Süresi dolmuþtur !") and $oku[MusteriID]!=$_SESSION["UserID"]){?>
				<tr><td colspan="2" align="center"><table cellpadding="0" cellspacing="5" width="100%"><tr>
					<? if($fiyat){?><td valign="bottom" bgcolor="#EBF8FE"<? if(($oku[hemen]==0) or ($fiyat>$oku[hemen]))echo" colspan='2'";else echo" width='50%'";?>><br />
				<? if($en_oku[teklif]>0){$sec3=mysql_query("select * from uye_active where id='$en_oku[MusteriID]'");$oku3=mysql_fetch_assoc($sec3);
				echo"En yüksek teklif=$en_oku[teklif] YTL<br />Teklifi veren: $oku3[username]";}else echo"Henüz teklif verilmedi !";?><br />
						<form name="frmTeklif" action="?page=buy&i=<? echo"$i"; ?>" method="post" onsubmit="return CheckForm();"><input type="text" name="teklifmiktar" size="7" /> YTL &nbsp;
						<input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><input type="submit" name="btn_teklif" value="Teklif Ver" /></form>
						<br /><a href="?page=account&p=izle&i=<? echo"$i";?>">Ýzlemeye Al !</a>
					</td><? } if(($oku[hemen]>0) and ($fiyat<$oku[hemen])){?><td valign="bottom" bgcolor="#EBF8FE"<? if(!$fiyat)echo" colspan='2'";else echo" width='50%'";?>><br />
						<form name="frmHemen" action="?page=buy&i=<? echo"$i";?>" method="post">Hemen Al! ücreti: &nbsp;<? echo"$oku[hemen]";?> YTL &nbsp;
						<br /><br /><input type="hidden" value="<? echo"$PHPSESSID";?>" name="psid" /><input type="submit" name="btn_hemen" value="Hemen Al !" /></form>
						<br /><a href="?page=cart&act=ekle&i=<? echo"$i";?>">Sepete Ekle !</a>
					</td><? }?>
				</tr></table></td></tr>
			<? }else if(($klnzmn=="Süresi dolmuþtur !") and ($en_oku[MusteriID]==$_SESSION["UserID"])){?>
				<tr><td colspan="2" align="center">
					<a name="tklf" href="?page=buy&i=<? echo"$i&info=$_SESSION[UserID]";?>">Bu malzemeyi alabilirsiniz. Lütfen kargo bilgilerinizi kontrol edin ve ürünün ücretini ödeyin.</a>
				</td></tr>
			<? }if(($oku[durum]=='0') and ($oku[MusteriID]==$_SESSION["UserID"])){?>
				<tr><td colspan="2" align="center">&nbsp;<hr>&nbsp;</td></tr>
				<tr><td colspan="2"  align="center"><input type="button" value="Düzenle" onclick="javascript:window.location.href='?page=sale&i=<? echo"$i";?>';" /></td></tr>
			<? }?>
		</table>
