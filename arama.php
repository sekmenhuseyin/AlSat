<? if($page=="search_detail"){?>
		<form action="?page=search" method="post" name="frmAra"><table border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
			<tr><th colspan="3" align="center">Detaylý Arama</th></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Genel Bilgiler&nbsp; </td></tr></table></td></tr>
			<tr><td width="30%">Aranacak Ýfade</td><td><INPUT size="28" name="AraText"></td><td>&nbsp;</td></tr>
			<tr><td>Kategori</td><td><SELECT size="1" name="AraKat"><OPTION value="-1" selected>Tüm Kategoriler</OPTION>
	        	<? $sec=mysql_query("select * from kategori order by KategoriAd Asc");while($oku=mysql_fetch_assoc($sec)){if($oku[id]!='0')echo("<option value='$oku[id]'>$oku[KategoriAd]</option>");}?>
	            <OPTION value="0">Diðerleri</OPTION></SELECT></td><td>&nbsp;</td>
			</tr>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Fiyat Bilgileri&nbsp; </td></tr></table></td></tr>
			<tr><td><INPUT type="checkbox" name="Arachkhemenal">Hemen AL! bulunsun</td><td colspan="2" align="center">Fiyat   Aralýðý <INPUT maxLength="12" size="7" name="Arafiyat1"> &mdash; <INPUT maxLength="12" size="7" name="Arafiyat2"> YTL</td></tr>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Zaman Bilgileri&nbsp; </td></tr></table></td></tr>
			<tr><td>Bitecek   ürünler <SELECT size="1" name="Arabitecek">
	        	<OPTION value="" selected>----------</OPTION>
        		<OPTION value="2">2 saat   içinde</OPTION>
        		<OPTION value="6">6 saat içinde</OPTION>
        		<OPTION value="12">12 saat içinde</OPTION>
        		<OPTION value="24">24 saat içinde</OPTION>
      		</SELECT></td><td colspan="2" align="center">Yeni gelenler <SELECT size="1" name="Arayeni">
        		<OPTION value="" selected>----------</OPTION>
       			<OPTION value="6">6 saat   içinde</OPTION>
        		<OPTION value="12">12 saat içinde</OPTION>
        		<OPTION value="24">1 gün içinde</OPTION>
        		<OPTION value="48">2 gün içinde</OPTION>
			</SELECT></td></tr>
			<tr><td colspan="3"><br /><br /><br /></td></tr>
			<tr><td colspan="3" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Kargo Bilgileri&nbsp; </td></tr></table></td></tr>
			<tr><td>Þehir <SELECT size="1" name="Arabolge"><OPTION value="-1" selected>Tüm   Þehirler</OPTION><? $sec="select * from sehir order by plaka Asc";$sor=mysql_query($sec);
				while($oku=mysql_fetch_assoc($sor)){if($oku[plaka]!='00') echo("<option value='$oku[plaka]'>$oku[ad]</option>");}?><OPTION value="00">Diðer Yerler</OPTION></SELECT></td>
				<td colspan="2" align="center"><INPUT type="checkbox" name="Arachkkargo">Ücretsiz kargo &nbsp;&nbsp;</td></tr>
			<tr><td colspan="3"><br /><br /></td></tr>
			<tr><td colspan="3" align="center"><INPUT type="submit" value="   Arama Yap   " name="ara_detay"></td></tr>
		</table></form>
<? }else{
		if(!$a){$a=0;}$b=0;$src_list="select * from stok where ";$kriter="page=search";
        if($AraText){$AraText=trim($AraText);$src_list.="title like '%$AraText%' and ";$kriter.="&AraText=$AraText";}
		if($AraKat!="-1"){$src_list.="KatID='$AraKat' and ";}$kriter.="&AraKat=$AraKat";
		if($Arachkhemenal=="on"){$src_list.="hemen>'0' and ";$kriter.="&Arachkhemenal=$Arachkhemenal";}else if($Arachkhemenal=="off"){$src_list.="hemen='0' and ";}
		if($Arafiyat1){$Arafiyat1=trim($Arafiyat1);$src_list.="fiyat>='$Arafiyat1' and ";$kriter.="&Arafiyat1=$Arafiyat1";}
		if($Arafiyat2){$Arafiyat2=trim($Arafiyat2);$src_list.="fiyat<='$Arafiyat2' and ";$kriter.="&Arafiyat2=$Arafiyat2";}
		if($Arabitecek){$trh2=date("Ymd");$trh2.=date("H"+$Arabitecek);$trh2.=date("is");$src_list.="trh<=$trh2 and ";$kriter.="&Arabitecek=$Arabitecek";}
		if($Arayeni){$trh2=date("Ymd");$trh2.=date("H"-$Arayeni);$trh2.=date("is");$src_list.="trh>=$trh2 and ";$kriter.="&Arayeni=$Arayeni";}else{$trh=date("YmdHis");$src_list.="trh>=$trh and ";}
		if($Arabolge and $Arabolge!="-1"){$src_list.="krgSehir='$Arabolge' and ";$kriter.="&Arabolge=$Arabolge";}
		if($Arachkkargo=="on"){$src_list.="krgUcret='1' and ";$kriter.="&Arachkkargo=$Arachkkargo";}else if($Arachkkargo=="off"){$src_list.="krgUcret='0' and ";}
		$src_list.="durum='1'";$tablo_say=mysql_query($src_list);$urun_say=mysql_num_rows($tablo_say);
	$sec=mysql_query($src_list." order by trh asc limit $a,10");?>
		<table border="0" cellpadding="2" cellspacing="0" align="center" width="98%">
			<tr><th>Resim</th><th>Baþlýk</th><th>Fiyat</th><th>Kalan Süre</th><th>Ýþlem</th></tr>
			<tr><td colspan="5"><hr /></td></tr><? while($oku=mysql_fetch_assoc($sec))$i=SearchShow("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$i");?>
			<tr><td align="center" colspan="5" height="40" valign="bottom"><? while($b<$urun_say){if(($b+10)>$urun_say){$c=$urun_say;}else{$c=$b+10;}$a=$b+1;
			 echo" <a href='?$kriter&a=$b'>$a-$c</a> ";$b=$b+10;if($b>$urun_say){$b=$urun_say;}}?></td></tr>
		</table>	
<? }?>