<? if(!$ode or (!$Ad or !$Soyad or !$Adres  or !$adi or !$soyadi or !$number or !$cv2) or ($psid!=$PHPSESSID)){
	$sec2="select * from stok where id='$i'";$sor2=mysql_query($sec2);$oku2=mysql_fetch_assoc($sor2);
	if($info){
		$en_yuksek="select * from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
		if(($info!=$en_oku[MusteriID]) or ($en_oku[MusteriID]!=$_SESSION["UserID"])){echo "<script language=\"JavaScript\">window.location.href='?page=detail&i=$i';</script>";exit();}
	}$klnzmn=formatetimestamp($oku2[tarih],"no");
	if(($klnzmn and $info) or (!$klnzmn and !$info)){echo "<script language=\"JavaScript\">window.location.href='?page=detail&i=$i';</script>";exit();}
	?>
	<table width="90%" align="center" border="0">
		<tr><td colspan="2" background="images/index/fon_bar01.gif">
			<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">�r�n Bilgisi&nbsp; </td></tr></table>
		</td></tr>
		<tr><td>Ba�l�k </td><td>: &nbsp;<? echo"$oku2[title]" ?></td></tr>
		<tr><td>�denecek Tutar </td><td>: &nbsp;<? if($info)echo"$en_oku[teklif]"; else echo"$oku2[hemen]" ?> YTL</td></tr>
	</table>
	<? if($info){$Urun_Ucret=$en_oku[teklif];}else{$Urun_Ucret=$oku2[hemen];}
	$Pay_Buy=true;include("ode.php");
} else{
	$sec=mysql_query("select durum,MusteriID,title from stok where id='$i'");$oku=mysql_fetch_assoc($sec);
	if($oku[durum]==1){
		$ekle = mysql_query("INSERT INTO stok_sale(alanID,satanID,StokID,fiyat,tarih) VALUES('$_SESSION[UserID]','$oku[MusteriID]','$i','$fiyat','".date("d/m/Y")."')");
		if($ekle){
			$guncelle=mysql_query("UPDATE stok SET durum='3' where id='$i'");
			$email_govdesi="<html><head><title>�r�n Sat�� Bilgisi</title></head><body><table><tr><td>Merhaba ".LearnUser($oku[MusteriID])."</td></tr>";
			$email_govdesi.= "<tr><td><b>'$oku[title]'</b> ba�l�kl� �r�n�n�z� ".LearnUser($_SESSION[UserID])." lakapl� kullan�c� sat�n alm��t�r.</td></tr>";
			$email_govdesi.= "<tr><td>L�tfen en k�sa zamanda �r�n� a�a��daki adrese yollay�n.</td></tr>";
			$email_govdesi.= "<tr><td>Al�c�: $Ad $Soyad</td></tr>";
			$email_govdesi.= "<tr><td>Adresi: $Adres $ilce/$sehir</td></tr>";
			$email_govdesi.= "<tr><td>Te�ekk�rler !"."</td></tr></table></body></html>";
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
			$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
			$headers.= 'From: Hesapl� Al Sat <info@hesaplialsat.com>'."\r\n";
			@mail($EPosta,"�yelik Onay Mektubu",$email_govdesi,$headers);
		}
		if($guncelle){echo SayfaOrtala("Ba�ar�l� bir �ekilde al�m yapt�n�z !");}else{echo SayfaOrtala("Al�mda bir hata olu�tu !");}
	}else if($oku[durum]>1){echo SayfaOrtala("Bu �r�n� daha �nceden sat�lm�� !");
	}else{echo SayfaOrtala("Bu �r�n� alamazs�n�z !");}
}?>
