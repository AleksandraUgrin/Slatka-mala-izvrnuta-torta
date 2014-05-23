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
}
