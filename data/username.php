<? include("../common.php");
if($psid and $q){
	$q=htmlspecialchars($q,ENT_QUOTES);	
	$sql1="SELECT * FROM uye_active WHERE username='$q'";$sec1=mysql_query($sql1);$sat_no1=mysql_num_rows($sec1);
	$sql2="SELECT * FROM uye_passive WHERE username='$q'";$sec2=mysql_query($sql2);$sat_no2=mysql_num_rows($sec2);
	if($sat_no1 or $sat_no2){echo"<b>Bu kullan&#305;c&#305;  ad&#305; ba&#351;ka biri taraf&#305;ndan kullan&#305;lmaktad&#305;r !</b>";}
}?>
