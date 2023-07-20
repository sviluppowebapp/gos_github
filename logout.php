<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['admin']);
unset($_SESSION['username']);
header("Location: login.php");
die();
?>