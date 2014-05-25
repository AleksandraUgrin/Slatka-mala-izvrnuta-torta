<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MTorta extends CI_Model {

    /*function __construct()
    {
        parent::__construct();
		//session_start();
    }*/
	
	function unosNove($narucena, $naz = '', $c, $v, $kv, $kr, $sl, $k, $obl, $tez, $kat = array()) {
		$torta = array(
		  'Naziv' => $naz,
		  'Cena' => $c,
		  'Tezina' => $tez,
		  'Voce' => $v,
		  'KostVoce' => $kv,
		  'Kremovi' => $kr,
		  'Slagovi' => $sl,
		  'KeksKore' => $k,
		  'PosebanOblik' => $obl
		);
		if ($narucena)
			$torta['Narucena'] = 1;
		
		$ins_id = -1;
		try {
			$this->db->insert('torta', $torta);
			$ins_id = $this->db->insert_id();
		} catch (Exception $e) {
			die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
		}
		
		if ($narucena)
			return $ins_id;
		
		$kats = array();
		foreach ($kat as $v) {
			$kats[] = array(
				'IDTorta' => $ins_id,
				'Kategorija' => $v
			);
		}
		try {
			$this->db->insert_batch('kategorijatorte', $kats);
		} catch (Exception $e) {
			die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
		}
		
		return $ins_id;
	}
	
	function novaPoNarudzbini($v, $kv, $kr, $sl, $k, $obl, $tez) {
		$c = cena_torte($v, $kv, $kr, $k, $sl, $tez);
		return $this->unosNove(true, '', $c, $v, $kv, $kr, $sl, $k, $obl, $tez);
	}
	
	function novaTorta() {
		// TODO!
	}
	
	function porudzbina($id, $login = 0, $ime, $adr, $dat, $kol, $np) {
		$query = $this->db->get_where('torta', array('IDTorta' => $id), 1);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$cenatorte = $row->Cena;
		}
		else
			die("Ne postoji trazena torta!");
		
		$por = array(
			'IDTorta' => $id,
			'Ime' => $ime,
			'AdresaIsporuke' => $adr,
			//'DatumIsporuke' => $dat,
			'Kolicina' => $kol,
			'NacinPlacanja' => $np,
			'Cena' => $cenatorte * $kol
		);
		if ($login > 0)
			$por['IDReg'] = $login;
		$this->db->set('DatumIsporuke', "FROM_UNIXTIME($dat)", FALSE);
		
		$ins_id = -1;
		try {
			$this->db->insert('porudzbina', $por);
			$ins_id = $this->db->insert_id();
		} catch (Exception $e) {
			die("GRESKA SA BAZOM :( <br />" . $this->db->_error_message);
		}
		
		return $ins_id;
	}
	
	function listajKat($kat) {
		if (($kat < 1) || ($kat > 8))
			return false; // 8 kategorija imamo!
		
		$query = $this->db->select('torta.IDTorta, Naziv, Slika')->from('torta')
			->join('kategorijatorte', 'kategorijatorte.IDTorta = torta.IDTorta')
			->where('Kategorija', $kat)->get();
		
		if ($query->num_rows() > 0) {
			$torte = array();
			$rez = $query->result();
			foreach($rez as $row) {
				$torte[] = array(
					'id' => $row->IDTorta,
					'naziv' => $row->Naziv,
					'img' => $row->Slika
				);
			}
			return $torte;
		}
		else
			return array(); // UPS!
	}
	
	function sveOTorti($id) {
		$query = $this->db->where('IDTorta', $id)->where('Narucena', 0)->get('torta');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return array(
				'id' => $row->IDTorta,
				'naziv' => $row->Naziv,
				'cena' => $row->Cena,
				'tezina' => $row->Tezina,
				'oblik' => $row->PosebanOblik,
				'tekst' => $row->Recept,
				'img' => $row->Slika
			);
		}
		else
			return false;
	}
}
