<h1>Resimler</h1><br /><hr>
	<script language="JavaScript"><!-- 
		function win(url) {
			config='toolbar=no,location=no,directories=no,status=no,menubar=no,left=25,top=50,width=400,height=300,scrollbars=yes,resizable=yes';
			window.open (url,"Resimci",config);
		}
	// --></script>
<? if($islem=="sil"){$sql=mysql_query("delete from stok_resim where id='$i'");}?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>Kullanýcý</th><th>Stok</th><th>Resim</th></tr>
		<tr><td colspan="3"><hr /></td></tr>
	  	<? $sec=mysql_query("select * from stok_resim order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
		  	echo"<tr><td>".LearnUser($oku[MusteriID])."</td><td>".LearnStok($oku[StokID])." ($oku[StokID])</td><td>";?>
			<a href="#" onclick="win('../upload.php?a=<? echo"$oku[resimtitle]";?>')" title="Büyütmek için týklayýnýz"><img alt="" src="../uploads/<? echo"$oku[resimtitle]";?>" border="1" height="70" width="70" /></a></td></tr>
		<? }?>
	</table>
