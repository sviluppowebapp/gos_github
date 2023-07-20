<?php

		include "../db_connection.php";

		$iditem = $_POST['iditem'];
		
		$cognome_mod = $_POST['cognome_mod'];
			$cognome_mod = addslashes($cognome_mod);
		$nome_mod = $_POST['nome_mod'];
			$nome_mod = addslashes($nome_mod);
		$telefono_mod = $_POST['telefono_mod'];
		$email_mod = $_POST['email_mod'];
		
			$query_string = "UPDATE contacts SET cognome= '".$cognome_mod."',nome = '".$nome_mod."',telefono = '".$telefono_mod."',email = '".$email_mod."'
			WHERE id='".$iditem."'";
		
			if ($mysqli->query($query_string)) 
				{ echo "ok";}
			else { echo 'ERRORE'; }
		/* close connection */
		$mysqli->close();

?>