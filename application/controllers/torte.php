<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Torte extends CI_Controller {

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
