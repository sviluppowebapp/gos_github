<?php
session_start();
ob_start();
require('fpdf/fpdf.php');
define('€',chr(128));
include('inc/db.php');

if (isset($_GET['id_preventivo'])) {
$id_preventivo = (int)$_GET['id_preventivo'];
//var_dump($id_preventivo);
//exit;

$sq1 = "SELECT * FROM preventivi WHERE id_preventivo = '$id_preventivo'";
$rs1 = $mysqli->query($sq1);

while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
$cliente = mysqli_real_escape_string($mysqli, strtoupper($row['cliente']));
$email = mysqli_real_escape_string($mysqli, strtoupper($row['email']));
$data = mysqli_real_escape_string($mysqli, $row['data']);
$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$veicolo = mysqli_real_escape_string($mysqli, strtoupper($row['veicolo']));
$tel = mysqli_real_escape_string($mysqli, strtoupper($row['tel']));
$targa = mysqli_real_escape_string($mysqli, strtoupper($row['targa']));
$km = mysqli_real_escape_string($mysqli, strtoupper($row['km']));
$n_accettatore = mysqli_real_escape_string($mysqli, strtoupper($row['n_accettatore']));
$allegato = mysqli_real_escape_string($mysqli, strtoupper($row['allegato']));
$totale = mysqli_real_escape_string($mysqli, $row['totale']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$email= trim(strip_tags(stripslashes($email)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$n_accettatore = trim(strip_tags(stripslashes($n_accettatore)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

/*INTERVENTI*/
$itr1 = mysqli_real_escape_string($mysqli, strtoupper($row['itr1']));
$itr2 = mysqli_real_escape_string($mysqli, strtoupper($row['itr2']));
$itr3 = mysqli_real_escape_string($mysqli, strtoupper($row['itr3']));
$itr4 = mysqli_real_escape_string($mysqli, strtoupper($row['itr4']));
$itr5 = mysqli_real_escape_string($mysqli, strtoupper($row['itr5']));
$itr6 = mysqli_real_escape_string($mysqli, strtoupper($row['itr6']));
$itr7 = mysqli_real_escape_string($mysqli, strtoupper($row['itr7']));
$itr8 = mysqli_real_escape_string($mysqli, strtoupper($row['itr8']));
$itr9 = mysqli_real_escape_string($mysqli, strtoupper($row['itr9']));
$itr10 = mysqli_real_escape_string($mysqli, strtoupper($row['itr10']));
$itr11 = mysqli_real_escape_string($mysqli, strtoupper($row['itr11']));
$itr12 = mysqli_real_escape_string($mysqli, strtoupper($row['itr12']));
$itr13 = mysqli_real_escape_string($mysqli, strtoupper($row['itr13']));
$itr14 = mysqli_real_escape_string($mysqli, strtoupper($row['itr14']));
$itr15 = mysqli_real_escape_string($mysqli, strtoupper($row['itr15']));

/*FORNITORI*/
$for1 = mysqli_real_escape_string($mysqli, strtoupper($row['for1']));
$for2 = mysqli_real_escape_string($mysqli, strtoupper($row['for2']));
$for3 = mysqli_real_escape_string($mysqli, strtoupper($row['for3']));
$for4 = mysqli_real_escape_string($mysqli, strtoupper($row['for4']));
$for5 = mysqli_real_escape_string($mysqli, strtoupper($row['for5']));
$for6 = mysqli_real_escape_string($mysqli, strtoupper($row['for6']));
$for7 = mysqli_real_escape_string($mysqli, strtoupper($row['for7']));
$for8 = mysqli_real_escape_string($mysqli, strtoupper($row['for8']));
$for9 = mysqli_real_escape_string($mysqli, strtoupper($row['for9']));
$for10 = mysqli_real_escape_string($mysqli, strtoupper($row['for10']));
$for11 = mysqli_real_escape_string($mysqli, strtoupper($row['for11']));
$for12 = mysqli_real_escape_string($mysqli, strtoupper($row['for12']));
$for13 = mysqli_real_escape_string($mysqli, strtoupper($row['for13']));
$for14 = mysqli_real_escape_string($mysqli, strtoupper($row['for14']));
$for15 = mysqli_real_escape_string($mysqli, strtoupper($row['for15']));

$itr1 = trim(strip_tags(stripslashes($itr1)));
$itr2 = trim(strip_tags(stripslashes($itr2)));
$itr3 = trim(strip_tags(stripslashes($itr3)));
$itr4 = trim(strip_tags(stripslashes($itr4)));
$itr5 = trim(strip_tags(stripslashes($itr5)));
$itr6 = trim(strip_tags(stripslashes($itr6)));
$itr7 = trim(strip_tags(stripslashes($itr7)));
$itr8 = trim(strip_tags(stripslashes($itr8)));
$itr9 = trim(strip_tags(stripslashes($itr9)));
$itr10 = trim(strip_tags(stripslashes($itr10)));
$itr11 = trim(strip_tags(stripslashes($itr11)));
$itr12 = trim(strip_tags(stripslashes($itr12)));
$itr13 = trim(strip_tags(stripslashes($itr13)));
$itr14 = trim(strip_tags(stripslashes($itr14)));
$itr15 = trim(strip_tags(stripslashes($itr15)));

$for1 = trim(strip_tags(stripslashes($for1)));
$for2 = trim(strip_tags(stripslashes($for2)));
$for3 = trim(strip_tags(stripslashes($for3)));
$for4 = trim(strip_tags(stripslashes($for4)));
$for5 = trim(strip_tags(stripslashes($for5)));
$for6 = trim(strip_tags(stripslashes($for6)));
$for7 = trim(strip_tags(stripslashes($for7)));
$for8 = trim(strip_tags(stripslashes($for8)));
$for9 = trim(strip_tags(stripslashes($for9)));
$for10 = trim(strip_tags(stripslashes($for10)));
$for11 = trim(strip_tags(stripslashes($for11)));
$for12 = trim(strip_tags(stripslashes($for12)));
$for13 = trim(strip_tags(stripslashes($for13)));
$for14 = trim(strip_tags(stripslashes($for14)));
$for15 = trim(strip_tags(stripslashes($for15)));

$q1 = mysqli_real_escape_string($mysqli, $row['q1']);
$q2 = mysqli_real_escape_string($mysqli, $row['q2']);
$q3 = mysqli_real_escape_string($mysqli, $row['q3']);
$q4 = mysqli_real_escape_string($mysqli, $row['q4']);
$q5 = mysqli_real_escape_string($mysqli, $row['q5']);
$q6 = mysqli_real_escape_string($mysqli, $row['q6']);
$q7 = mysqli_real_escape_string($mysqli, $row['q7']);
$q8 = mysqli_real_escape_string($mysqli, $row['q8']);
$q9 = mysqli_real_escape_string($mysqli, $row['q9']);
$q10 = mysqli_real_escape_string($mysqli, $row['q10']);
$q11 = mysqli_real_escape_string($mysqli, $row['q11']);
$q12 = mysqli_real_escape_string($mysqli, $row['q12']);
$q13 = mysqli_real_escape_string($mysqli, $row['q13']);
$q14 = mysqli_real_escape_string($mysqli, $row['q14']);
$q15 = mysqli_real_escape_string($mysqli, $row['q15']);

$iu1 = mysqli_real_escape_string($mysqli, $row['iu1']);
$iu2 = mysqli_real_escape_string($mysqli, $row['iu2']);
$iu3 = mysqli_real_escape_string($mysqli, $row['iu3']);
$iu4 = mysqli_real_escape_string($mysqli, $row['iu4']);
$iu5 = mysqli_real_escape_string($mysqli, $row['iu5']);
$iu6 = mysqli_real_escape_string($mysqli, $row['iu6']);
$iu7 = mysqli_real_escape_string($mysqli, $row['iu7']);
$iu8 = mysqli_real_escape_string($mysqli, $row['iu8']);
$iu9 = mysqli_real_escape_string($mysqli, $row['iu9']);
$iu10 = mysqli_real_escape_string($mysqli, $row['iu10']);
$iu11 = mysqli_real_escape_string($mysqli, $row['iu11']);
$iu12 = mysqli_real_escape_string($mysqli, $row['iu12']);
$iu13 = mysqli_real_escape_string($mysqli, $row['iu13']);
$iu14 = mysqli_real_escape_string($mysqli, $row['iu14']);
$iu15 = mysqli_real_escape_string($mysqli, $row['iu15']);

$sc1 = mysqli_real_escape_string($mysqli, $row['sc1']);
$sc2 = mysqli_real_escape_string($mysqli, $row['sc2']);
$sc3 = mysqli_real_escape_string($mysqli, $row['sc3']);
$sc4 = mysqli_real_escape_string($mysqli, $row['sc4']);
$sc5 = mysqli_real_escape_string($mysqli, $row['sc5']);
$sc6 = mysqli_real_escape_string($mysqli, $row['sc6']);
$sc7 = mysqli_real_escape_string($mysqli, $row['sc7']);
$sc8 = mysqli_real_escape_string($mysqli, $row['sc8']);
$sc9 = mysqli_real_escape_string($mysqli, $row['sc9']);
$sc10 = mysqli_real_escape_string($mysqli, $row['sc10']);
$sc11 = mysqli_real_escape_string($mysqli, $row['sc11']);
$sc12 = mysqli_real_escape_string($mysqli, $row['sc12']);
$sc13 = mysqli_real_escape_string($mysqli, $row['sc13']);
$sc14 = mysqli_real_escape_string($mysqli, $row['sc14']);
$sc15 = mysqli_real_escape_string($mysqli, $row['sc15']);

$imp_1 = mysqli_real_escape_string($mysqli, $row['imp_1']);
$imp_2 = mysqli_real_escape_string($mysqli, $row['imp_2']);
$imp_3 = mysqli_real_escape_string($mysqli, $row['imp_3']);
$imp_4 = mysqli_real_escape_string($mysqli, $row['imp_4']);
$imp_5 = mysqli_real_escape_string($mysqli, $row['imp_5']);
$imp_6 = mysqli_real_escape_string($mysqli, $row['imp_6']);
$imp_7 = mysqli_real_escape_string($mysqli, $row['imp_7']);
$imp_8 = mysqli_real_escape_string($mysqli, $row['imp_8']);
$imp_9 = mysqli_real_escape_string($mysqli, $row['imp_9']);
$imp_10 = mysqli_real_escape_string($mysqli, $row['imp_10']);
$imp_11 = mysqli_real_escape_string($mysqli, $row['imp_11']);
$imp_12 = mysqli_real_escape_string($mysqli, $row['imp_12']);
$imp_13 = mysqli_real_escape_string($mysqli, $row['imp_13']);
$imp_14 = mysqli_real_escape_string($mysqli, $row['imp_14']);
$imp_15 = mysqli_real_escape_string($mysqli, $row['imp_15']);

 }
}


/*
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('fpdf/logo.jpg',20,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,10,'Nome Officina',0,1,'C');
	$this->Cell(282,5,'Via Rossi, 7/9',0,1,'C');
	$this->Ln(3);
	$this->Cell(302,5,'Cap - Citta (SA)',0,1,'C');
	$this->Ln(3);
	$this->Cell(279,5,'Tel/Fax telefonoOfficina',0,1,'C');
	$this->Ln(3);
	$this->Cell(298,5,'https://www.mysites.com',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Officina Ringrazia per la preferenza accordata',0,0,'C');
}
}
*/


// crea l'istanza del documento se attivo l'header devo modificarlo in $p = new pdf();
$p = new fpdf();


//setto i margini sinistro, superiore e destro
$margine_sx=10;
$margine_top=15;
$margine_dx=10;
$p->SetMargins($margine_sx, $margine_top, $margine_dx);
// inizializza il documento
$p->Open();


// aggiunge una pagina
$p->AddPage();

// Impostare le caratteristiche del carattere
$p->SetTextColor(0); 
$p->SetFont('Arial', '', 10);

$p->SetFont('Arial','B',14);
$p->Cell(185, 10, 'PREVENTIVO DEL ' .$data. ' PER VEICOLO ' .$targa.'' ,1,1,'C');
$p->Ln(3);

// Creo le celle Anagrafica

$p->SetFont('Arial', '', 10);
$p->Cell(100, 5, ' Veicolo : '.$veicolo.'',0);
$p->Cell(80, 5, 'Targa : '.$targa.'',0,1);
$p->Ln(3);
$p->Cell(100, 5, ' Km al preventivo : '.$km.'',0);
$p->Cell(80, 5, 'Telefono : '.$tel.'',0,1);
$p->Ln(3);
$p->Cell(100, 5, ' Cliente : '.$cliente.'',0);
$p->Cell(80, 5, 'Email : '.$email.'',0,1);
$p->Ln(13);

$p->SetFont('Arial','B',14);
$p->Cell(185, 10, 'Interventi Veicolo' ,1,1,'C');
$p->SetFont('courier','B',10);
$p->Cell(105, 7, '** Descrizione' ,'1',0);
$p->Cell(14, 7,'Q.ta',1,'C');
$p->Cell(30, 7, 'Imp. Unitario' ,1,'C');
$p->Cell(20, 7, 'Sconto' ,1,'C');
$p->Cell(16, 7, 'Totale' ,1,'C');
$p->Ln(10);

if ($itr1 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr1.'',0);
$p->Cell(14, 5, ''.$q1.'',0);
$p->Cell(30, 5, ''.$iu1.'',0);
$p->Cell(20, 5, ''.$sc1.'%',0);
$p->Cell(16, 5, ''.$imp_1.'',0,1,'C');
$p->Ln(3);
}

if ($itr2 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr2.'',0);
$p->Cell(14, 5, ''.$q2.'',0);
$p->Cell(30, 5, ''.$iu2.'',0);
$p->Cell(20, 5, ''.$sc2.'%',0);
$p->Cell(16, 5, ''.$imp_2.'',0,1,'C');
$p->Ln(3);
}

if ($itr3 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr3.'',0);
$p->Cell(14, 5, ''.$q3.'',0);
$p->Cell(30, 5, ''.$iu3.'',0);
$p->Cell(20, 5, ''.$sc3.'%',0);
$p->Cell(16, 5, ''.$imp_3.'',0,1,'C');
$p->Ln(3);
}

if ($itr4 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr4.'',0);
$p->Cell(14, 5, ''.$q4.'',0);
$p->Cell(30, 5, ''.$iu4.'',0);
$p->Cell(20, 5, ''.$sc4.'%',0);
$p->Cell(16, 5, ''.$imp_4.'',0,1,'C');
$p->Ln(3);
}

