<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontakt extends CI_Controller {

	public function index()
	{
		$this->smit->stranica('kontakt');
	}
	
	public function poslato()
	{
		$this->smit->stranica('kontakt_poslato');
	}
}
