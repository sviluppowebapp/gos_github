<?php

if (isset($_GET['id_preventivo'])) {
$id_preventivo = (int)$_GET['id_preventivo'];

/* Elimino i dati del preventivo inserito */
$sq1 = "DELETE FROM preventivi WHERE id_preventivo = '$id_preventivo'";
$rs1 = $mysqli->query($sq1);

	if($rs1)
	{
		$messaggio = "<div class='success'>Preventivo cancellato correttamente! Attendi..</div>";
		echo "<meta http-equiv='refresh' content='5;url=index.php?page=home'>";
	}else{
		echo $mysqli->error;
	}

}
?>

<?php echo $messaggio; ?>