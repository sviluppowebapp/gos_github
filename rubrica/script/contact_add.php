<?php 
		include "../db_connection.php";

		$cognome = $_POST['cognome'];
			$cognome = addslashes($cognome);
		$nome = $_POST['nome'];
			$nome = addslashes($nome);
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];

		$query_string = "INSERT INTO contacts(cognome,nome,telefono,email)
		VALUES ('$cognome','$nome','$telefono','$email')";
		
		$mysqli->query($query_string);
		$id_contact = $mysqli->insert_id;
				
		echo $id_contact;								

		/* close connection */
		$mysqli->close();

?>