<h1>Stok</h1><br /><hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>adet</th><th>fiyat</th><th>hemen</th><th>Baþlýk</th><th>Müþteri</th><th>Kategorisi</th><th>durum</th></tr>
		<tr><td colspan="7"><hr /></td></tr>
	  	<? $sec=mysql_query("select * from stok order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
			$uye_puan_sec="select * from uye_puan where verilenMID='$oku[MusteriID]' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
			if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}
		  	echo"<tr><td>$oku[adet]</td><td>$oku[fiyat]</td><td>$oku[hemen]</td>";
			echo"<td><a href='?act=detay&i=$oku[id]'>".substr($oku[title],0,50)."</a></td><td><a href=?act=uyeprofile&i=$oku[MusteriID]>".LearnUser($oku[MusteriID])." ";
			while($uye_puan_MID){echo"<img src='../images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='../images/index/star2.gif' border='0' />";$nouye_puan_MID--;}
			echo"</a></td><td>".LearnCat($oku[KatID])."</td><td>$oku[durum]</td></tr>";
		}?>
	</table>
