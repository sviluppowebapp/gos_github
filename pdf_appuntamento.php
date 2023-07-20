<?php
session_start();
ob_start();
require('fpdf/fpdf.php');
define('€',chr(128));
include('inc/db.php');

/* DEFINISCO DUE VARIABILI PER RICHIAMARE LA DATA E L'ORA DI STAMPA ALLA FINE DEL DOCUMENTO*/
date_default_timezone_set('Europe/Rome'); //definisco il timezone per l'italia
$data_stampa = date("d/m/Y"); //gg/mm/aaaa
$ora_stampa = date("H:i:s"); //hh:mm


if (isset($_GET['id_app'])) {
$id_app = (int)$_GET['id_app'];
$sql1 = "SELECT * FROM appuntamenti WHERE id_app = '$id_app'";
$res1 = $mysqli->query($sql1);

while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
$id_app = mysqli_real_escape_string($mysqli, $row['id_app']);
$cliente = mysqli_real_escape_string($mysqli, strtoupper($row['cliente']));
$data = mysqli_real_escape_string($mysqli, $row['data']);
$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$gestore = mysqli_real_escape_string($mysqli, strtoupper($row['gestore']));
$veicolo = mysqli_real_escape_string($mysqli, strtoupper($row['veicolo']));
$targa = mysqli_real_escape_string($mysqli, strtoupper($row['targa']));
$stato_pren = mysqli_real_escape_string($mysqli, strtoupper($row['stato_pren']));
$tipo_pren = mysqli_real_escape_string($mysqli, strtoupper($row['tipo_pren']));
$telefono = mysqli_real_escape_string($mysqli, strtoupper($row['telefono']));
$note = mysqli_real_escape_string($mysqli, strtoupper($row['note']));

$cliente = str_replace('\r\n' , ' ', $cliente); // mod del 15/07/2021
$cliente = stripslashes($cliente); // mod del 15/07/2021

$veicolo = str_replace('\r\n' , ' ', $veicolo); // mod del 15/07/2021
$veicolo = stripslashes($veicolo); // mod del 15/07/2021

$note = str_replace('\r\n' , ' ', $note);
$note = stripslashes($note);
$note = iconv('UTF-8', 'windows-1252', $note); // Converto il carattere â‚¬ presente nel database con il simbolo dell'€
//$note = iconv('UTF-8','UTF-8',$note); // Converto il carattere â‚¬ presente nel database con il simbolo dell'€
$data = strtotime($data);
$data = date('d/m/Y', $data);

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
$p = new fpdf('P','mm','A4'); //original senza parametri

//setto i margini sinistro, superiore e destro
$margine_sx=10;
$margine_top=5;
$margine_dx=10;
$p->SetMargins($margine_sx, $margine_top, $margine_dx);
// inizializza il documento
$p->Open();

// aggiunge una pagina
$p->AddPage();

// Impostare le caratteristiche del carattere
$p->SetTextColor(0); 
$p->SetFont('Arial', '', 10);
$p->SetFont('Times','B',14);
$p->Cell(185, 10, 'MODULO ACCETTAZIONE' ,1,1,'C');
$p->Ln(5);

// Creo le celle Anagrafica

$p->SetFont('Times', 'B', 12);
$p->Cell(100, 5, ' Accettatore :',0);
$p->Line(12,25,85,25);


$p->Cell(85, 5, 'Codice chiave : ',0,1);
$p->Ln(0);
$p->Line(111,25,190,25);


$p->SetFont('Times', 'B', 12);
$p->Cell(100, 15, ' Km :',0);
$p->Line(12,35,85,35);


$p->Cell(85, 15, 'Targa : '.$targa.'',0,1);
$p->Ln(0);
$p->Line(111,35,190,35);


$p->SetFont('Times', 'B', 12);
$p->Ln(0);
$p->Cell(100, 5, ' Data : '.$data.'',0);
$p->Cell(85, 5, 'Ora : '.$ora.'',0,1);
$p->Ln(3);
$p->Cell(100, 5, ' Cliente : '.$cliente.'',0);
$p->Cell(85, 5, 'Telefono : '.$telefono.'',0,1);
$p->Ln(3);
$p->Cell(100, 5, ' Gestore : '.$gestore.'',0);
$p->Cell(85, 5, 'Veicolo : '.$veicolo.'',0,1);
$p->Ln(3);
//$p->Cell(100, 5, ' Tipo Prenotazione : '.$tipo_pren.'',0);
//$p->Cell(85, 5, 'Stato Prenotazione : '.$stato_pren.'',0,1);
$p->Ln(2);
$p->SetFont('Times','B',14);
$p->Cell(185, 10, 'LAMENTATO CLIENTE' ,1,1,'C');
$p->SetFont('Arial', 'B', 10);
$p->MultiCell(185, 7, ''.$note.'' ,1,1); //Riga modificata in data 24-05-2023 da Cell a Multicell per permettere più caratteri nel campo note della scheda lavoro
$p->Ln(7);
$p->SetFont('Times','B',14);
$p->Cell(185, 10, 'NOTE CAPOFFICINA' ,1,1,'C');
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
$p->Cell(185, 7, '' ,1,1);
//$p->Cell(185, 7, '' ,1,1);
$p->Ln(10);
$p->SetFont('Times', 'B', 10);
$p->Cell(1, 5, '',0);															/*1 DEFINISCE L'INIZIO DELLA SCRITTA DATA STAMPA*/
$p->Cell(75, 5, 'Stampato il '.$data_stampa.' alle ore '.$ora_stampa.'',0,0);  	/*50 DEFINISCE LO SPAZIO TRA LA SCRITTA DATA STAMPA E FIRMA TECNICO - LO ZERO FINALE DICE DI NON ANDARE A CAPO*/
$p->Cell(80, 5, '',0);
$p->Cell(35, 5, 'Firma Tecnico',0,1);

// Creo Descrizione Intervento - Q.ta - Prezzo Unitario - Importo


// Creo le linee verticali tabella | 215 definisce la lunghezza
$p->Line(10,0,10,0);
$p->Line(195,0,195,0);

// Senza parametri rende il file al browser
$p->output(); 
ob_end_flush();
?>