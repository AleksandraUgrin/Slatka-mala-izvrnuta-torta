
function registracija_firma(forma) {
	var form = document.forms[forma];
	// document.getElementById(forma);
	
	var podaci = "submit=1" // Uvek staviti "submit=1" na pocetak!
		+ "&korisnickoime=" + encodeURIComponent(form.korisnickoime.value)
		+ "&sifra=" + encodeURIComponent(form.sifra.value)
		+ "&sifra2=" + encodeURIComponent(form.sifra2.value)
		+ "&email=" + encodeURIComponent(form.email.value)
		// Podaci za firmu
		+ "&naziv=" + encodeURIComponent(form.naziv.value)
		+ "&delatnost=" + encodeURIComponent(form.delatnost.value)
		+ "&lokacija=" + encodeURIComponent(form.lokacija.value);
	// TODO: iskljuciti mogucnost unosa dok se salje zahtev (disabled = true)
	
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
				// Ukljuciti mogucnost unosa podataka! (disabled = false)
			}
		},
		function(xhr) {
			alert(xhr.statusText);
			// Ukljuciti mogucnost unosa podataka!
		}
	);
}
