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
		$this->smit->stranica('rodjendanske');
	}
	
	public function decije()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function svadbene()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function novogodisnje()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function slavske()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function posne()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function kolaci()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function ostalo()
	{
		$this->smit->stranica('rodjendanske');
	}
	
	public function t($id)
	{
		if (empty($id))
			redirect('galerija');
		if (intval($id) <= 0)
			redirect('galerija');
		
		$this->smit->stranica('sesir_torta');
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
	
	public function poruci($id) {
		if (empty($id))
			redirect('galerija');
		/*if ($id == 'new')
			... */
		//if (intval($id) <= 0) ...umesto ovoga ce biti provera u bazi
		
		$this->smit->stranica('porucivanje');
	}
}
