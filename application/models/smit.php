<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SMIT extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function stranica($st) {
		$this->load->view('template_start');
		$this->load->view("stranice/$st");
		$this->load->view('template_end');
	}
	
	function printme() {
		var_dump($this);
	}
    
}
