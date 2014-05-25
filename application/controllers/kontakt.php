<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontakt extends CI_Controller {

	public function index()
	{
		if (isset($_POST['submit'])) {
			smit_priprema_forme();
			
			if ($this->form_validation->run('kontakt') == false) {
				$conf = array(
					'greske' => validation_errors(),
					'f_email' => set_value("email"),
					'f_licno' => set_value("licno"),
					'f_naslov' => empty($_POST['naslov']) ? '' : $_POST["naslov"],
						// ovde ne radi set_value jer polje nije obavezno (nema definisano pravilo)
					'f_poruka' => set_value("poruka")
				);
				$this->smit->stranica('kontakt', $conf);
			}
			else {
				$poruka = array(
					'Email' => set_value("email"),
					'LicniPodaci' => set_value("licno"),
					'Poruka' => set_value("poruka")
				);
				$naslov = set_value("naslov");
				if (!empty($naslov))
					$poruka['Naslov'] = $naslov;
				
				$this->db->insert('mejl', $poruka);
				
				redirect('kontakt/poslato');
			}
		}
		else
			$this->smit->stranica('kontakt');
	}
	
	public function poslato()
	{
		$this->smit->stranica('kontakt_poslato');
	}
}
