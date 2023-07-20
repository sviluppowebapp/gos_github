<?php
$mysqli = new mysqli('127.0.0.1', 'root', 'admin', 'iykqltua_rubrica');
		if ($mysqli->connect_error) {
    		die('Errore di connessione (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		} else {
		}
?>