<script src="data/ajax_hesap.js"></script> 
	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
				<td class="title01" align="center"><a href="?page=account_stlk"><? if($page=="account_stlk")echo"<big><u>Sat�l��a ��kard�klar�m</u></big>";else echo"Sat�l��a ��kard�klar�m";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_tklf"><? if($page=="account_tklf")echo"<big><u>Tekliflerim</u></big>";else echo"Tekliflerim";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_buy"><? if($page=="account_buy")echo"<big><u>Sat�n Ald�klar�m</u></big>";else echo"Sat�n Ald�klar�m";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_puan"><? if($page=="account_puan")echo"<big><u>Puanlama</u></big>";else echo"Puanlama";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_izle"><? if($page=="account_izle")echo"<big><u>�zlemeye Ald�klar�m</u></big>";else echo"�zlemeye Ald�klar�m";?></a></td><td> &nbsp;&nbsp; </td>
				<td class="title01" align="center"><a href="?page=account_kisi"><? if($page=="account_kisi")echo"<big><u>Ki�isel Bilgilerim</u></big>";else echo"Ki�isel Bilgilerim";?></a></td>
		</tr></table></td></tr>
		<tr><td>
			<? if($page=="account_stlk"){?>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="right"><tr>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_list');">Listelenenler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_timeout');">Zaman� Dolanlar</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_ode');">�creti �denecekler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','stlk_buy');">Satt�klar�m</a></td>
				</tr></table>
			<? }else if($page=="account_tklf"){?>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" align="right"><tr>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_ver');">Verdi�im Teklifler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_win');">Kazand���m Teklifler</a></td>
					<td><a href="#" onclick="javascript:hesap_page('<? echo("$page");?>','tklf_lose');">Kaybetti�im Teklifler</a></td>
				</tr></table>
			<? }?>
		</td></tr><tr><td><hr /></td></tr><tr><td><span id="account_page"></span><br /><br /></td></tr>
	</table><script type="text/javascript">hesap_page('<? echo("$page");?>','');</script>
