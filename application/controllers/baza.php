<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baza extends CI_Controller {

	public function index()
	{
		redirect('baza/torta');
	}
	
	public function torta()
	{
		if (isset($_REQUEST['submit'])) {
			$naz = $_REQUEST['naziv'];
			$cena = floatval($_REQUEST['cena']);
			$tez = intval($_REQUEST['tezina']);
			$voce = intval($_REQUEST['voce']);
			$kostv = intval($_REQUEST['kostunjavo']);
			$krem = intval($_REQUEST['krem']);
			$slags = strtolower($_REQUEST['slagovi']);
			if (($slags == 'da') || ($slags == 'd') || ($slags == 'yes') || ($slags == 'y'))
				$slag = 1; //true;
			else
				$slag = 0; //false;
			$keks = intval($_REQUEST['keks']);
			$obl = $_REQUEST['oblik'];
			
			$torta = array(
			  'Naziv' => $naz,
			  'Cena' => $cena,
			  'Tezina' => $tez,
			  'Voce' => $voce,
			  'KostVoce' => $kostv,
			  'Kremovi' => $krem,
			  'Slagovi' => $slag,
			  'KeksKore' => $keks,
			  'PosebanOblik' => $obl
			);
			$ins_id = -1;
			try {
				$this->db->insert('torta', $torta);
				$ins_id = $this->db->insert_id();
			} catch (Exception $e) {
				die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
			}
			
			$kats = array();
			for ($i=1; $i<=8; $i++) {
				if (isset($_REQUEST["kat$i"]))
					$kats[] = array(
						'IDTorta' => $ins_id,
						'Kategorija' => $i
					);
			}
			try {
				$this->db->insert_batch('kategorijatorte', $kats);
			} catch (Exception $e) {
				die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
			}
			
			echo "<p>Uneta je torta sa ID = $ins_id</p>";
		}
		
		?>
		<h2>MODERATOR: Unos torte u bazu - ponuda torti</h2>
		<form action="torta" name="unostorte">
		<p>
			<label for="tortanaziv">Ime:</label>
			<input type="text" name="naziv" id="tortanaziv" />
		</p>
		<p>
			<label for="tortacena">Cena</label>
			<input type="text" name="cena" id="tortacena" />
			DECIMALNI BROJ, oblika 3.14
		</p>
		<p>
			<label for="tortatezina">Tezina:</label>
			<input type="text" name="tezina" id="tortatezina" />
		</p>
		<p>
			<label for="tortavoce">Voce:</label>
			<select name="voce" id="tortavoce">
				<option value="0" selected>/</option>
				<option value="1">jagode</option>
				<option value="2">maline</option>
				<option value="3">kupine</option>
				<option value="4">borovnice</option>
				<option value="5">banane</option>
				<option value="6">breskve</option>
				<option value="7">jabuke</option>
				<option value="8">kruske</option>
				<option value="9">pomorandze</option>
				<option value="10">ananas</option>
				<option value="11">kajsije</option>
				<option value="12">grozdje</option>
				<option value="13">mango</option>
				<option value="14">sljive</option>
				<option value="15">mandarine</option>
				<option value="16">limun</option>
			</select>
		</p>
		<p>
			<label for="tortakostunjavo">Kostunjavo voce:</label>
			<select name="kostunjavo" id="tortakostunjavo">
				<option value="0" selected>/</option>
				<option value="1">orasi</option>
				<option value="2">lesnik</option>
				<option value="3">kikiriki</option>
				<option value="4">kokos</option>
				<option value="5">badem</option>
				<option value="6">suvo grozdje</option>
			</select>
		</p>
		<p>
			<label for="tortakrem">Kremovi:</label>
			<select name="krem" id="tortakrem">
				<option value="0" selected>nijedan</option>
				<option value="1">krem od vanile</option>
				<option value="2">krem od cokolade</option>
				<option value="3">krem od karamele</option>
				<option value="4">krem od jagode</option>
				<option value="5">krem od narandze</option>
				<option value="6">krem od sumskog voca</option>
				<option value="7">kakao krem</option>
				<option value="8">kafa krem</option>
			</select>
		</p>
		<p>
			<label for="tortaslagda">Slagovi:</label>
			<input name="slagovi" id="tortaslagda" value="Da" checked type="radio">Da</input>
			<input name="slagovi" id="tortaslagne" value="Ne" type="radio">Ne</input>
		</p>
		<p>
			<label for="tortakeks">Keks / kore:</label>
			<select name="keks" id="tortakeks">
				<option value="0">/</option>
				<option value="1">jafa keks</option>
				<option value="2">plazma keks</option>
				<option value="3">napolitanke sa limunom</option>
				<option value="4">napolitanke sa cokoladom</option>
				<option value="5">napolitanke sa kafom</option>
				<option value="6">cookies cokoladni keks</option>
				<option value="7">obicne kore</option>
			</select>
		</p>
		<p>
			<label for="tortaoblik">Poseban oblik? :</label>
			<input name="oblik" id="tortaoblik" type="text" />
		</p>
		<p>Kategorije:
			<br /> <input type="checkbox" name="kat1">Rodjendanske</input>
			<br /> <input type="checkbox" name="kat2">Decije</input>
			<br /> <input type="checkbox" name="kat3">Svadbene</input>
			<br /> <input type="checkbox" name="kat4">Novogodisnje</input>
			<br /> <input type="checkbox" name="kat5">Slavske</input>
			<br /> <input type="checkbox" name="kat6">Posne</input>
			<br /> <input type="checkbox" name="kat7">Kolaci</input>
			<br /> <input type="checkbox" name="kat8">Ostalo</input>
		</p>
		<p>
			<input type="submit" name="submit" value="Unesi" />
		</p>
		</form>
		<?php
	}
}
