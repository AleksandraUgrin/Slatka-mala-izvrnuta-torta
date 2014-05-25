

<?php
/*<div id="image1" style="position:absolute; overflow:hidden; left:141px; top:492px; width:169px; height:177px; z-index:21"><a href="<?php echo site_url("torte/rodjendanske"); ?>"><img src="/images/torta1.jpg" alt="" title="" border=0 width=169 height=177></a></div>*/
?>

<div id="shape1" style="position:absolute; overflow:hidden; left:92px; top:424px; width:946px; height:541px; z-index:22"><img border=0 width="100%" height="100%" alt="" src="/images/shape-1083588903.gif"></div>

<div id="text1" style="position:absolute; overflow:hidden; left:302px; top:438px; width:551px; height:54px; z-index:23">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws28"><B><?php echo $katnaziv; ?></B></font></div>
</div></div>

<?php
// Zbog stila pisanja stranica (position:absolute), za sada moraju ovakko
// da se ispisuju elementi - rucnim cuvanjem pozicija
$pozicije = array(
	'left:119px; top:492px; width:198px; height:207px;',
	'left:347px; top:492px; width:200px; height:209px;',
	'left:577px; top:491px; width:201px; height:210px;',
	'left:808px; top:492px; width:202px; height:210px;',
	'left:119px; top:731px; width:199px; height:207px;',
	'left:347px; top:731px; width:201px; height:208px;',
	'left:577px; top:732px; width:201px; height:208px;',
	'left:807px; top:733px; width:205px; height:207px;'
);

$c = count($torte);
for ($i=0; $i<$c; $i++) {
	if ($i == 8)
		break; // Trenutni dizajn nas ogranicava na 8 torti -.-
	
	$zi = 24 + $i;
	$idt = $torte[$i]['id'];
	$img = $torte[$i]['img'];
	$naz = $torte[$i]['naziv'];
	echo "<div id=\"slika$i\" style=\"position:absolute; overflow:hidden; {$pozicije[$i]} z-index:$zi\">"
		. "<a href=\"".site_url("torte/t/$idt")."\">"
		. "<img src=\"".base_url("images/$img")."\" alt=\"$naz\" title=\"$naz\" border=\"0\""
		. " width=\"100%\" height=\"100%\"></a></div>\n";
}
?>
