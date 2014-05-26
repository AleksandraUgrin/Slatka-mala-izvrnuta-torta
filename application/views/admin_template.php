<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrator</title>
<style type="text/css">
	body {
		font-family: Trebuchet, "Trebuchet MS", Helvetica, sans-serif;
		color: #3A1F18;
	}
	.naslov {
		margin-top: 0;
		margin-bottom: 36px;
		font-size: xx-large;
		font-family: "Narkisim", Helvetica, Arial, sans-serif;	
	}
	.greska {
		color: red;
	}
	.poruka {
		color: blue;
	}
	.link {
		font-size: 24px;
		text-align: center;
		margin-bottom: 6px;
		margin-top: 6px;
		font-family: "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
	}
	th {
		text-align: right;
		font-size: 16px;
	}
</style>
</head>

<body bgcolor="#EDD0A1">

<?php if (!empty($_SESSION['adminid'])) {
	echo '<div style="position: fixed; right: 10px; top: 10px; text-align: right">';
	echo $_SESSION['adminime'] . ' <a href="' . site_url('admin/odjava') . '">Odjava</a>';
	echo '</div>';
} ?>
<div align="center">
<img src="/images/logo.png" alt="Slatka mala poslasticarnica"/></div>
<!-- ../../Fakultet/VI semestar/PSI/Prototip html/logo.png -->

<p align="center" class="naslov">Administratorski meni</p>

