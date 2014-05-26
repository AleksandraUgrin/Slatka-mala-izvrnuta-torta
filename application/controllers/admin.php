<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function _logged_in() {
		return !empty($_SESSION['adminid']);
	}
	
	public function index()
	{
		//redirect('admin/login');
		if ($this->_logged_in())
			$this->smit->admin_stranica('izbor');
		else
			$this->smit->admin_stranica('login');
	}
	
	public function login()
	{
		if ($this->_logged_in())
			redirect('admin/index');
		
		if (isset($_POST['adminime'])) {
			$adminime = trim($_POST['adminime']);
			$adminloz = isset($_POST['adminloz']) ? $_POST['adminloz'] : '';
			
			$greska = '';
			if (empty($adminime))
				$greska = "Unesite korisnicko ime";
			elseif (empty($adminloz))
				$greska = "Unesite lozinku";
			
			if (!empty($greska)) {
				$this->smit->admin_stranica('login', array(
					"greska" => $greska,
					"adminime" => $adminime
				));
				return;
			}
			
			$query = $this->db->where('KorIme', $adminime)->get('admin');
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$lozinka = $row->Sifra;
				if ($lozinka == md5($adminloz)) {
					$_SESSION['adminid'] = $row->IDAdmin;
					$_SESSION['adminime'] = $row->KorIme; // $adminime
					$_SESSION['adminlvl'] = $row->Nivo;
					redirect('admin/index');
				}
				else
					$greska = "Nepostojeci nalog ili lozinka";
			}
			else
				$greska = "Nepostojeci nalog ili lozinka";
			
			$this->smit->admin_stranica('login', array(
				"greska" => $greska,
				"adminime" => $adminime
			));
		}
		else
			$this->smit->admin_stranica('login');
	}
	
	public function odjava() {
		unset($_SESSION['adminid']);
		unset($_SESSION['adminime']);
		unset($_SESSION['adminlvl']);
		redirect(''); // "glavna"
	}
	
	public function dodajtortu() {
		if (!$this->_logged_in())
			redirect('admin/login');
		
		$this->load->helper('form');
		
		if (isset($_POST['submit'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', ''); // rucno cemo ovo obradjivati
			$greske = array();
			
			$this->form_validation->set_rules('naziv', 'Naziv', 'required');
			$this->form_validation->set_rules('cena', 'Cena', 'required|decimal|greater_than[0]|floatval'); // greater_than => numeric
			$this->form_validation->set_rules('tezina', 'Težina', 'required|is_natural|intval');
			$this->form_validation->set_rules('slika', 'Slika', 'required|prep_url');
			$voce = empty($_POST['voce']) ? 0 : intval($_POST['voce']);
			$kost = empty($_POST['kostunjavo']) ? 0 : intval($_POST['kostunjavo']);
			$krem = empty($_POST['krem']) ? 0 : intval($_POST['krem']);
			$keks = empty($_POST['keks']) ? 0 : intval($_POST['keks']);
			if (($voce < 0) || ($voce > 16)) {
				$greske[] = "Izaberite voce sa liste";
				$voce = 0;
			}
			if (($kost < 0) || ($kost > 6)) {
				$greske[] = "Izaberite kostunjavo voce sa liste";
				$kost = 0;
			}
			if (($krem < 0) || ($krem > 8)) {
				$greske[] = "Izaberite krem sa liste";
				$krem = 0;
			}
			if (($keks < 0) || ($keks > 7)) {
				$greske[] = "Izaberite keks/kore sa liste";
				$keks = 0;
			}
			$kat = array();
			if (!empty($_POST['kat']) && is_array($_POST['kat'])) {
				foreach($_POST['kat'] as $k) {
					$kk = intval($k);
					if (($kk > 0) && ($kk <= 8)) // 8 kategorija torti imamo
						$kat[] = $kk;
				}
			}
			if (empty($kat))
				$greske[] = "Izaberite bar jednu kategoriju torte";
			
			$prosao = $this->form_validation->run();
			
			$slags = strtolower($_POST['slagovi']);
			if (($slags == 'da') || ($slags == 'd') || ($slags == 'y'))
				$slag = 1;
			else
				$slag = 0;
			$naziv = set_value("naziv");
			$cena = set_value("cena");
			$tezina = set_value("tezina");
			$oblik = empty($_POST['oblik']) ? "" : set_value("oblik");
			$slika = set_value("slika");
			$tekstrec = empty($_POST['recept']) ? "" : set_value("recept");
			
			if (!$prosao) {
				$greske2 = explode("\n", validation_errors());
				foreach ($greske2 as $gr)
					$greske[] = $gr;
			}
			$view_conf = array(
				"greske" => $greske,
				"t_voce" => $voce,
				"t_kost" => $kost,
				"t_krem" => $krem,
				"t_keks" => $keks,
				"t_slag" => $slag,
				"t_naziv" => $naziv,
				"t_cena" => $cena,
				"t_tezina" => $tezina,
				"t_oblik" => $oblik,
				"t_slika" => $slika,
				"t_tekst" => $tekstrec
				// za kategorije se koristi set_checkbox direktno u view fajlu
			);
			
			if (!empty($greske)) {
				$this->smit->admin_stranica('unostorte', $view_conf);
				return;
			}
			
			$this->load->model('MTorta', 'torta');
			$id = $this->torta->novaTorta(
				$naziv, $cena, $tezina, $voce, $kost, $krem, $slag, $keks,
				$oblik, $slika, $tekstrec, $kat);
			if ($id > 0)
				$view_conf = array(
					"unospor" => "Uspešno uneta torta, ID = $id"
				); // brisemo sve greske i vrednosti iz forme, jer se sada unosi nova torta
			else
				$view_conf['greske'] = array("Neuspešan unos torte u bazu, pokušati ponovo");
			
			$this->smit->admin_stranica('unostorte', $view_conf);
		}
		else
			$this->smit->admin_stranica('unostorte');
	}
	
	public function poruke() {
		if (!$this->_logged_in())
			redirect('admin/login');
	}
}
