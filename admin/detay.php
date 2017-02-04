<?	$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor); 
$klnzmn=formatetimestamp($oku[tarih],"no");if(!$klnzmn){$klnzmn="Süresi dolmuþtur !";}if($oku[tarih]<10){$klnzmn="$oku[tarih] günlük ürün henüz iþleme alýnmadý.";}?>
<script language="JavaScript"><!-- 
	function win(url) {
		config='toolbar=no,location=no,directories=no,status=no,menubar=no,width=400,height=300,top=30,left=40,scrollbars=yes,resizable=yes';
		window.open ('../upload.php?a='+url,"Resimci",config);
	}
// --></script>
<? $sec3="select * from uye_active where id='$oku[MusteriID]'";$sor3=mysql_query($sec3);$oku3=mysql_fetch_assoc($sor3);
$en_yuksek="select * from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
if($oku[fiyat]<$en_oku[teklif])$fiyat=$en_oku[teklif];else $fiyat=$oku[fiyat];
$uye_puan_sec="select * from uye_puan where verilenMID='$oku[id]' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}
$sec_sehir=mysql_query("select ad from sehir where plaka='$oku[krgSehir]'");$oku_sehir=mysql_fetch_assoc($sec_sehir);?>
<table width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr><th colspan="2" align="center"><h1><font size="+3"><? echo"$oku[title]" ?></font></h1></th></tr>
	<tr><td colspan="2" background="../images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Bilgisi&nbsp; </td></tr></table>
	</td></tr>
	<? if($oku[fiyat])echo"<tr><td width='15%'>Þu anki Fiyatý </td><td>: &nbsp;$fiyat YTL</td></tr>";?>
	<? if(($oku[hemen]>0) and ($fiyat<$oku[hemen])){echo"<tr><td width='15%'>Hemen Al! fiyatý </td><td>: &nbsp;$oku[hemen] YTL</td>";}?>
	<tr><td>Kalan Süre </td><td>: &nbsp;<? echo"$klnzmn";?></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td>Ürün </td><td>: &nbsp;<? echo"$oku[adet] adet $oku[title]" ?></td></tr>
	<tr><td>Kategorisi </td><td>: &nbsp;<? echo LearnCat($oku[KatID]);?></td></tr>
	<? if($oku[fiyat])echo"<tr><td>Açýlýþ Fiyatý </td><td>: &nbsp;$oku[fiyat] YTL</td></tr>";?>
	<tr><td>Sahibi </td><td>: &nbsp;<? echo"<a href=?act=uyeprofile&i=$oku[id]>$oku3[username] ";
	while($uye_puan_MID){echo"<img src='../images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='../images/index/star2.gif' border='0' />";$nouye_puan_MID--;}?></a></td></tr>
	<tr><td colspan="2"><br /><br /><br /></td></tr>
	<tr><td colspan="2" background="../images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Açýklama&nbsp; </td></tr></table>
	</td></tr>
	<tr><td colspan="2"><? echo"$oku[ozellik]"; ?><br /><br /><br /></td></tr>
	<? $sec="select * from stok_resim where StokID='$i'";$sor=mysql_query($sec);$sat=mysql_num_rows($sor);
	if($sat>0){?>
		<tr><td colspan="2" background="../images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Ürün Resimleri&nbsp; </td></tr></table>
		</td></tr>
		<tr><td colspan="2"><center>
			<? while($okuresim=mysql_fetch_assoc($sor)){?>
				<a href="#r" onclick="win('<? echo"$okuresim[resimtitle]";?>')" title="Büyütmek için týklayýnýz"><img alt="" src="../uploads/<? echo"$okuresim[resimtitle]";?>" border="1" height="70" width="70" /></a>
				<? $picNo++;if($picNo==11){echo"<br />";$picNo=0;}
			} ?><a name="r"></a>
		</center></td></tr>
		<tr><td colspan="2"><br /><br /><br /></td></tr>
	<? }?>
	<tr><td colspan="2" background="../images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table>
	</td></tr>
	<tr><td>Bulunduðu þehir </td><td>: &nbsp;<? echo"$oku_sehir[ad]" ?></td></tr>
	<tr><td>Kargo Ücreti </td><td>: &nbsp;<? if($krgUcret==0){echo"Alýcý Öder";}else if($krgUcret==1){echo"Satýcý Öder";}?></td></tr>
	<tr><td>Kargo Notu </td><td>: &nbsp;<? echo"$oku[krgNot]" ?></td></tr>
	<tr><td colspan="2"><br /><br /><br /></td></tr>
	<tr><td colspan="2" background="../images/index/fon_bar01.gif">
		<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Teklif&nbsp; </td></tr></table>
	</td></tr>
	<tr><td colspan="2" align="center">
		<? if($en_oku[teklif]>0){
			$sec3="select * from uye_active where id='$en_oku[MusteriID]'";$sor3=mysql_query($sec3);$oku3=mysql_fetch_assoc($sor3); 
			echo "En yüksek teklif=$en_oku[teklif] YTL<br />Teklifi veren: $oku3[username]";
		}
		else echo"Henüz teklif verilmedi !";?><br /><br />
	</td></tr>
</table>
