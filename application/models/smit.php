<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SMIT extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function stranica($st, $conf = array()) {
		$this->load->view('template_start', $conf);
		$this->load->view("stranice/$st", $conf);
		$this->load->view('template_end');
	}
    
	function admin_stranica($st, $conf = array()) {
		$this->load->view('admin_template', $conf);
		$this->load->view("admin/$st", $conf);
		$this->load->view('admin_template_footer');
	}
}
