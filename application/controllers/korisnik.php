<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Korisnik extends CI_Controller {

	/*function __construct()
    {
        parent::__construct();
		$this->load->model('SMIT', '', TRUE);
    }*/

	public function index()
	{
		redirect('korisnik/login');
	}
	
	public function login()
	{
		if ($this->mkorisnik->ulogovan)
			redirect(''); // prebaciti na pocetnu stranu
		
		if (isset($_POST['submit'])) {
			$korime = $_POST['korisnik'];
			$sifra  = $_POST['sifra'];
			try{
				$query = $this->db->get_where(
					'regkorisnik', array('KorIme' => $korime), 1);
				if ($query->num_rows() > 0) {
					$row = $query->row();
					$sifra2 = $row->Sifra;
					if (md5($sifra) != $sifra2)
						die("Korisnicko ime ili sifra nisu ispravni!");
				}
				else
					die("Korisnicko ime ili sifra nisu ispravni!");
				
				// session_start();
				$id = intval($row->IDReg);
				$query1 = $this->db->get_where('firma', array('IDReg' => $id), 1);
				$query2 = $this->db->get_where('fizlice', array('IDReg' => $id), 1);
				if ($query1->num_rows() > 0) {
					$row1 = $query1->row();
					$_SESSION['nazivfirme'] = $row1->Naziv;
				}
				else if ($query2->num_rows() > 0) {
					$row1 = $query2->row();
					$_SESSION['imeprezime'] = $row1->Ime . ' ' . $row1->Prezime;
				}
				$_SESSION['idreg'] = $id;
				$_SESSION['korisnik'] = $row->KorIme;
				die("OK");
				
			} catch (Exception $e) {
				die("Greska sa bazom, pokusajte kasnije...");
			}
		}
		
		$this->smit->stranica('login');
	}
	
	public function registracija()
	{
		$this->smit->stranica('reg_index');
	}
	
	public function reg_fizickolice()
	{
		if (isset($_POST['submit'])) {
			smit_priprema_forme();
			$greska = "";
			
			if ($this->form_validation->run('reg_fizlice') == false) {
				die(validation_errors());
			}
			
			$id = $this->mkorisnik->novoFizLice(
				set_value('korisnickoime'), set_value('sifra'), set_value('email'),
				set_value('ime'), set_value('prezime'));
			if ($id > 0)
				die("OK");
		}
		
		$this->smit->stranica('reg_fizickolice');
	}
	
	public function reg_firma()
	{
		//$this->load->helper('form');
		//$this->load->library('form_validation');
		
		if (isset($_POST['submit'])) {
			smit_priprema_forme();
			$greska = "";
			
			if ($this->form_validation->run('reg_firma') == false) {
				die(validation_errors());
			}
			
			$id = $this->mkorisnik->novaFirma(
				set_value('korisnickoime'), set_value('sifra'), set_value('email'),
				set_value('naziv'), set_value('lokacija'), set_value('delatnost'));
			if ($id > 0)
				die("OK");
		}
		
		$this->smit->stranica('reg_firma');
	}
	
	public function logout()
	{
		unset($_SESSION['idreg']);
		unset($_SESSION['korisnik']);
		unset($_SESSION['nazivfirme']);
		unset($_SESSION['kor_ime']);
		unset($_SESSION['kor_prezime']);
		unset($_SESSION['imeprezime']);
		
		redirect('');
	}
}
