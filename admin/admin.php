<? include("ust.php"); 
$sec=mysql_query("select * from settings where id=7");$sat_num=mysql_num_rows($sec);$oku=mysql_fetch_assoc($sec);
if(($oku[adminname]==md5($a1)) and ($oku[adminpass]==md5($a2)) and ($act=="ekle")){
	if(!$sbmtAdmin or !$host or !$username or !$dbname or !$adminname or !$adminpass){?>
		<form action="?act=ekle" name="frmAdmin" method="post"><table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td>host</td><td><input type="text" name="host" value="<? echo"$host";?>" /></td></tr>
			<tr><td>username</td><td><input type="text" name="username" value="<? echo"$username";?>" /></td></tr>
			<tr><td>userpass</td><td><input type="text" name="userpass" value="<? echo"$userpass";?>" /></td></tr>
			<tr><td>dbname</td><td><input type="text" name="dbname" value="<? echo"$dbname";?>" /></td></tr>
			<tr><td>adminname</td><td><input type="text" name="adminname" value="<? echo"$adminname";?>" /></td></tr>
			<tr><td>adminpass</td><td><input type="text" name="adminpass" value="<? echo"$adminpass";?>" /></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" name="sbmtAdmin" value="Kaydet" /></td></tr>
		</table></form>
	<? }else if($act="ekle"){
		$adminname=md5($adminname);$adminpass=md5($adminpass);
		$ekle=mysql_query("INSERT INTO settings (id,host,username,userpass,dbname,adminname,adminpass) VALUES ('7','$host','$username','$userpass','$dbname','$adminname','$adminpass')");
		echo "<script language=\"JavaScript\">window.location.href = '?';</script>";
	}
}else if(($oku[adminname]==md5($a1)) and ($oku[adminpass]==md5($a2)) and ($act=="edit")){
	if(!$sbmtAdmin or !$host or !$username or !$dbname){
		$sec=mysql_query("SELECT * FROM settings WHERE id='7'");$oku=mysql_fetch_assoc($sec);?>
		<form action="?act=edit" name="frmAdmin" method="post"><table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td>host</td><td><input type="text" name="host" value="<? echo"$oku[host]";?>" /></td></tr>
			<tr><td>username</td><td><input type="text" name="username" value="<? echo"$oku[username]";?>" /></td></tr>
			<tr><td>userpass</td><td><input type="text" name="userpass" value="<? echo"$oku[userpass]";?>" /></td></tr>
			<tr><td>dbname</td><td><input type="text" name="dbname" value="<? echo"$oku[dbname]";?>" /></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" name="sbmtAdmin" value="Kaydet" /></td></tr>
		</table></form>
	<? }else if($act="edit"){
		$adminname=md5($adminname);$adminpass=md5($adminpass);
		$ekle=mysql_query("UPDATE settings SET host='$host',username='$username',userpass='$userpass',dbname='$dbname' where id='7')");
		echo "<script language=\"JavaScript\">window.location.href = '?';</script>";
	}
}else if(($oku[adminname]==md5($a1)) and ($oku[adminpass]==md5($a2)) and ($act=="admin")){
	if(!$sbmtAdmin or !$adminname or !$adminpass){
		$sec=mysql_query("SELECT * FROM settings WHERE id='7'");$oku=mysql_fetch_assoc($sec);?>
		<form action="?act=edit" name="frmAdmin" method="post"><table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr><td>adminname</td><td><input type="text" name="adminname" value="<? echo"$adminname";?>" /></td></tr>
			<tr><td>adminpass</td><td><input type="text" name="adminpass" value="<? echo"$adminpass";?>" /></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" name="sbmtAdmin" value="Kaydet" /></td></tr>
		</table></form>
	<? }else if($act="edit"){
		$adminname=md5($adminname);$adminpass=md5($adminpass);
		$ekle=mysql_query("UPDATE settings SET adminname='$adminname',adminpass='$adminpass' where id='7')");
		echo "<script language=\"JavaScript\">window.location.href = '?';</script>";
	}
}else{
	if(($oku[adminname]==md5($a1)) and ($oku[adminpass]==md5($a2)) and ($act=="sil")){
		$sql=mysql_query("delete from settings where id='7'");
		echo "<script language=\"JavaScript\">window.location.href = '?';</script>";
	}
	echo"host=$oku[host]<br>";
	echo"username=$oku[username]<br>";
	echo"userpass=$oku[userpass]<br>";
	echo"dbname=$oku[dbname]<br>";
	echo"adminname=$oku[adminname]<br>";
	echo"adminpass=$oku[adminpass]<br>";
}
include("alt.php");?>
