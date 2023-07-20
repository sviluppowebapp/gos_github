<?php

$host = '127.0.0.1';
$user = 'root';
$pass = 'admin';
$db = 'iykqltua_sviluppo';


$mysqli = new mysqli("$host", "$user", "$pass", "$db");
$data = $_REQUEST['notes'];
$array = json_decode($data, true);
for($i=0;$i<count($array);$i++){
$targa = $array[$i]['targa'];
$nota = $array[$i]['nota'];
$query=mysqli_query($mysqli, "UPDATE commesse SET noterev='$nota' WHERE targa='$targa'");
}
echo "ok";
?>
