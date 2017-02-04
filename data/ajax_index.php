<? header("Content-Type: text/html; charset=iso-8859-9");session_start();
if(!$psid){exit();}include("common.php");
if(substr($page,0,6)=="member"){include("../uye.php");}
else if(substr($page,0,7)=="account"){include("../hesap.php");}
else if(substr($page,0,4)=="help"){include("../help.php");}
else if(substr($page,0,4)=="sale"){include("../sat.php");}
else if(substr($page,0,6)=="search"){include("../arama.php");}
else if($page=="cart"){include("../sepet.php");}
else if($page=="buy"){include("../hemenal.php");}
else if($page=="pay"){include("../ode.php");}
else if($page=="detail"){include("../detay.php");}
else if($page=="last"){
	@$sc="select * from stok";@$sr=mysql_query($sc);$bugun=date("YmdHis");?> 
	<table border="0" cellpadding="0" cellspacing="5" align="center" width="97%">
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Son Gün&nbsp; </td></tr></table></td></tr>
		<? while(@$oku=mysql_fetch_assoc($sr)){$i=SearchShow2("$oku[tarih]","$oku[id]","$oku[title]","$oku[fiyat]","$oku[bold]","$oku[hemen]","$oku[MusteriID]","$i","yes");}if($i==1)echo"<td width='50%'>&nbsp;</td>";?>
	</table>
<? }else if($page=="cats"){?>
	<table align="center"><tr><? $i=0;$sec=mysql_query("select * from kategori order by KategoriAd Asc");while($oku=mysql_fetch_assoc($sec)){
	echo"<td><a href='?page=search&AraKat=$oku[id]'><img src='images/kategori/$oku[id].gif' border=0 /><br />$oku[KategoriAd]</a></td>";$i++;if($i==5){echo"</tr><tr>";$i=0;};}?></tr></table>
<? }else{?>
	<table border="0" cellpadding="0" cellspacing="4" align="center" width="97%">
		<tr><td colspan="2" background="images/index/fon_bar01.gif"><table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0"><tr><td class="title01">Vitrin&nbsp; </td></tr></table></td></tr>
		<? $q=0;$trh=date("YmdHis");@$sec=mysql_query("select * from stok where vitrin='1' and durum='1' and trh>$trh");while(@$oku=mysql_fetch_assoc($sec)){
		$vtr_list0[$q]=$oku[id];$vtr_list1[$q]=$oku[tarih];$vtr_list2[$q]=$oku[title];$vtr_list3[$q]=$oku[fiyat];$vtr_list4[$q]=$oku[bold];$vtr_list5[$q]=$oku[hemen];$vtr_list6[$q]=$oku[MusteriID];$vtr_list[$q]=$q;$q++;}
		if($q){@shuffle($vtr_list);$i=0;for($vtr=0;$vtr<6;$vtr++){$tmp=$vtr_list[$vtr];$i=SearchShow2("$vtr_list1[$tmp]","$vtr_list0[$tmp]","$vtr_list2[$tmp]","$vtr_list3[$tmp]","$vtr_list4[$tmp]","$vtr_list5[$tmp]","$vtr_list6[$tmp]","$i","no");} 
		if($i==1)echo"<td width='50%'>&nbsp;</td></tr>";}?>
	</table>
<? }?>
