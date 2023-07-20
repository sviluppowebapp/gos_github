<?php
$mysqli = new mysqli('host', 'user', 'pwd', 'nome_db');
		if ($mysqli->connect_error) {
    		die('Errore di connessione (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		} else {
		}
?>