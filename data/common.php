<? @mysql_connect("localhost","root");@mysql_select_db("veri");setlocale ("LC_TIME", "TR");include("common_func.php");
//page functions
if (!$_SESSION["UserID"] and ((substr($page,0,7)=="account") or (substr($page,0,4)=="sale"))){$ph=$p;$p=$page;$page="member";}
if(substr($page,0,6)=="member"){
	if($page=="member_logout"){$_SESSION["UserID"]="";$page="home";}
	else if($page=="member" and $oturum and ($KulAd<>"") and ($KulPar<>"") and ($psid==$PHPSESSID)){
		$KulAd=htmlspecialchars($KulAd,ENT_QUOTES);$KulPar=htmlspecialchars($KulPar,ENT_QUOTES);$KulPar=md5($KulPar);$sec=mysql_query("select id from uye_active where username='$KulAd' and userpass='$KulPar'");$sat=mysql_num_rows($sec);
		if($sat==1){
			$oku=mysql_fetch_assoc($sec);$_SESSION["UserID"]=$oku[id];if($p){$page=$p;}else{$page="account";}$p=$ph;
			$sec=mysql_query("select * from sepet where MusteriID='$PHPSESSID'");while($oku=mysql_fetch_assoc($sec))$guncelle=mysql_query("UPDATE sepet SET MusteriID='$_SESSION[UserID]' where MusteriID='$PHPSESSID'");
		}else{$page="member";$err="nouser";}
	}
}else if($page=="detail"){
	if($teklifbtn and intval($teklifmiktar)>0){
		if ($_SESSION["UserID"]==""){$page="member";$p="detay";}$sec="select * from stok where id='$i'";$sor=mysql_query($sec);$oku=mysql_fetch_assoc($sor);
		if($oku[MusteriID]==$_SESSION["UserID"]){$teklif="you";}$trh=date("YmdHis");$teklifmiktar=intval($teklifmiktar);
		if($oku[trh]>=$trh){
		 	$en_yuksek="select teklif from stok_teklif where StokID='$i' order by teklif desc";$en_sor=mysql_query($en_yuksek);$en_oku=mysql_fetch_assoc($en_sor);
			if(($teklifmiktar>$en_oku[teklif]) and ($teklifmiktar>=$oku[fiyat])){$teklif_yaz=mysql_query("insert into stok_teklif(MusteriID,StokID,teklif) values('$_SESSION[UserID]','$i','$teklifmiktar')");if($teklif_yaz){$teklif="yes";}else{$teklif="no";}}
			else if($teklifmiktar<=$en_oku[teklif]){$teklif="small";}else if($teklifmiktar<$oku[fiyat]){$teklif="fiyat";}
		}else{$teklif="sure";}
	}
}else if(substr($page,0,7)=="account" and $islem){
	if($islem=="htrlt"){
		$sec=mysql_query("select * from stok where id='$i'");$oku=mysql_fetch_assoc($sec);
		$sec2=mysql_query("select * from uye_active where id='$oku[MusteriID]'");$oku2=mysql_fetch_assoc($sec2);
		$en_yuksek=mysql_query("select teklif from stok_teklif where StokID='$i' order by teklif desc");$en_oku=mysql_fetch_assoc($en_yuksek);$ucret=$en_oku[teklif];
		$resim_sec=mysql_query("select * from stok_resim where StokID='$i' and MusteriID=$_SESSION[UserID]");
		//mail i�eri�i
		$email_govdesi="<html><head><title>�deme Hat�rlatma</title></head><body><table><tr><td>Merhaba $oku2[ad]</td></tr>";
		$email_govdesi.= "<tr><td><b>'$oku[title]'</b> adl� �r�ne verdi�iniz $ucret liral�k teklif kabul edildi.</td></tr><tr><td align='center'>";
		while($resim_oku=mysql_fetch_assoc($resim_sec)){
			$email_govdesi.= "<a href='http://www.hesaplialsat.com/upload.php?a=$resim_oku[resimtitle]' title='B�y�tmek i�in t�klay�n�z' target='_blank'><img src='http://www.hesaplialsat.com/uploads/$resim_oku[resimtitle]' border='0' width='70' height='70' />";
			$picNo++;if($picNo==8){echo"</td></tr><tr><td align='center'>";$picNo=0;}
		}
		$email_govdesi.= "</td></tr><tr><td>En k�sa s�rede bu paray� hesab�m�za yat�rman�z ve sitemizden �creti yat�rd���n�z� belirten linki t�klaman�z gerekmektedir.</td></tr>";
		$email_govdesi.= "<tr><td><br /><a href='http://www.hesaplialsat.com/?page=buy&i=$i&info=timeout'>http://www.hesaplialsat.com/?page=buy&i=$i&info=timeout</a><br /><br /></td></tr>";
		$email_govdesi.= "<tr><td>Bu sizi do�rudan �r�n �deme sayfas�na g�t�rmelidir. E�er �yle olmuyorsa, l�tfen URL'nin tamam�n� web taray�c�n�z�n adres kutusuna kopyalay�p yap��t�r�n ve klavyeniz �zerinde &quot;Enter&quot; tu�una bas�n.</td></tr>";
		$email_govdesi.= "<tr><td>Te�ekk�rler !</td></tr></table></body></html>";
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers.= "Content-type:text/html;charset=windows-1254"."\r\n";
		$headers.= "Return-Path: info@hesaplialsat.com"."\r\n";
		$headers.= 'From: Hesapl� Al Sat <info@hesaplialsat.com>'."\r\n";
		echo"<table width='100%'><tr><td align='center'>";
		if (@mail($oku2[EPosta],"�deme Hat�rlatma",$email_govdesi,$headers))echo ("�deme hat�rlatma mektubu al�c�ya g�nderildi.<br>");else echo ("�deme hat�rlatma mektubu g�nderilemedi.<br>L�tfen daha sonra tekrar deneyin !<br>");
		echo"</td></tr></table>";
	}else if($islem=="urun_sil"){
		$sil_stok=mysql_query("delete from stok where id='$i'");
		$sec_resim=mysql_query("select * from stok_resim where MusteriID='$_SESSION[UserID]' and StokID='$i'");
		while($resim_ad=mysql_fetch_assoc($sec_resim)){$j=$resim_ad[id];@unlink("uploads/".$resim_ad[resimtitle]);$sil=mysql_query("delete from stok_resim where id='$j'");}
		echo"<table width='100%'><tr><td align='center'>��leminiz ba�ar�yla tamamlanm��t�r !</td></tr></table>";
	}
}
?>
