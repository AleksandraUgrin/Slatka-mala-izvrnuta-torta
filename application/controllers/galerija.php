<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerija extends CI_Controller {

	public function index()
	{
		$this->smit->stranica('galerija');
	}
}
