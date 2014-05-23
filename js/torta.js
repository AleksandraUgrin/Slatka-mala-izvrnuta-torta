
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
				window.location = "poruci/" + strana; // Paziti na linkove!
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

function poruci_tortu(forma /*id*/, cena) {
	var form = document.forms[forma];
	var podaci = unesiFormu(form,
		['idtorta', 'ime', 'adresa', 'datum', 'kolicina', 'nacinplacanja'],
		true);
	
	if (isNaN(form.kolicina.value)) {
		alert("Kolicina nije ispravna; uneti ceo broj veci od 0");
		return;
	}
	var kol = parseInt(form.kolicina.value);
	var ukupna = kol * cena;
	if ((ukupna <= 0) || isNaN(ukupna)) {
		alert("Kolicina nije ispravna; uneti ceo broj veci od 0");
		return;
	}
	if (!confirm("Izabrana torta ce vas kostati " + ukupna
	  + " dinara. Potvrditi porudzbinu?"))
		return;
	
	ukljuciFormu(form, false);
	
	// druga varijanta je: ista stranica (/torte/poruci/<ID>)
	// koristimo varijantu /torte/poruci, a ID se salje u POST kao i sve drugo
	saljiAJAX("../poruci", "POST", podaci,
		function(xhr) {
			var tekst = xhr.responseText;
			if (tekst.startsWith("OK ")) {
				alert("Narudzbina je uspesno obavljena!");
				window.location = ".."; // 'torte' - PAZITI MNOGO NA LINOVE U JS-u!
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
