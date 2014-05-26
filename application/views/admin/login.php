<form action="<?php echo site_url('admin/login'); ?>" method="post">
<table align="center" width="297" cellpadding="2" cellspacing="3" border="2">
  <tr>
    <th width="171" scope="row">Korisnicko ime:</th>
    <td width="150" align ="left"><input type="text" name="adminime" value="<?php
		if (!empty($adminime)) echo $adminime; ?>"></td>
  </tr>
  <tr>
    <th scope="row">Lozinka:</th>
    <td align="left"><input type="password" name="adminloz" value=""></td>
  </tr>
  <?php if (!empty($greska)) {
    echo '<tr><td align="center" colspan="2"><span class="greska">'
		.$greska.'</span></td></tr>';
  } ?>
  <tr>
    <td align="center" colspan="2"><input type="submit" value="Uloguj se"></td>
  </tr>
</table>
</form>
