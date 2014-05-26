<?php
if (empty($t_voce)) $t_voce = 0;
if (empty($t_kost)) $t_kost = 0;
if (empty($t_krem)) $t_krem = 0;
if (empty($t_keks)) $t_keks = 0;
if (!isset($t_slag)) $t_slag = 1;
?>
<form name="unosponuda" action="<?php echo site_url('admin/dodajtortu'); ?>" method="post">
<table align="center" width="640" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <th colspan="2" scope="col" style="text-align: center">Unesite tortu u bazu podataka:</th>
  </tr>
  <?php if (!empty($unospor)) {
    echo '<tr><td align="center" colspan="2"><span class="poruka">'
		.$unospor.'</span></td></tr>';
  } ?>
  <tr>
    <th width="150" scope="row">Kategorija:</th>
    <td width="483">
		<input type="checkbox" name="kat[]" value="1"<?php echo set_checkbox('kat[]', 1); ?>>Rodjendanske</input>
		<input type="checkbox" name="kat[]" value="2"<?php echo set_checkbox('kat[]', 2); ?>>Decije</input>
		<input type="checkbox" name="kat[]" value="3"<?php echo set_checkbox('kat[]', 3); ?>>Svadbene</input>
		<input type="checkbox" name="kat[]" value="4"<?php echo set_checkbox('kat[]', 4); ?>>Novogodisnje</input>
		<br>
		<input type="checkbox" name="kat[]" value="5"<?php echo set_checkbox('kat[]', 5); ?>>Slavske</input>
		<input type="checkbox" name="kat[]" value="6"<?php echo set_checkbox('kat[]', 6); ?>>Posne</input>
		<input type="checkbox" name="kat[]" value="7"<?php echo set_checkbox('kat[]', 7); ?>>Kolaci</input>
		<input type="checkbox" name="kat[]" value="8"<?php echo set_checkbox('kat[]', 8); ?>>Ostalo</input>
	</td>
  </tr>
  <tr>
    <th scope="row">Naziv:</th>
    <td><input type="text" name="naziv" id="tortanaziv" size="50" value="<?php
			if (!empty($t_naziv)) echo $t_naziv; ?>"/></td>
  </tr>
  <tr>
    <th scope="row">Cena:</th>
    <td><input type="text" name="cena" id="tortacena" value="<?php
			if (!empty($t_cena)) echo $t_cena; ?>"/></td>
  </tr>
  <tr>
    <th scope="row">Tezina:</th>
    <td><input type="text" name="tezina" id="tortatezina" value="<?php
			if (!empty($t_tezina)) echo $t_tezina; ?>"/></td>
  </tr>
  <tr>
    <th scope="row">Voce:</th>
    <td><select name="voce" id="tortavoce">
		<option value="0"<?php if ($t_voce == 0) echo " selected"; ?>>/</option>
		<option value="1"<?php if ($t_voce == 1) echo " selected"; ?>>jagode</option>
		<option value="2"<?php if ($t_voce == 2) echo " selected"; ?>>maline</option>
		<option value="3"<?php if ($t_voce == 3) echo " selected"; ?>>kupine</option>
		<option value="4"<?php if ($t_voce == 4) echo " selected"; ?>>borovnice</option>
		<option value="5"<?php if ($t_voce == 5) echo " selected"; ?>>banane</option>
		<option value="6"<?php if ($t_voce == 6) echo " selected"; ?>>breskve</option>
		<option value="7"<?php if ($t_voce == 7) echo " selected"; ?>>jabuke</option>
		<option value="8"<?php if ($t_voce == 8) echo " selected"; ?>>kruske</option>
		<option value="9"<?php if ($t_voce == 9) echo " selected"; ?>>pomorandze</option>
		<option value="10"<?php if ($t_voce == 10) echo " selected"; ?>>ananas</option>
		<option value="11"<?php if ($t_voce == 11) echo " selected"; ?>>kajsije</option>
		<option value="12"<?php if ($t_voce == 12) echo " selected"; ?>>grozdje</option>
		<option value="13"<?php if ($t_voce == 13) echo " selected"; ?>>mango</option>
		<option value="14"<?php if ($t_voce == 14) echo " selected"; ?>>sljive</option>
		<option value="15"<?php if ($t_voce == 15) echo " selected"; ?>>mandarine</option>
		<option value="16"<?php if ($t_voce == 16) echo " selected"; ?>>limun</option>
	</select></td>
  </tr>
  <tr>
    <th scope="row">Kostunjavo voce:</th>
    <td><select name="kostunjavo" id="tortakostunjavo">
		<option value="0"<?php if ($t_kost == 0) echo " selected"; ?>>/</option>
		<option value="1"<?php if ($t_kost == 1) echo " selected"; ?>>orasi</option>
		<option value="2"<?php if ($t_kost == 2) echo " selected"; ?>>lesnik</option>
		<option value="3"<?php if ($t_kost == 3) echo " selected"; ?>>kikiriki</option>
		<option value="4"<?php if ($t_kost == 4) echo " selected"; ?>>kokos</option>
		<option value="5"<?php if ($t_kost == 5) echo " selected"; ?>>badem</option>
		<option value="6"<?php if ($t_kost == 6) echo " selected"; ?>>suvo grozdje</option>
	</select></td>
  </tr>
  <tr>
    <th scope="row">Kremovi:</th>
    <td><select name="krem" id="tortakrem">
		<option value="0"<?php if ($t_krem == 0) echo " selected"; ?>>nijedan</option>
		<option value="1"<?php if ($t_krem == 1) echo " selected"; ?>>krem od vanile</option>
		<option value="2"<?php if ($t_krem == 2) echo " selected"; ?>>krem od cokolade</option>
		<option value="3"<?php if ($t_krem == 3) echo " selected"; ?>>krem od karamele</option>
		<option value="4"<?php if ($t_krem == 4) echo " selected"; ?>>krem od jagode</option>
		<option value="5"<?php if ($t_krem == 5) echo " selected"; ?>>krem od narandze</option>
		<option value="6"<?php if ($t_krem == 6) echo " selected"; ?>>krem od sumskog voca</option>
		<option value="7"<?php if ($t_krem == 7) echo " selected"; ?>>kakao krem</option>
		<option value="8"<?php if ($t_krem == 8) echo " selected"; ?>>kafa krem</option>
	</select></td>
  </tr>
  <tr>
    <th scope="row">Slagovi:</th>
    <td>
		<input name="slagovi" id="tortaslagda" value="Da" type="radio"<?php
			if ($t_slag == 1) echo " checked"; ?>>Da</input>
		<input name="slagovi" id="tortaslagne" value="Ne" type="radio"<?php
			if ($t_slag == 0) echo " checked"; ?>>Ne</input>
	</td>
  </tr>
  <tr>
    <th scope="row">Keks kore:</th>
    <td><select name="keks" id="tortakeks">
		<option value="0"<?php if ($t_keks == 0) echo " selected"; ?>>/</option>
		<option value="1"<?php if ($t_keks == 1) echo " selected"; ?>>jafa keks</option>
		<option value="2"<?php if ($t_keks == 2) echo " selected"; ?>>plazma keks</option>
		<option value="3"<?php if ($t_keks == 3) echo " selected"; ?>>napolitanke sa limunom</option>
		<option value="4"<?php if ($t_keks == 4) echo " selected"; ?>>napolitanke sa cokoladom</option>
		<option value="5"<?php if ($t_keks == 5) echo " selected"; ?>>napolitanke sa kafom</option>
		<option value="6"<?php if ($t_keks == 6) echo " selected"; ?>>cookies cokoladni keks</option>
		<option value="7"<?php if ($t_keks == 7) echo " selected"; ?>>obicne kore</option>
	</select></td>
  </tr>
  <tr>
    <th scope="row">Poseban oblik:</th>
    <td><input name="oblik" id="tortaoblik" type="text" size="50" value="<?php
			if (!empty($t_oblik)) echo $t_oblik; ?>"/></td>
  </tr>
  <tr>
    <th scope="row">Slika (URL):</th>
    <td><input name="slika" id="tortaslika" type="text" size="40" value="<?php
			if (!empty($t_slika)) echo $t_slika; ?>"/></td>
  </tr>
  <tr>
  <tr>
    <th scope="row">Recept:</th>
    <td><textarea rows="5" cols="25" name="recept" id="tortarecept"><?php
			if (!empty($t_tekst)) echo $t_tekst; ?></textarea></td>
  </tr>
  <?php if (!empty($greske)) {
    echo '<tr><td align="center" colspan="2"><span class="greska">'
		.implode("<br>", $greske).'</span></td></tr>';
  } ?>
  <tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Unesi tortu"></td>
  </tr>
</table>
</form>
