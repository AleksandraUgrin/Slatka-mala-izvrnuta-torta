<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Torte extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('MTorta', 'torta', TRUE);
    }
	
	public function index()
	{
		redirect('galerija');
	}
	
	public function rodjendanske()
	{
		$torte = $this->torta->listajKat(1);
		$naslov = "Rodjendanske torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 1,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function decije()
	{
		$torte = $this->torta->listajKat(2);
		$naslov = "Dečije torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 2,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function svadbene()
	{
		$torte = $this->torta->listajKat(3);
		$naslov = "Svadbene torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 3,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function novogodisnje()
	{
		$torte = $this->torta->listajKat(4);
		$naslov = "Novogodišnje torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 4,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function slavske()
	{
		$torte = $this->torta->listajKat(5);
		$naslov = "Slavske torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 5,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function posne()
	{
		$torte = $this->torta->listajKat(6);
		$naslov = "Posne torte";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 6,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function kolaci()
	{
		$torte = $this->torta->listajKat(7);
		$naslov = "Kolači";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 7,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function ostalo()
	{
		$torte = $this->torta->listajKat(8);
		$naslov = "Ostalo iz naše ponude";
		$this->smit->stranica('rodjendanske', array(
			'kat' => 8,
			'katnaziv' => $naslov,
			'torte' => $torte));
	}
	
	public function t($id)
	{
		if (empty($id))
			redirect('galerija');
		if (intval($id) <= 0)
			redirect('galerija');
		
		$torta = $this->torta->sveOTorti($id);
		if ($torta == FALSE)
			redirect('galerija'); // nema torte u bazi
		
		$this->smit->stranica('sesir_torta', array('torta' => $torta));
	}
	
	public function napravi() {
		if (!$this->mkorisnik->ulogovan)
			redirect('galerija');
		
		if (isset($_POST['submit'])) {
			if (!$this->mkorisnik->ulogovan)
				die("Uloguj se za pravljenje svojih torti...");
			
			smit_priprema_forme();
			$greska = "";
			
			if ($this->form_validation->run('napravi_tortu') == false) {
				die(validation_errors());
			}
			$slags = strtolower($_POST['slagovi']);
			if (($slags == 'da') || ($slags == 'd') || ($slags == 'yes') || ($slags == 'y'))
				$slag = 1; //true;
			else
				$slag = 0; //false;
			if (!empty($_POST['oblik']))
				$oblik = $_POST['oblik'];
			else
				$oblik = '';
			
			$id = $this->torta->novaPoNarudzbini(
				set_value('voce'), set_value('kostunjavo'), set_value('krem'),
				$slag, set_value('keks'), $oblik, set_value('tezina'));
			if ($id > 0)
				die("OK $id");
		}
		
		$this->smit->stranica('napravi_tortu');
	}
	
	public function poruci($id = 0) {
		/*if (empty($id))
			redirect('galerija');*/
		//if (intval($id) <= 0) ...umesto ovoga ide provera u bazi
		
		if (isset($_POST['submit'])) {
			if ($this->mkorisnik->ulogovan)
				$nalog = intval($_SESSION['idreg']);
			else
				$nalog = 0;
			
			smit_priprema_forme();
			$greska = "";
			
			if ($this->form_validation->run('porucivanje') == false) {
				die(validation_errors());
			}
			
			$pid = $this->torta->porudzbina(
				set_value('idtorta'), $nalog, set_value('ime'), set_value('adresa'),
				set_value('datum'), set_value('kolicina'), set_value('nacinplacanja'));
			if ($pid > 0)
				die("OK $pid");
		}
		
		$query = $this->db->get_where('torta', array('IDTorta' => intval($id)), 1);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$conf = array(
				'idtorta' => intval($id), // IDTorta
				'cena' => $row->Cena
			);
			$this->smit->stranica('porucivanje', $conf);
		} else
			redirect('galerija');
	}
	
	
	// CALLBACK FUNKCIJA. Privremeno resenje za CodeIgniter bug?
	// (izgleda da se ignorise rezultat globalne f-je)
	function ispravan_datum($str) {
		return ispravan_datum($str);
	}
}
