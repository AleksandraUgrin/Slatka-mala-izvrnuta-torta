<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MTorta extends CI_Model {

    /*function __construct()
    {
        parent::__construct();
		//session_start();
    }*/
	
	function unosNovog($tip, $kor_ime, $sifra, $email, $dodatak) {
		$korisnik = array(
			'KorIme' => $kor_ime,
			'Sifra'  => md5($sifra),
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
		
		return $this->unosNovog(2, $kor_ime, $sifra, $email, array(
			'Naziv'     => $naziv,
			'Lokacija'  => $lokacija,
			'Delatnost' => $delatnost
		));
	}
	
	function novoFizLice($kor_ime, $sifra, $email, $ime, $prezime) {
		
		return $this->unosNovog(1, $kor_ime, $sifra, $email, array(
			'Ime'     => $ime,
			'Prezime' => $prezime
		));
	}
}
