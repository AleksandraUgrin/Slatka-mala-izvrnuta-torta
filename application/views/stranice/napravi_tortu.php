<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/torta.js"></script>

<div id="text1" style="position:absolute; overflow:hidden; left:198px; top:505px; width:113px; height:32px; z-index:21">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Voce:</B></font></div>
</div></div>

<div id="text2" style="position:absolute; overflow:hidden; left:195px; top:606px; width:119px; height:32px; z-index:22">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Kremovi:</B></font></div>
</div></div>

<div id="text3" style="position:absolute; overflow:hidden; left:193px; top:659px; width:119px; height:32px; z-index:23">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Slagovi:</B></font></div>
</div></div>

<div id="text4" style="position:absolute; overflow:hidden; left:165px; top:707px; width:179px; height:32px; z-index:24">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Keks / kore:</B></font></div>
</div></div>

<div id="text5" style="position:absolute; overflow:hidden; left:156px; top:758px; width:195px; height:59px; z-index:25">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Poseban zeljeni oblik torte?</B></font></div>
</div></div>

<div id="text6" style="position:absolute; overflow:hidden; left:143px; top:835px; width:232px; height:32px; z-index:26">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Zeljena tezina (g):</B></font></div>
</div></div>

<div id="text7" style="position:absolute; overflow:hidden; left:143px; top:554px; width:232px; height:32px; z-index:28">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws22"><B>Kostunjavo voce:</B></font></div>
</div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:455px; top:660px; width:39px; height:32px; z-index:33">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws14"><B>Da</B></font></div>
</div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:568px; top:660px; width:39px; height:32px; z-index:34">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws14"><B>Ne</B></font></div>
</div></div>

<form name="pravitortu" action="<?php echo site_url("torte/napravi"); /* torte/poruci */ ?>" method="POST">

<select name="voce" style="position:absolute;left:442px;top:504px;width:200px;z-index:27">
<option value="0">/</option>
<option value="1">jagode</option>
<option value="2">maline</option>
<option value="3">kupine</option>
<option value="4">borovnice</option>
<option value="5">banane</option>
<option value="6">breskve</option>
<option value="7">jabuke</option>
<option value="8">kruske</option>
<option value="9">pomorandze</option>
<option value="10">ananas</option>
<option value="11">kajsije</option>
<option value="12">grozdje</option>
<option value="13">mango</option>
<option value="14">sljive</option>
<option value="15">mandarine</option>
<option value="16">limun</option>
</select>

<select name="kostunjavo" style="position:absolute;left:441px;top:554px;width:200px;z-index:29">
<option value="0">/</option>
<option value="1">orasi</option>
<option value="2">lesnik</option>
<option value="3">kikiriki</option>
<option value="4">kokos</option>
<option value="5">badem</option>
<option value="6">suvo grozdje</option>
</select>

<select name="krem" style="position:absolute;left:441px;top:606px;width:200px;z-index:30">
<option value="0">nijedan</option>
<option value="1">krem od vanile</option>
<option value="2">krem od cokolade</option>
<option value="3">krem od karamele</option>
<option value="4">krem od jagode</option>
<option value="5">krem od narandze</option>
<option value="6">krem od sumskog voca</option>
<option value="7">kakao krem</option>
<option value="8">kafa krem</option>
</select>
<div id="slagovida" style="position:absolute; left:439px; top:658px; z-index:31"><input type="radio" name="slagovi" value="Da" checked></div>
<div id="slagovine" style="position:absolute; left:552px; top:657px; z-index:32"><input type="radio" name="slagovi" value="Ne"></div>

<select name="keks" style="position:absolute;left:440px;top:709px;width:200px;z-index:35">
<option value="0">/</option>
<option value="1">jafa keks</option>
<option value="2">plazma keks</option>
<option value="3">napolitanke sa limunom</option>
<option value="4">napolitanke sa cokoladom</option>
<option value="5">napolitanke sa kafom</option>
<option value="6">cookies cokoladni keks</option>
<option value="7">obicne kore</option>
</select>
<input name="oblik" type="text" style="position:absolute;width:200px;left:439px;top:774px;z-index:36">
<input name="tezina" type="text" style="position:absolute;width:200px;left:439px;top:835px;z-index:37">

<input name="submit" type="submit" value="Poruci!" style="position:absolute;left:506px;top:898px;z-index:40"
	onclick="porucinovu('pravitortu'); return false;">
</form>

<div id="image1" style="position:absolute; overflow:hidden; left:672px; top:495px; width:347px; height:384px; z-index:38"><img src="/images/azdaja.png" alt="" title="" border=0 width=347 height=384></div>

<div id="text10" style="position:absolute; overflow:hidden; left:325px; top:433px; width:490px; height:54px; z-index:39">
<div class="wpmd">
<div align=center><font color="#743F30" face="Narkisim" class="ws36"><B>Napravi svoju tortu!</B></font></div>
</div></div>

