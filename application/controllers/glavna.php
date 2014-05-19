<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glavna extends CI_Controller {

	public function index()
	{
		$this->load->view('template_start');
		$this->load->view('stranice/pocetna');
		$this->load->view('template_end');
	}
}
