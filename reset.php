<?php

include('inc/db.php');

/* Protezione da SQL injection con mysqli_real_escape_string*/
if(isset($_POST['email'])){
	$email = mysqli_real_escape_string($mysqli,$_POST['email']);
}else{
	$email="";
}
if (isset($_POST['risultato'])){
	$risultato = mysqli_real_escape_string($mysqli, $_POST['risultato']);
}else{
	$risultato = '';
}

$to      = "$email";
$ip      = "$_SERVER[REMOTE_ADDR]";
$data	 = '';
$data   .= "Data: ".date('d/m/Y');
$subject = "Recupero Password Gestionale";
$sender  = "amministrazione@pugliannunci.it";

$headers  = "From: $sender\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "X-Mailer: PHP " . phpversion();

$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
$headers .= "Content-Transfer-Encoding: 8bit\n\n";


if (isset($_POST['submit'])) {

/* CONTROLLO IL CAMPO EMAIL */
if (!eregi("^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})", $email)){
$messaggio = "Attenzione, l'indirizzo E-mail non � corretto!";

}else{

/* CONTROLLO IL CAMPO ANTISPAM */
if ($risultato != 10) {
$messaggio = "Attenzione, il risultato dell'operazione 6+4 non � corretto!";

}else{

/* CERCO LA MAIL NEL DATABASE */
$sql1 = "select * FROM admin WHERE email = '$email'";
$res1 = $mysqli->query($sql1);
$count = mysqli_num_rows($res1);

while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
/* Prelevo l'identificativo dell'utente */
$username = mysqli_real_escape_string($mysqli, $row['username']);
}

if ($count == 0) {
$messaggio = "Attenzione, nel database non � presente l'indirizzo E-mail indicato!";

}else{

/* GENERO UNA PASSWORD CASUALE */
$lunghezza_pass = 8;

for ($i=1; $i<=$lunghezza_pass; $i++) {
if ($i % 2) {
$pass_generata = $pass_generata . chr(rand(97,122));

}else{

$pass_generata = $pass_generata . rand(0,9);

 }
}

$newpass = "$pass_generata";
$body    = "$subject \n\n";
$body   .= "Username: $username \n\nNuova Password: $newpass";

/* AGGIORNO LA NUOVA PASSWORD NEL DATABASE */
$sql2 = "UPDATE admin SET password = SHA1('$newpass') WHERE email = '$email'";
$res2 = $mysqli->query($sql2);
mail ($to, $subject, $body, $headers);
$messaggio = "La nuova Password � stata inviata al tuo indirizzo E-mail!";
echo "<meta http-equiv=\"refresh\" content=\"3;url=login.php\">";

    }
   }
  }
 }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>

<!-- ... INIZIO METATAG ... -->
<title>CMS GESTIONALE 2016 v. 1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="Content-Language" content="it" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />
<meta name="application-name" content="CMS GESTIONALE" />
<meta name="author" content="unixone.it" />
<!-- ... FINE METATAG ... -->

<!-- ... INIZIO INCLUSIONE CSS ... -->
<link rel="icon" type="image/png" href="images/favicon.png" />
<link rel="stylesheet" href="css/form.css" media="screen" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<!-- ... FINE INCLUSIONE CSS ... -->
</head>

<body>

<div class="wrapper">

<div class="content">

<?php $messaggio='' ?>
<?php echo "<p class='messaggio'>$messaggio</p>"; ?>

<div class="login-block">
<h1>RECUPERA PASSWORD</h1>
<p>Per generare una nuova pasword di accesso, inserisci l'indirizzo e-mail che hai fornito in fase di configurazione.</p>
<form action="" method="post">
<input type="text" name="email" placeholder="E-mail" id="username" />
<input type="text" name="risultato" placeholder="Quanto fa 6+4?" maxlength="2" id="password" />
<input type="submit" name="submit" class="bottone" value="Recupera" id=submit" />
</form>
</div>

</div>
<!-- ... END CONTENT ... -->

</div>
<!-- ... END WRAPPER ... -->

</body>
</html>
