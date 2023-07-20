<?php 
		include "../db_connection.php";

		$k = 0;
		
		while($k < 100){
		$cognome = 'Demo Cognome '.$k;
		$nome = 'Demo nome '.$k;
		$telefono = rand(10000000,90000000);
		$email = $cognome.'@demo.it';

		$query_string = "INSERT INTO contacts(cognome,nome,telefono,email)
		VALUES ('$cognome','$nome','$telefono','$email')";
		$mysqli->query($query_string);
			$k++;
		}								

		/* close connection */
		$mysqli->close();

?>