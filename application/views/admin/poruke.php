<table align="center" width="800" border="2" cellspacing="3" cellpadding="2">
  <tr>
    <th style="text-align: center" width="200" scope="col">E-mail</th>
	<th style="text-align: center" width="200" scope="col">Lični podaci</th>
	<th style="text-align: center" width="160" scope="col">Datum prijema</th>
	<th style="text-align: center" width="240" scope="col">Naslov poruke</th>
  </tr>
  <?php
	if (empty($poruke)) {
		echo '<tr><td align="center" colspan="4">Nije primljena nijedna poruka.</td></tr>';
	}
	foreach ($poruke as $por) {
		$mejl = htmlspecialchars(urlencode($por['email']));
		if (!empty($por['naslov'])) {
			$naslov = htmlspecialchars(urlencode($por['naslov']));
			$link = "mailto:$mejl?subject=Re:%20$naslov";
		}
		else
			$link = "mailto:$mejl?subject=Odgovor%20na%20Vasu%20poruku";
  ?>
  <tr>
    <td><?php echo "<a href=\"$link\">".htmlspecialchars($por['email'])."</a>"; ?></td>
	<td><?php echo htmlspecialchars($por['licnipod']); ?></td>
	<td><?php echo date("j.n.Y. G:i", $por['datum']); ?></td>
	<td><?php echo htmlspecialchars($por['naslov']); ?></td>
  </tr>
  <tr>
	<td colspan="4" class="tekstporuke"><?php echo nl2br(htmlspecialchars($por['tekst'])); ?></td>
  </tr>
  <?php
	}
  ?>
</table>
