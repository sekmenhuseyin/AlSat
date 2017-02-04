<br /><br /><table align="center" border="1" cellspacing="50" cellpadding="10">
	<tr><td valign="top"><table align="center" border="0" cellspacing="0" cellpadding="3">
		<tr><th colspan="2">Ürünler</th></tr><tr><td colspan="2"><hr /></td></tr>
	  	<? $trh=date("YmdHis");
		$sec=mysql_query("select id from stok where durum=0");$satno=mysql_num_rows($sec);echo"<tr><td>Ücreti Ödenecek Ürün Sayýsý</td><td>$satno</td></tr>";
		$sec=mysql_query("select id from stok where durum=1");$satno=mysql_num_rows($sec);echo"<tr><td>Onay Bekleyen Ürün Sayýsý</td><td>$satno</td></tr>";
		$sec=mysql_query("select id from stok where durum=2 and trh>$trh");$satno=mysql_num_rows($sec);echo"<tr><td>Listelenen Ürün Sayýsý</td><td>$satno</td></tr>";
		$sec=mysql_query("select id from stok where durum=3");$satno=mysql_num_rows($sec);echo"<tr><td>Satýlmýþ Ürün Sayýsý</td><td>$satno</td></tr>";?>
	</table></td><td valign="top"><table align="center" border="0" cellspacing="0" cellpadding="3">
		<tr><th colspan="2">Üyeler</th></tr><tr><td colspan="2"><hr /></td></tr>
		<? $sec=mysql_query("select id from uye_passive");$satno=mysql_num_rows($sec);echo"<tr><td>Pasif Üye Sayýsý</td><td>$satno</td></tr>";
		$sec=mysql_query("select id from uye_active");$satno=mysql_num_rows($sec);echo"<tr><td>Aktif Üye Sayýsý</td><td>$satno</td></tr>";?>
	</table></td></tr>
</table><br /><br />
