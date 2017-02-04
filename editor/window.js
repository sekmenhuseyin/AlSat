function help (winURL, winWidth, winHeight, winLeft, winTop) {
	if (!winWidth) winWidth = 320;
	if (!winHeight) winHeight = 216;
	if (!winLeft || !winTop) {
		//winLeft = (screen.width - winWidth) / 2;
		//winTop = (screen.height - winHeight) / 2;
	}
	
	winhelp = window.open(winURL, "popup", 'height=500,width=350,top=0,left=0,scrollbars=yes,resizable,status=yes');
}
