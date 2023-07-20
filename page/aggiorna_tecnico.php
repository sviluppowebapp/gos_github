<?php

$id_tec='';
$n_tecnico='';
$messaggio='';

if(isset($_GET['id_tec'])) {
$id_tec = (int)$_GET['id_tec'];
$sql1 = "SELECT * FROM tecnico WHERE id_tec = '$id_tec'";
$res1 = $mysqli->query($sql1);
//var_dump($res1);
//exit;

while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
$id_tec = mysqli_real_escape_string($mysqli, $row['id_tec']);
$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);
}

if(isset($_POST['submit'])) {
if(isset($_POST['n_tecnico'])){$n_tecnico = mysqli_real_escape_string($mysqli, $_POST['n_tecnico']);}else{$n_tecnico ='';}

/* CONTROLLO SE CI SONO CAMPI VUOTI */
if ($n_tecnico == ''){
$messaggio = "<div class='error'>Attenzione, uno o pi&ugrave; campi non sono stati completati.</div>";

}else{

$sql2 = "UPDATE tecnico SET n_tecnico = '$n_tecnico' WHERE id_tec = '$id_tec'";
$res2 = $mysqli->query($sql2);
//var_dump($res2);
//exit;
$messaggio = "<div class='success'>Dettagli tecnico aggiornati con successo. Attendi..</div>";
echo "<meta http-equiv='refresh' content='2;url=index.php?page=tecnici'>";
 
  }
 }
}
?>





<form method="post" action="">
<fieldset>
<legend>Aggiorna Tenico</legend>
<table id="add">
<tr>
<td><b>Tecnico</b></td>
<td><input type="text" name="n_tecnico" value="<?= $n_tecnico; ?>" ></td>
</tr>
</table>
</fieldset>

<input type="submit" name="submit" class="bottone" value="Aggiorna Tecnico">
<div class="clear"></div>
</form>