if ($itr5 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr5.'',0);
$p->Cell(14, 5, ''.$q5.'',0);
$p->Cell(30, 5, ''.$iu5.'',0);
$p->Cell(20, 5, ''.$sc5.'%',0);
$p->Cell(16, 5, ''.$imp_5.'',0,1,'C');
$p->Ln(3);
}

if ($itr6 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr6.'',0);
$p->Cell(14, 5, ''.$q6.'',0);
$p->Cell(30, 5, ''.$iu6.'',0);
$p->Cell(20, 5, ''.$sc6.'%',0);
$p->Cell(16, 5, ''.$imp_6.'',0,1,'C');
$p->Ln(3);
}

if ($itr7 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr7.'',0);
$p->Cell(14, 5, ''.$q7.'',0);
$p->Cell(30, 5, ''.$iu7.'',0);
$p->Cell(20, 5, ''.$sc7.'%',0);
$p->Cell(16, 5, ''.$imp_7.'',0,1,'C');
$p->Ln(3);
}

if ($itr8 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr8.'',0);
$p->Cell(14, 5, ''.$q8.'',0);
$p->Cell(30, 5, ''.$iu8.'',0);
$p->Cell(20, 5, ''.$sc8.'%',0);
$p->Cell(16, 5, ''.$imp_8.'',0,1,'C');
$p->Ln(3);
}

