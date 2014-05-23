<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'reg_firma' => array(
		array(
			'field' => 'korisnickoime',
			'label' => 'Korisnicko ime',
			'rules' => 'alpha_dash|max_length[20]|is_unique[regkorisnik.KorIme]'
		),
		array(
			'field' => 'sifra',
			'label' => 'Sifra',
			'rules' => 'required|min_length[5]' // |md5
		),
		array(
			'field' => 'sifra2',
			'label' => 'Potvrda sifre',
			'rules' => 'required|matches[sifra]'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'strtolower|required|valid_email'
		),
		// Firma
		array(
			'field' => 'naziv',
			'label' => 'Naziv firme',
			'rules' => 'required'
		),
		array(
			'field' => 'delatnost',
			'label' => 'Delatnost',
			'rules' => 'required'
		),
		array(
			'field' => 'lokacija',
			'label' => 'Lokacija',
			'rules' => 'required'
		)
	),
	'reg_fizlice' => array(
		array(
			'field' => 'korisnickoime',
			'label' => 'Korisnicko ime',
			'rules' => 'alpha_dash|max_length[20]|is_unique[regkorisnik.KorIme]'
		),
		array(
			'field' => 'sifra',
			'label' => 'Sifra',
			'rules' => 'required|min_length[5]' // |md5
		),
		array(
			'field' => 'sifra2',
			'label' => 'Potvrda sifre',
			'rules' => 'required|matches[sifra]'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'strtolower|required|valid_email'
		),
		// Fizicko lice
		array(
			'field' => 'ime',
			'label' => 'Ime',
			'rules' => 'required'
		),
		array(
			'field' => 'prezime',
			'label' => 'Prezime',
			'rules' => 'required'
		)
	),
	
	'napravi_tortu' => array(
		array(
			'field' => 'voce',
			'label' => 'Voce',
			'rules' => 'required|is_natural|less_than[17]|intval' // SELECT polje koje koristi samo brojeve
		),
		array(
			'field' => 'kostunjavo',
			'label' => 'Kostunjavo voce',
			'rules' => 'required|is_natural|less_than[7]|intval'
		),
		array(
			'field' => 'krem',
			'label' => 'Kremovi',
			'rules' => 'required|is_natural|less_than[9]|intval' // SELECT
		),
		array(
			'field' => 'keks',
			'label' => 'Keks',
			'rules' => 'required|is_natural|less_than[8]|intval' // SELECT
		),
		array(
			'field' => 'tezina',
			'label' => 'Tezina',
			'rules' => 'required|is_natural|intval' // tezina je ceo broj u gramima
		)
	)
);