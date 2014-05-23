// Ne radi za Checkbox i radio button! (kod njih mora Checked)
function unesiFormu(forma, polja, submit) {
	var str = "";
	for (var p in polja) {
		var pp = polja[p];
		str += "&" + pp + "=" + encodeURIComponent(forma[pp].value);
	}
	if (submit == true)
		return "submit=1" + str;
	else
		return submit.substring(1);
}

function ukljuciFormu(forma, ukljuceno, polja) {
	if (typeof(polja) === 'undefined') {
		var unos = forma.getElementsByTagName('input');
		var tekst = forma.getElementsByTagName('textarea');
		var izbor = forma.getElementsByTagName('select');
		var dugme = forma.getElementsByTagName('button');
		for (var p in unos)
			unos[p].disabled = !ukljuceno;
		for (var p in tekst)
			tekst[p].disabled = !ukljuceno;
		for (var p in izbor)
			izbor[p].disabled = !ukljuceno;
		for (var p in dugme)
			dugme[p].disabled = !ukljuceno;
	}
	else {
		for (p in polja)
			forma[polja[p]].disabled = !ukljuceno;
	}
}

function saljiAJAX(link, tip, podaci, fjauspeh, fjagreske) {
	var xmlhttp;
	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
	
    xmlhttp.onreadystatechange = function () {
		if (this.readyState < 4)
			return;
        if (this.readyState == 4 && this.status == 200)
            fjauspeh(this);
        else
			fjagreske(this);
    }
	//xmlhttp.onerror = fjagreske;
	
    xmlhttp.open(tip, link, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(podaci);
}
