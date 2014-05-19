<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkorisnik extends CI_Model {

    var $ulogovan = false;
	var $firma = false;

    function __construct()
    {
        parent::__construct();
		session_start();
		// $this->load->db();
		
		$ulogovan = false;
		$firma = false;
		
		if (!empty($_SESSION['idreg'])) {
			$id = intval($_SESSION['idreg']);
			try{
				$query = $this->db->get_where(
					'regkorisnik', array('IDReg' => $id), 1);
				if ($query->num_rows() > 0)
					$this->ulogovan = true;
				else {
					unset($_SESSION['idreg']);
					unset($_SESSION['korisnik']);
					unset($_SESSION['nazivfirme']);
					unset($_SESSION['kor_ime']);
					unset($_SESSION['kor_prezime']);
					unset($_SESSION['imeprezime']);
				}
			} catch (Exception $e) {
				die("Greska sa bazom, pokusajte kasnije...");
			}
			
			$this->firma = !empty($_SESSION['nazivfirme']);
		}
    }
	
	function unosNovog($tip, $kor_ime, $sifra, $email, $dodatak) {
		$korisnik = array(
			'KorIme' => $kor_ime,
			'Sifra'  => $sifra,
			'Email'  => $email
			// 'Telefon' => null
		);
		
		if ($tip == 1) {
			// Fizicko lice
			/*$fizlice = array(
				'Ime'     => $dodatak['ime'],
				'Prezime' => $dodatak['prezime']
			);*/
			$fizlice = $dodatak;
		}
		else if ($tip == 2) {
			// Firma
			$firma = $dodatak;
		}
		else // Greska
			return false;
		
		try {
			$this->db->insert('regkorisnik', $korisnik);
			$ins_id = $this->db->insert_id();
			if (isset($fizlice)) {
				$fizlice['IDReg'] = $ins_id;
				$this->db->insert('fizlice', $fizlice);
			}
			else { // firma
				$firma['IDReg'] = $ins_id;
				$this->db->insert('firma', $firma);
			}
			return $ins_id;
			
		} catch (Exception $e) {
			die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
		}
	}
	
	function novaFirma($kor_ime, $sifra, $email, $naziv, $lokacija, $delatnost) {
		
		return unosNovog(2, $kor_ime, $sifra, $email, array(
			'Naziv'     => $naziv,
			'Lokacija'  => $lokacija,
			'Delatnost' => $delatnost
		));
	}
	
	function novoFizLice($kor_ime, $sifra, $email, $ime, $prezime) {
		
		return unosNovog(1, $kor_ime, $sifra, $email, array(
			'Ime'     => $ime,
			'Prezime' => $prezime
		));
	}
}
