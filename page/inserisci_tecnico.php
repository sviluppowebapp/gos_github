<?php

$today = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {
$n_tecnico = mysqli_real_escape_string($mysqli, strtoupper($_POST['n_tecnico']));

$sql = "INSERT INTO tecnico (id, n_tecnico, mod_date_tecnico) VALUES (NULL, '$n_tecnico', '$today')";
$res = $mysqli->query($sql);
$messaggio = "<div class='success'>Tenico inserito con successo. Attendi..</div>";
echo "<meta http-equiv='refresh' content='2;url=index.php?page=tecnici'>";

}

?>

<? echo $messaggio; ?>

<form class="form" method="post" action="">

<fieldset>
<legend>Registra Tenico</legend>
<table id="add">
<tr>
<td><b>Tecnico</b></td>
<td><input type="text" name="n_tecnico" placeholder="Cognome e Nome" required="required"></td>
</tr>
</table>
</fieldset>

<input type="submit" name="submit" class="bottone" value="Registra Tecnico">
<div class="clear"></div>
</form>