
function registracija_firma(forma) {
	var form = document.forms[forma];
	// document.getElementById(forma);
	
	var podaci = unesiFormu(form,
		['korisnickoime', 'sifra', 'sifra2', 'email',
		 'naziv', 'delatnost', 'lokacija'], true);
	ukljuciFormu(form, false);
	
	saljiAJAX("reg_firma", "POST", podaci,
		function(xhr) {
			var tekst = xhr.responseText;
			if (tekst == "OK") {
				alert("Uspesno ste se registrovali na sajt!");
				window.location = "login"; // TODO: Paziti na ove linkove!
				// Ovde se ne moze samo ubaciti PHP kod koji ce ih generisati!
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

function registracija_fizLice(forma) {
	var form = document.forms[forma];
	
	var podaci = unesiFormu(form,
		['korisnickoime', 'sifra', 'sifra2', 'email',
		 'ime', 'prezime'], true);
	ukljuciFormu(form, false);
	
	saljiAJAX("reg_fizickolice", "POST", podaci,
		function(xhr) {
			var tekst = xhr.responseText;
			if (tekst == "OK") {
				alert("Uspesno ste se registrovali na sajt!");
				window.location = "login"; // TODO: Paziti na ove linkove!
				// Ovde se ne moze samo ubaciti PHP kod koji ce ih generisati!
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

function login_pokusaj(forma) {
	var form = document.forms[forma];
	
	var podaci = unesiFormu(form, ['korisnik', 'sifra'], true);
	ukljuciFormu(form, false);
	
	saljiAJAX("login", "POST", podaci,
		function(xhr) {
			var tekst = xhr.responseText;
			if (tekst == "OK") {
				alert("Uspesno ste se ulogovali");
				window.location = "/"; // TODO: Paziti na ove linkove!
				// Ovde se ne moze samo ubaciti PHP kod koji ce ih generisati!
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
