<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/torta.js"></script>

<div id="text1" style="position:absolute; overflow:hidden; left:325px; top:445px; width:490px; height:54px; z-index:21">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws36"><B>Porucivanje</B></font></div>
</div></div>

<script type="text/javascript">
	var jedCena = <?php echo $cena; ?>;
</script>

<form action="<?php echo site_url("torte/poruci/"); /* torte/poruci/$idtorta */ ?>" method="POST" name="poruci" />
<?php
	echo "<input type=\"hidden\" name=\"idtorta\" value=\"$idtorta\" />";
?>
<input name="ime" type="text" style="position:absolute;width:367px;left:476px;top:572px;z-index:22">
<input name="adresa" type="text" style="position:absolute;width:367px;left:476px;top:621px;z-index:23">
<input name="datum" type="text" style="position:absolute;width:367px;left:476px;top:672px;z-index:24">
<input name="kolicina" type="text" style="position:absolute;width:367px;left:475px;top:723px;z-index:25">
<input name="nacinplacanja" type="text" style="position:absolute;width:367px;left:475px;top:776px;z-index:26">
<input name="submit" type="submit" value="Potvrdi" onClick='poruci_tortu("poruci", jedCena); return false;'
	style="position:absolute;left:507px;top:902px;z-index:27">
</form>

<div id="text3" style="position:absolute; overflow:hidden; left:131px; top:568px; width:324px; height:32px; z-index:28">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Ime i prezime / ime firme:</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:164px; top:617px; width:256px; height:32px; z-index:29">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Adresa za isporuku:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:159px; top:669px; width:264px; height:32px; z-index:30">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Datum isporuke:</B></font></div>
</div></div>

<div id="text6" style="position:absolute; overflow:hidden; left:234px; top:721px; width:113px; height:32px; z-index:31">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Kolicina:</B></font></div>
</div></div>

<div id="text7" style="position:absolute; overflow:hidden; left:184px; top:775px; width:208px; height:32px; z-index:32">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Nacin placanja:</B></font></div>
</div></div>
