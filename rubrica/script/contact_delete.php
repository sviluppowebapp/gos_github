<?php

		include "../db_connection.php";

		$id = $_POST['id_contact'];

			$query_string2 = "DELETE FROM contacts WHERE id='".$id."'";
			$mysqli->query($query_string2);
			
		/* close connection */
		$mysqli->close();

?>