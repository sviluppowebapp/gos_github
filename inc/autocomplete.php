<?php

include('db.php'); 

$q = $_GET['q'];
$my_data = mysqli_real_escape_string($mysqli, $q);

$sq = "SELECT * FROM timbri WHERE dipendente LIKE '%$my_data%' ORDER BY id ASC LIMIT 1";
$result = $mysqli->query($sq);
	
if ($result) {

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

$dipendente = mysqli_real_escape_string($mysqli, $row['dipendente']);

echo $dipendente."\n";

 }
}

?>