if ($itr9 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr9.'',0);
$p->Cell(14, 5, ''.$q9.'',0);
$p->Cell(30, 5, ''.$iu9.'',0);
$p->Cell(20, 5, ''.$sc9.'%',0);
$p->Cell(16, 5, ''.$imp_9.'',0,1,'C');
$p->Ln(3);
}

if ($itr10 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr10.'',0);
$p->Cell(14, 5, ''.$q10.'',0);
$p->Cell(30, 5, ''.$iu10.'',0);
$p->Cell(20, 5, ''.$sc10.'%',0);
$p->Cell(16, 5, ''.$imp_10.'',0,1,'C');
$p->Ln(3);
}

if ($itr11 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr11.'',0);
$p->Cell(14, 5, ''.$q11.'',0);
$p->Cell(30, 5, ''.$iu11.'',0);
$p->Cell(20, 5, ''.$sc11.'%',0);
$p->Cell(16, 5, ''.$imp_11.'',0,1,'C');
$p->Ln(3);
}

if ($itr12 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr12.'',0);
$p->Cell(14, 5, ''.$q12.'',0);
$p->Cell(30, 5, ''.$iu12.'',0);
$p->Cell(20, 5, ''.$sc12.'%',0);
$p->Cell(16, 5, ''.$imp_12.'',0,1,'C');
$p->Ln(3);
}

