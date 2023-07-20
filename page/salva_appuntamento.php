<?php
function ClientIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/*
function ClientMOD() {
    $ipadd_mod = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipadd_mod = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipadd_mod = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipadd_mod = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipadd_mod = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipadd_mod = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipadd_mod = getenv('REMOTE_ADDR');
    else
        $ipadd_mod = 'UNKNOWN';
    return $ipadd_mod;
}
*/

if (isset($_POST['submit'])) {

/* RECUPERO I DATI DAL FORM INSERIMENTO COMMESSA */
$veicolo = filter_input(INPUT_POST, 'veicolo', FILTER_SANITIZE_STRING);
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
$tlav = filter_input(INPUT_POST, 'tlav', FILTER_SANITIZE_STRING);
$note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_STRING);


if(isset($_POST['data'])){$data = mysqli_real_escape_string($mysqli, $_POST['data']);}else{$data ="";}
if(isset($_POST['ora'])){$ora = mysqli_real_escape_string($mysqli, $_POST['ora']);}else{$ora ="";}
if(isset($_POST['gestore'])){$gestore = mysqli_real_escape_string($mysqli, $_POST['gestore']);}else{$gestore ="";}
if(isset($_POST['tipo_pren'])){$tipo_pren = mysqli_real_escape_string($mysqli, $_POST['tipo_pren']);}else{$tipo_pren ="";}
if(isset($_POST['stato_pren'])){$stato_pren = mysqli_real_escape_string($mysqli, $_POST['stato_pren']);}else{$stato_pren ="";}
if(isset($_POST['tipo_lavorazione'])){$tipo_lavorazione = mysqli_real_escape_string($mysqli, $_POST['tipo_lavorazione']);}else{$tipo_lavorazione ="";}
if(isset($_POST['tlav'])){$tlav = mysqli_real_escape_string($mysqli, $_POST['tlav']);}else{$tlav ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}
if(isset($_POST['note'])){$note = mysqli_real_escape_string($mysqli, $_POST['note']);}else{$note ="";} //mod del 15/07/2021
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";} //mod del 15/07/2021
if(isset($_POST['email'])){$email = mysqli_real_escape_string($mysqli, $_POST['email']);}else{$email ="";}


/* SETTO I MAIUSCOLI */
$veicolo = strtoupper($veicolo);
$cliente = strtoupper($cliente);
$targa = strtoupper($targa);
$note = strtoupper($note);


/*EVITO LA STAMPA DEL CARATTERE RN*/
//$note = trim(str_replace("\r\n",' ', $note));


/*CONSENTO ALL'UTENTE DI INSERIRE UN VEICOLO CON APOSTROFO ALLA FINE DEL NOME */

$cliente = trim(str_replace("\r\n",' ', $cliente)); //MODIFICA DEL 15/07/2021 
$veicolo = trim(str_replace("\r\n",' ', $veicolo)); //MODIFICA DEL 04/03/2021 
$note = trim(str_replace("\r\n",' ', $note)); //MODIFICA DEL 15/07/2021 
$note = nl2br($note);

/* FILTRO LE ALTRE VARIABILI */
$data = trim(strip_tags(stripslashes($data)));
$ora = trim(strip_tags(stripslashes($ora)));
$telefono = trim(strip_tags(stripslashes($telefono)));
$gestore = trim(strip_tags(stripslashes(strtoupper($gestore))));
$tipo_pren = trim(strip_tags(stripslashes(strtoupper($tipo_pren))));
$stato_pren = trim(strip_tags(stripslashes(strtoupper($stato_pren))));
$tipo_lavorazione = trim(strip_tags(stripslashes(strtoupper($tipo_lavorazione))));
$tlav = trim(strip_tags(stripslashes(strtoupper($tlav))));
$targa = trim(strip_tags(stripslashes(strtoupper($targa))));
//$veicolo = trim(strip_tags(stripslashes(strtoupper($veicolo)))); // NON DEVE ESSERE EFFETTUATO LO STRIPSLASHES ALTRIMENTI ANNULLA LO STR_REPLACE SULLO STESSO CAMPO EFFETTUATO RIGHE PRECEDENTI
$email = trim(strip_tags(stripslashes(strtoupper($email))));
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

$ipaddress = ClientIP();
$ipadd_mod = ClientIP();

/* QUERY DI INSERIMENTO SENZA UPPER, L'UPPER E' DEMANDATO AL COMANDO FOREACH */
$sq1 = "INSERT INTO appuntamenti (id_app, cliente, gestore, veicolo, targa, data, ora, tlav, stato_pren, tipo_pren, tipo_lavorazione, telefono, email, note, ipadd, ipadd_mod) VALUES (NULL, '$cliente', '$gestore', '$veicolo', '$targa', STR_TO_DATE('$data', '%d/%m/%Y'), '$ora', '$tlav', '$stato_pren', '$tipo_pren', '$tipo_lavorazione', '$telefono','$email', '$note', '$ipaddress', '$ipadd_mod')";

//INSERISCO TUTTO IN UNA VARIABILE CHE CHIAMO rs1
$rs1 = $mysqli->query($sq1);
//var_dump ($sq1);
//exit;

if (!$rs1) {
echo "<p style='margin-top: 40px;text-align:center;'>Ho trovato un errore nell'esecuzione della <b>QUERY</b></p>";
die("Errore nella query $sq1: " . mysqli_error());

}else{

/* Redirect alla pagina principale */
$messaggio = "<div class='success'>Appuntamento registrato con successo! Attendi..</div>";
echo "<meta http-equiv='refresh' content='2;url=index.php?page=lista_appuntamenti_oggi&tipo=tutti&data=oggi'>";

 }
}

?>

<?php echo $messaggio; ?>