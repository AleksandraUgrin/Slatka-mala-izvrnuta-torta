<div id="text1" style="position:absolute; overflow:hidden; left:654px; top:441px; width:351px; height:54px; z-index:21">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws36"><B><?php echo $torta['naziv']; ?></B></font></div>
</div></div>

<div id="image1" style="position:absolute; overflow:hidden; left:101px; top:433px; width:506px; height:522px; z-index:22">
<?php
	echo '<img src="'.base_url('images/'.$torta['img']).'"'
		. ' alt="'.$torta['naziv'].'" title="'.$torta['naziv'].'" border="0"'
		. ' width="506" height="522">';
?></div>

<form action="<?php echo site_url("torte/poruci/".$torta['id']); ?>">
<input type="submit" value="Poruci!" style="position:absolute;left:790px;top:889px;z-index:23">
</form>
<div id="text2" style="position:absolute; overflow:hidden; left:768px; top:536px; width:113px; height:32px; z-index:24">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Sastojci:</B></font></div>
</div></div>

<?php
// $torta: id, naziv, cena, tezina, oblik, tekst, img
?>
<div id="text3" style="position:absolute; overflow:hidden; left:683px; top:566px; width:308px; height:189px; z-index:25">
<div class="wpmd">
<?php
	$sastojci = explode("\n", $torta['tekst']);
	foreach($sastojci as $sast) {
		echo '<div><font color="#743F30" face="Narkisim" class="ws16"><B>'.$sast.'</B></font></div>';
	}
?>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:766px; top:793px; width:113px; height:32px; z-index:26">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Tezina:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:683px; top:827px; width:89px; height:27px; z-index:27">
<div class="wpmd">
<div><font color="#743F30" face="Narkisim" class="ws16"><B><?php echo '- '.$torta['tezina'].' g'; ?></B></font></div>
</div></div>
