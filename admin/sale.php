<h1>Satýþ</h1><br /><hr>
<? if($islem=="sil"){$sql=mysql_query("delete from stok_resim where id='$i'");}?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>alan</th><th>satan</th><th>StokID</th><th>fiyat</th><th>tarih</th></tr>
		<tr><td colspan="5"><hr /></td></tr>
	  	<? $sec=mysql_query("select * from stok_sale order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
		  	echo"<tr><td>".LearnUser($oku[alanID])."</td><td>".LearnUser($oku[satanID])."</td><td>".LearnStok($oku[StokID])." ($oku[StokID])</td><td>$oku[fiyat]</td><td>$oku[tarih]</td></tr>";
		}?>
	</table>