if ($itr13 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr13.'',0);
$p->Cell(14, 5, ''.$q13.'',0);
$p->Cell(30, 5, ''.$iu13.'',0);
$p->Cell(20, 5, ''.$sc13.'%',0);
$p->Cell(16, 5, ''.$imp_13.'',0,1,'C');
$p->Ln(3);
}

if ($itr14 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr14.'',0);
$p->Cell(14, 5, ''.$q14.'',0);
$p->Cell(30, 5, ''.$iu14.'',0);
$p->Cell(20, 5, ''.$sc14.'%',0);
$p->Cell(16, 5, ''.$imp_14.'',0,1,'C');
$p->Ln(3);
}

if ($itr15 == ''){
$p->Cell(105, 5, '',0);
$p->Cell(14, 5, '',0);
$p->Cell(30, 5, '',0);
$p->Cell(20, 5, '',0);
$p->Cell(16, 5, '',0,1,'C');
$p->Ln(3);
}else{
$p->Cell(105, 5, ''.$itr15.'',0);
$p->Cell(14, 5, ''.$q15.'',0);
$p->Cell(30, 5, ''.$iu15.'',0);
$p->Cell(20, 5, ''.$sc15.'%',0);
$p->Cell(16, 5, ''.$imp_15.'',0,1,'C');
$p->Ln(3);
}

$p->Ln(43);
$p->Cell(121, 5, 'Data '.$data.'',0);
$p->Cell(0, 5, ' Importo Preventivo = € '.$totale.'',0,1);


// Creo le linee per contenere data e totale
// 10 indica la distanza dal bordo sx 
// 250 indica la distanza dall'asse y quindi dalla parte alta del foglio a4
// 195 indica la larghezza della linea
// 250 indica la partenza dal punto 0 dell'asse cartesiano 

$p->Line(10,245,195,245);
$p->Line(10,250,195,250);

// Creo le linee verticali tabella | 215 definisce la lunghezza
$p->Line(10,72,10,250);
$p->Line(115,72,115,245);
$p->Line(129,72,129,245);
$p->Line(159,72,159,245);
$p->Line(179,72,179,245);
$p->Line(195,72,195,250);


// Lascio un messaggio all'utente
$p->Cell(0,20,'La ringraziamo per aver scelto la nostra struttura',0,1,'C');
$p->Cell(0,0,'Il presente preventivo ha validità 7 giorni a partire dal ' .$data.'',0,0,'C');

// Senza parametri rende il file al browser
$p->output(); 

?>