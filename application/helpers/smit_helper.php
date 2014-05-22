<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('smit_priprema_forme')) {
	function smit_priprema_forme(/* $that */) {
		$CI =& get_instance();
		$CI->load->helper('form');
		$CI->load->library('form_validation');
		$CI->form_validation->set_error_delimiters('', '');
	}
}
