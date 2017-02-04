<script src="data/ajax_hesap.js"></script> 
	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
				<td class="title01" align="center"><a href="?page=account_stlk"><? if($page=="account_stlk")echo"<big><u>Satýlýða Çýkardýklarým</u></big>";else echo"Satýlýða Çýkardýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_tklf"><? if($page=="account_tklf")echo"<big><u>Tekliflerim</u></big>";else echo"Tekliflerim";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_buy"><? if($page=="account_buy")echo"<big><u>Satýn Aldýklarým</u></big>";else echo"Satýn Aldýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_puan"><? if($page=="account_puan")echo"<big><u>Puanlama</u></big>";else echo"Puanlama";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_izle"><? if($page=="account_izle")echo"<big><u>Ýzlemeye Aldýklarým</u></big>";else echo"Ýzlemeye Aldýklarým";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_kisi"><? if($page=="account_kisi")echo"<big><u>Kiþisel Bilgilerim</u></big>";else echo"Kiþisel Bilgilerim";?></a></td>
		</tr></table></td></tr>
		<tr><td>
			<? if($page=="account_stlk"){?>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="right"><tr>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_list');">Listelenenler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_timeout');">Zamaný Dolanlar</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_ode');">Ücreti Ödenecekler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_buy');">Sattýklarým</a></td>
				</tr></table>
			<? }else if($page=="account_tklf"){?>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="right"><tr>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_ver');">Verdiðim Teklifler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_win');">Kazandýðým Teklifler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_lose');">Kaybettiðim Teklifler</a></td>
				</tr></table>
			<? }?>
		</td></tr><tr><td><hr /></td></tr><tr><td><span id="account_page"></span><br /><br /></td></tr>
	</table><script type="text/javascript">hesap_page('<? echo("$page");?>','');</script>
