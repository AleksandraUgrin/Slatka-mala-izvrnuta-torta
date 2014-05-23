
function porucinovu(forma) {
	var form = document.forms[forma];
	// document.getElementById(forma);
	
	var podaci = unesiFormu(form,
		['voce', 'kostunjavo', 'krem', 'keks', 'oblik', 'tezina'],
		true);
	var slagovi = "ne";
	if (form.slagovi[0].checked) // Paziti na ovo! slagovi[0] je "Da", ali to se za svaku formu treba proveriti!
		slagovi = "da";
	podaci += "&slagovi=" + slagovi;
	
	ukljuciFormu(form, false);
	
	saljiAJAX("napravi", "POST", podaci,
		function(xhr) {
			var tekst = xhr.responseText;
			if (tekst.startsWith("OK ")) {
				//alert("Uspesno ste se registrovali na sajt!");
				var strana = tekst.substring(3);
				window.location = "naruci/" + strana; // Paziti na linkove!
				return;
			}
			else {
				alert(tekst);
				ukljuciFormu(form, true);
			}
		},
		function(xhr) {
			alert("Nije uspelo slanje podataka na sajt :(\n" + xhr.statusText);
			ukljuciFormu(form, true);
		}
	);
}
