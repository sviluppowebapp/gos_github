<?php
if (isset($_POST['submit'])) {

/* RECUPERO I DATI DAL FORM CLIENTE NOLEGGIO */
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$veicolo = filter_input(INPUT_POST, 'veicolo', FILTER_SANITIZE_STRING);
$targa = filter_input(INPUT_POST, 'targa', FILTER_SANITIZE_STRING);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_STRING);


if(isset($_POST['data_inizio'])){$data_inizio = mysqli_real_escape_string($mysqli, $_POST['data_inizio']);}else{$data_inizio ="";}
if(isset($_POST['data_fine'])){$data_fine = mysqli_real_escape_string($mysqli, $_POST['data_fine']);}else{$data_fine ="";}
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";}
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['gestore'])){$gestore = mysqli_real_escape_string($mysqli, $_POST['gestore']);}else{$gestore ="";}
if(isset($_POST['telefono'])){$telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);}else{$telefono ="";}
if(isset($_POST['email'])){$email = mysqli_real_escape_string($mysqli, $_POST['email']);}else{$email ="";}
if(isset($_POST['note'])){$note = mysqli_real_escape_string($mysqli, $_POST['note']);}else{$note ="";}


/* FILTRO LE ALTRE VARIABILI */
$data_inizio = trim(strip_tags(stripslashes($data_inizio)));
$data_fine = trim(strip_tags(stripslashes($data_fine)));
$cliente = trim(strip_tags(stripslashes(strtoupper($cliente))));
$veicolo = trim(strip_tags(stripslashes(strtoupper($veicolo))));
$gestore = trim(strip_tags(stripslashes(strtoupper($gestore))));
$telefono = trim(strip_tags(stripslashes($telefono)));
$email = trim(strip_tags(stripslashes(strtolower($email))));
$note = trim(strip_tags(stripslashes(strtoupper($note))));
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

/* QUERY DI INSERIMENTO SENZA UPPER, L'UPPER E' DEMANDATO AL COMANDO FOREACH */
$sq1 = "INSERT INTO scnoleggio (id_noleggio, societacliente, targa, modelloauto, utilizzatore, telefono, email, note, datainiziocontratto, datafinecontratto) VALUES (NULL, '$gestore', '$targa', '$veicolo', '$cliente', '$telefono', '$email','$note',STR_TO_DATE('$data_inizio', '%d/%m/%Y'),STR_TO_DATE('$data_fine', '%d/%m/%Y'))";


//INSERISCO TUTTO IN UNA VARIABILE CHE CHIAMO rs1
$rs1 = $mysqli->query($sq1);
var_dump ($sq1);
//exit;

if (!$rs1) {
echo "<p style='margin-top: 40px;text-align:center;'>Ho trovato un errore nell'esecuzione della <b>QUERY</b></p>";
die("Errore nella query $sq1: " . mysqli_error());

}else{

/* Redirect alla pagina principale */
$messaggio = "<div class='success'>Cliente Caricato Correttamente! Attendi..</div>";
echo "<meta http-equiv='refresh' content='2;url=index.php?page=home'>";

 }
}

?>

<?php echo $messaggio; ?>