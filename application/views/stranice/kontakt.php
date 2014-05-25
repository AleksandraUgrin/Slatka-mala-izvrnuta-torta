<form action="<?php echo site_url('kontakt'); ?>" method="POST">
<input name="email" type="text" style="position:absolute;width:367px;left:476px;top:572px;z-index:21"<?php
	if (!empty($greske)) echo " value=\"$f_email\""; ?>>
<input name="licno" type="text" style="position:absolute;width:367px;left:476px;top:621px;z-index:22"<?php
	if (!empty($greske)) echo " value=\"$f_licno\""; ?>>
<input name="naslov" type="text" style="position:absolute;width:367px;left:476px;top:672px;z-index:23"<?php
	if (!empty($f_naslov)) echo " value=\"$f_naslov\""; ?>>
<input name="submit" type="submit" value="Posalji" style="position:absolute;left:516px;top:922px;z-index:24">
<textarea name="poruka" style="position:absolute;left:476px;top:723px;width:366px;height:172px;z-index:30"><?php
	if (!empty($greske)) echo $f_poruka; ?></textarea>
<?php
	if (!empty($greske))
		echo '<script type="text/javascript">alert("'.addcslashes($greske, "\0..\37").'")</script>';
?>
</form>

<div id="text1" style="position:absolute; overflow:hidden; left:389px; top:446px; width:351px; height:54px; z-index:25">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws36"><B>Kontakt</B></font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:258px; top:617px; width:173px; height:32px; z-index:26">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Licni podaci:</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:247px; top:669px; width:195px; height:32px; z-index:27">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Naslov poruke:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:287px; top:782px; width:113px; height:32px; z-index:28">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Poruka:</B></font></div>
</div></div>

<div id="text7" style="position:absolute; overflow:hidden; left:292px; top:568px; width:113px; height:32px; z-index:29">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>E-mail:</B></font></div>
</div></div>
