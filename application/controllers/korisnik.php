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
		if ($this->Mkorisnik->ulogovan)
			redirect(''); // prebaciti na pocetnu stranu
		$this->smit->stranica('login');
	}
	
	public function registracija()
	{
		$this->smit->stranica('reg_index');
	}
	
	public function reg_fizickolice()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if (isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('', '');
			$greska = "";
			
			if ($this->form_validation->run('registracija') == false) {
				die(validation_errors());
			}
			
			$id = $this->Mkorisnik->novoFizLice(
				set_value('korisnickoime'), set_value('sifra'), set_value('email'),
				set_value('ime'), set_value('prezime'));
			if ($id > 0)
				die("OK");
		}
		
		$this->smit->stranica('reg_fizickolice');
	}
	
	public function reg_firma()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if (isset($_POST['submit'])) {
			$this->form_validation->set_error_delimiters('', '');
			$greska = "";
			
			if ($this->form_validation->run('registracija') == false) {
				die(validation_errors());
			}
			
			var_dump($this);
			
			$id = $this->Mkorisnik->novaFirma(
				set_value('korisnickoime'), set_value('sifra'), set_value('email'),
				set_value('naziv'), set_value('lokacija'), set_value('delatnost'));
			if ($id > 0)
				die("OK");
		}
		
		$this->smit->stranica('reg_firma');
	}
}
