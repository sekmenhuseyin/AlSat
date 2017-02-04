<? if($act=='uyeactive'){?>
	<h1>Aktif Üyeler</h1><br /><hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>Ad Soyad</th><th>Kullanýcý</th><th>EPosta</th><th>Üyelik Tarihi</th></tr>
		<tr><td colspan="5"><hr /></td></tr>
	  	<? $sec=mysql_query("select * from uye_active order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
			$uye_puan_sec="select * from uye_puan where verilenMID='$oku[id]' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
			if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}
		  	echo"<tr><td>$oku[ad] $oku[soyad]</td><td><a href=?act=uyeprofile&i=$oku[id]>$oku[username] ";
			while($uye_puan_MID){echo"<img src='../images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='../images/index/star2.gif' border='0' />";$nouye_puan_MID--;}
			echo"</a></td><td><a href='mailto:$oku[EPosta]'>$oku[EPosta]</a></td><td>$oku[tarih]</td></tr>";
		}?>
	</table>
<? }else if($act=='uyepassive'){?>
	<h1>Pasif Üyeler</h1><br /><hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  	<tr><th>activePass</th><th>ad</th><th>soyad</th><th>username</th><th>userpass</th><th>EPosta</th></tr>
		<tr><td colspan="6"><hr /></td></tr>
	  	<? $sec=mysql_query("select * from uye_passive order by id asc");
		while($oku=mysql_fetch_assoc($sec)){
		  	echo"<tr><td>$oku[activePass]</td><td>$oku[ad]</td><td>$oku[soyad]</td><td>$oku[username]</td><td>$oku[userpass]</td><td>$oku[EPosta]</td></tr>";
		}?>
	</table>
<? }else if($act=='uyeprofile'){?>
<?	$sec=mysql_query("select * from uye_puan where verilenMID='$i' and puan>'0'");$sec_uye=mysql_query("select username,tarih from uye_active where id='$i'");$oku_uye=mysql_fetch_assoc($sec_uye);
	$uye_puan_sec="select * from uye_puan where verilenMID='$i' and puan>'0'";$uye_puan_sor=mysql_query($uye_puan_sec);$uye_puan_say=mysql_num_rows($uye_puan_sor);$uye_puan_MID=0;$nouye_puan_MID=5;
	if($uye_puan_say>0){while($uye_puan_oku=mysql_fetch_assoc($uye_puan_sor)){$uye_puan_MID=$uye_puan_MID+$uye_puan_oku[puan];}$uye_puan_MID=$uye_puan_MID/$uye_puan_say;$uye_puan_MID=ceil($uye_puan_MID);$nouye_puan_MID=5-$uye_puan_MID;}?>
	<table align="center" border="0" cellpadding="7" cellspacing="0" width="95%">
		<tr><td colspan="2"><? echo"$oku_uye[username] ";while($uye_puan_MID){echo"<img src='../images/index/star.gif' border='0' />";$uye_puan_MID--;}while($nouye_puan_MID){echo"<img src='../images/index/star2.gif' border='0' />";$nouye_puan_MID--;}?><br />Üyelik Tarihi: <? echo"$oku_uye[tarih]";?></td><th width="40%">Yorum Veren / Yorumu</th><th width="20%">Verdiði Puan</th><th width="15%">Tarih</th></tr>
		<? $j=0;while($oku=mysql_fetch_assoc($sec)){?>
				<tr bgcolor="<? if($j==0){echo"#BCE0FE";}else{echo"#80C5FD";} ?>"><td width="%">Veren: </td><td colspan="2"><? $sec_uye=mysql_query("select username,id from uye_active where id='$oku[verenMID]'");$oku_uye=mysql_fetch_assoc($sec_uye);if($oku[verenMID]>1)echo"<a href='?act=uyeprofile?i=$oku_uye[id]'>$oku_uye[username]</a>";else echo"$oku_uye[username]";?></td>
				<td align="center"><? $uye_puan_say=$oku[puan];while($uye_puan_say){echo"<img src='../images/index/star.gif' border='0' />";$uye_puan_say--;}?></td><td align="center"><? echo"$oku[tarih]";?></td></tr><tr bgcolor="<? if($j==0){echo"#BCE0FE";$j++;}else{echo"#80C5FD";$j=0;} ?>"><td>Yorumu: </td><td colspan="4"><? echo"$oku[yorum]";?></td></tr>
		<? }?>
	</table>
<? }?>