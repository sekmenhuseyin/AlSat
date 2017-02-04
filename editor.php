<SCRIPT language=JavaScript src="editor/easycode.js"></SCRIPT><SCRIPT language=JavaScript src="editor/window.js"></SCRIPT>
<TABLE cellSpacing=0 cellPadding=0 border=0 align="center">
		<TR><TD><TABLE style="border:#999999 2px solid;" cellSpacing=0 cellPadding=5 bgColor="#ebe9ed">
		        <TR><TD>
					<TEXTAREA name="cmts" rows="12" wrap="virtual" cols="65"><? if($cmts){echo"$cmts";}else if($oku[ozellik]){echo"$oku[ozellik]";}?></TEXTAREA>
		            <SCRIPT language=javascript src="editor/editor.js"></SCRIPT>
		            <SCRIPT language=javascript><!--
							var config = new Object();
							config.toolbar = [
							['removeformat'],
							['fontname'],
							['fontsize'],
							['bold','italic','underline','separator'],
							['justifyleft','justifycenter','justifyright','separator'],
							['cut','copy','paste','separator'],
							['linebreak'],
							['OrderedList','UnOrderedList','Outdent','Indent','separator'],
							['forecolor','backcolor','separator'],
							['HorizontalRule','Createlink','InsertTable']
					    ];
						editor_generate('cmts', config);
					--></SCRIPT>
		        </TD></TR>
		</TABLE></TD></TR>
</TABLE>
