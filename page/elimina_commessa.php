<?php

if(isset($_GET['id_com'])) {
$id_com = (int)$_GET['id_com'];

if($id_com){
				
				$avviso = 	"<div class='info'>Gentile utente, se desideri cancellare questa commessa<br>comunica al tuo referente l'id: <b>$id_com</b>
							<a href='index.php?page=home'><br>Ritorna alla Home</a></div>";		
					
					echo $avviso;

/* Elimino i dati del preventivo inserito */
/*
$sq1 = "DELETE FROM commesse WHERE id_com = '$id_com'";
$rs1 = $mysqli->query($sq1);

	if($rs1)
	{
		$messaggio = "<div class='success'>Commessa cancellata correttamente! Attendi..</div>";
		echo "<meta http-equiv='refresh' content='5;url=index.php?page=home'>";
*/	
		
	}else{
		/*
		echo $mysqli->error;
		*/
		exit;
	}

}
?>
