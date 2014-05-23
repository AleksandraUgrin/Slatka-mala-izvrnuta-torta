<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('smit_priprema_forme')) {
	function smit_priprema_forme(/* $that */) {
		$CI =& get_instance();
		$CI->load->helper('form');
		$CI->load->library('form_validation');
		$CI->form_validation->set_error_delimiters('', '');
	}
}

if (!function_exists('cena_torte')) {
	function cena_torte($v, $kv, $kr, $k, $sl, $t) {
		$cena = 400;
		
		switch ($v) {
			case  1: $cena += 80;  break;
			case  2: $cena += 100; break;
			case  3: $cena += 100; break;
			case  4: $cena += 100; break;
			case  5: $cena += 80;  break;
			case  6: $cena += 50;  break;
			case  7: $cena += 50;  break;
			case  8: $cena += 80;  break;
			case  9: $cena += 90;  break;
			case 10: $cena += 100; break;
			case 11: $cena += 100; break;
			case 12: $cena += 90;  break;
			case 13: $cena += 130; break;
			case 14: $cena += 70;  break;
			case 15: $cena += 100; break;
			case 16: $cena += 100; break;
		}
		
		switch ($kv) {
			case 1: $cena += 100; break;
			case 2: $cena += 130; break;
			case 3: $cena += 130; break;
			case 4: $cena += 80;  break;
			case 5: $cena += 130; break;
			case 6: $cena += 90;  break;
		}
		
		switch ($kr) {
			case 1: $cena += 150; break;
			case 2: $cena += 150; break;
			case 3: $cena += 180; break;
			case 4: $cena += 180; break;
			case 5: $cena += 180; break;
			case 6: $cena += 200; break;
			case 7: $cena += 160; break;
			case 8: $cena += 160; break;
		}
		
		switch ($k) {
			case 1: $cena += 150; break;
			case 2: $cena += 150; break;
			case 3: $cena += 130; break;
			case 4: $cena += 100; break;
			case 5: $cena += 110; break;
			case 6: $cena += 140; break;
			case 7: $cena += 100; break;
		}
		
		/* if ($sl) $cena += X; */
		
		$cena *= intval($t) / 1000; // dosadasnja cena je po kg
		return $cena;
	}
}

if (!function_exists('ispravan_datum')) {
	function ispravan_datum($str) {
		// $this->form_validation->set_message('ispravan_datum', '...');
		// date_timestamp_get(date_create($str))
		$d = date_parse($str);
		
		if (($d['warning_count'] > 0) || ($d['error_count'] > 0))
			return FALSE;
		
		if ($d['is_localtime'])
			$timestamp = mktime(0, 0, 0, $d['month'], $d['day'], $d['year']);
		else
			$timestamp = gmmktime(0, 0, 0, $d['month'], $d['day'], $d['year']);
		return $timestamp; // return TRUE;
	}
}
