<?php

$toDay = date('d-m-Y');

$dbhost = "localhost";
$dbuser = "mygestoff";
$dbpass = "begrafembi73";
$dbname = "my_mygestoff";

exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname > /backup/".$toDay."_DB.sql");

?>

