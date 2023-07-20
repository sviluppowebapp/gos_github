<?php
$data_oggi=date("d/m/Y");


if (isset($_GET['id_preventivo'])) {
$id_preventivo = (int)$_GET['id_preventivo'];

/* Recupero i dati del preventivo con quell'id inserito*/
$sq1 = "SELECT * FROM preventivi WHERE id_preventivo = '$id_preventivo'";
$rs1 = $mysqli->query($sq1);

while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
if(isset($row['data'])){$data = mysqli_real_escape_string($mysqli, $row['data']);}else{$data ="";}
if(isset($row['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);}else{$cliente ="";}
if(isset($row['indirizzo'])){$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);}else{$indirizzo ="";}
if(isset($row['tel'])){$tel = mysqli_real_escape_string($mysqli, $row['tel']);}else{$tel ="";}
if(isset($row['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);}else{$veicolo ="";}
if(isset($row['targa'])){$targa = mysqli_real_escape_string($mysqli, $row['targa']);}else{$targa="";}
if(isset($row['km'])){$km = mysqli_real_escape_string($mysqli, $row['km']);}else{$km ="";}
if(isset($row['n_tecnico'])){$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);}else{$n_tecnico ="";}
if(isset($row['pagamento'])){$pagamento = mysqli_real_escape_string($mysqli, $row['pagamento']);}else{$pagamento ="";}
if(isset($row['totale'])){$totale = mysqli_real_escape_string($mysqli, $row['totale']);}else{$totale ="";}
if(isset($row['allegato'])){$allegato = mysqli_real_escape_string($mysqli, $row['allegato']);}else{$allegato ="";}
if(isset($row['allegato1'])){$allegato1 = mysqli_real_escape_string($mysqli, $row['allegato1']);}else{$allegato1 ="";}
if(isset($row['allegato2'])){$allegato2 = mysqli_real_escape_string($mysqli, $row['allegato2']);}else{$allegato2 ="";}
if(isset($row['allegato3'])){$allegato3 = mysqli_real_escape_string($mysqli, $row['allegato3']);}else{$allegato3 ="";}


/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
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

/*QUANTITA*/
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

/*IMPORTO UNITARIO*/
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

/*SCONTO*/
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

/*IMPORTO*/
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

//RECUPERO EVENTUALI ALLEGATI
$sq2 = "SELECT * FROM allegati_p WHERE id_preventivo = '$id_preventivo'";
$rs2 = mysqli_query($mysqli,$sq2);
while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$url_file = mysqli_real_escape_string($mysqli, $row['url_file1']);
$url_file = mysqli_real_escape_string($mysqli, $row['url_file2']);
$url_file = mysqli_real_escape_string($mysqli, $row['url_file3']);
} 
//FINE RECUPERO ALLEGATI


 
if (isset($_POST['submit'])) {
$id_preventivo = (int)$_GET['id_preventivo'];
if(isset($_POST['data'])){$data= mysqli_real_escape_string($mysqli, $_POST['data']);}else{$data ="";}
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";}
if(isset($_POST['indirizzo'])){$indirizzo = mysqli_real_escape_string($mysqli, $_POST['indirizzo']);}else{$indirizzo ="";}
if(isset($_POST['tel'])){$tel = mysqli_real_escape_string($mysqli, $_POST['tel']);}else{$tel ="";}
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['n_tecnico'])){$n_tecnico = mysqli_real_escape_string($mysqli, $_POST['n_tecnico']);}else{$n_tecnico ="";}
if(isset($_POST['pagamento'])){$pagamento = mysqli_real_escape_string($mysqli, $_POST['pagamento']);}else{$pagamento ="";}
if(isset($_POST['km'])){$km = mysqli_real_escape_string($mysqli, $_POST['km']);}else{$km ="";}
if(isset($_POST['allegato'])){$allegato = mysqli_real_escape_string($mysqli, $_POST['allegato']);}else{$allegato ="";}
if(isset($_POST['totale'])){$totale = mysqli_real_escape_string($mysqli, $_POST['totale']);}else{$totale ="";}
if(isset($_POST['allegato1'])){$allegato1 = mysqli_real_escape_string($mysqli, $_POST['allegato1']);}else{$allegato1 ="";}
if(isset($_POST['allegato2'])){$allegato2 = mysqli_real_escape_string($mysqli, $_POST['allegato2']);}else{$allegato2 ="";}
if(isset($_POST['allegato3'])){$allegato3 = mysqli_real_escape_string($mysqli, $_POST['allegato3']);}else{$allegato3 ="";}


/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$veicolo = trim(strip_tags(strtoupper($veicolo)));
$targa = trim(strip_tags(strtoupper($targa)));
$km = trim(strip_tags(strtoupper($km)));
$cliente = trim(strip_tags(strtoupper($cliente)));
$tel = trim(strip_tags(strtoupper($tel)));
$totale = trim(strip_tags(strtoupper($totale)));
$n_tecnico = trim(strip_tags(strtoupper($n_tecnico)));
$pagamento = trim(strip_tags(strtoupper($pagamento)));
$data = trim(strip_tags(strtoupper($data)));
$allegato = trim(strip_tags(strtoupper($allegato)));
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */


if(isset($_POST['itr1'])){$itr1 = mysqli_real_escape_string($mysqli, $_POST['itr1']);}else{$itr1 ="";}
if(isset($_POST['itr2'])){$itr2 = mysqli_real_escape_string($mysqli, $_POST['itr2']);}else{$itr2 ="";}
if(isset($_POST['itr3'])){$itr3 = mysqli_real_escape_string($mysqli, $_POST['itr3']);}else{$itr3 ="";}
if(isset($_POST['itr4'])){$itr4 = mysqli_real_escape_string($mysqli, $_POST['itr4']);}else{$itr4 ="";}
if(isset($_POST['itr5'])){$itr5 = mysqli_real_escape_string($mysqli, $_POST['itr5']);}else{$itr5 ="";}
if(isset($_POST['itr6'])){$itr6 = mysqli_real_escape_string($mysqli, $_POST['itr6']);}else{$itr6 ="";}
if(isset($_POST['itr7'])){$itr7 = mysqli_real_escape_string($mysqli, $_POST['itr7']);}else{$itr7 ="";}
if(isset($_POST['itr8'])){$itr8 = mysqli_real_escape_string($mysqli, $_POST['itr8']);}else{$itr8 ="";}
if(isset($_POST['itr9'])){$itr9 = mysqli_real_escape_string($mysqli, $_POST['itr9']);}else{$itr9 ="";}
if(isset($_POST['itr10'])){$itr10 = mysqli_real_escape_string($mysqli, $_POST['itr10']);}else{$itr10 ="";}
if(isset($_POST['itr11'])){$itr11 = mysqli_real_escape_string($mysqli, $_POST['itr11']);}else{$itr11 ="";}
if(isset($_POST['itr12'])){$itr12 = mysqli_real_escape_string($mysqli, $_POST['itr12']);}else{$itr12 ="";}
if(isset($_POST['itr13'])){$itr13 = mysqli_real_escape_string($mysqli, $_POST['itr13']);}else{$itr13 ="";}
if(isset($_POST['itr14'])){$itr14 = mysqli_real_escape_string($mysqli, $_POST['itr14']);}else{$itr14 ="";}
if(isset($_POST['itr15'])){$itr15 = mysqli_real_escape_string($mysqli, $_POST['itr15']);}else{$itr15 ="";}

if(isset($_POST['for1'])){$for1 = mysqli_real_escape_string($mysqli, $_POST['for1']);}else{$for1 ="";}
if(isset($_POST['for2'])){$for2 = mysqli_real_escape_string($mysqli, $_POST['for2']);}else{$for2 ="";}
if(isset($_POST['for3'])){$for3 = mysqli_real_escape_string($mysqli, $_POST['for3']);}else{$for3 ="";}
if(isset($_POST['for4'])){$for4 = mysqli_real_escape_string($mysqli, $_POST['for4']);}else{$for4 ="";}
if(isset($_POST['for5'])){$for5 = mysqli_real_escape_string($mysqli, $_POST['for5']);}else{$for5 ="";}
if(isset($_POST['for6'])){$for6 = mysqli_real_escape_string($mysqli, $_POST['for6']);}else{$for6 ="";}
if(isset($_POST['for7'])){$for7 = mysqli_real_escape_string($mysqli, $_POST['for7']);}else{$for7 ="";}
if(isset($_POST['for8'])){$for8 = mysqli_real_escape_string($mysqli, $_POST['for8']);}else{$for8 ="";}
if(isset($_POST['for9'])){$for9 = mysqli_real_escape_string($mysqli, $_POST['for9']);}else{$for9 ="";}
if(isset($_POST['for10'])){$for10 = mysqli_real_escape_string($mysqli, $_POST['for10']);}else{$for10 ="";}
if(isset($_POST['for11'])){$for11 = mysqli_real_escape_string($mysqli, $_POST['for11']);}else{$for11 ="";}
if(isset($_POST['for12'])){$for12 = mysqli_real_escape_string($mysqli, $_POST['for12']);}else{$for12 ="";}
if(isset($_POST['for13'])){$for13 = mysqli_real_escape_string($mysqli, $_POST['for13']);}else{$for13 ="";}
if(isset($_POST['for14'])){$for14 = mysqli_real_escape_string($mysqli, $_POST['for14']);}else{$for14 ="";}
if(isset($_POST['for15'])){$for15 = mysqli_real_escape_string($mysqli, $_POST['for15']);}else{$for15 ="";}

if(isset($_POST['q1'])){$q1 = mysqli_real_escape_string($mysqli, $_POST['q1']);}else{$q1 ="";}
if(isset($_POST['q2'])){$q2 = mysqli_real_escape_string($mysqli, $_POST['q2']);}else{$q2 ="";}
if(isset($_POST['q3'])){$q3 = mysqli_real_escape_string($mysqli, $_POST['q3']);}else{$q3 ="";}
if(isset($_POST['q4'])){$q4 = mysqli_real_escape_string($mysqli, $_POST['q4']);}else{$q4 ="";}
if(isset($_POST['q5'])){$q5 = mysqli_real_escape_string($mysqli, $_POST['q5']);}else{$q5 ="";}
if(isset($_POST['q6'])){$q6 = mysqli_real_escape_string($mysqli, $_POST['q6']);}else{$q6 ="";}
if(isset($_POST['q7'])){$q7 = mysqli_real_escape_string($mysqli, $_POST['q7']);}else{$q7 ="";}
if(isset($_POST['q8'])){$q8 = mysqli_real_escape_string($mysqli, $_POST['q8']);}else{$q8 ="";}
if(isset($_POST['q9'])){$q9 = mysqli_real_escape_string($mysqli, $_POST['q9']);}else{$q9 ="";}
if(isset($_POST['q10'])){$q10 = mysqli_real_escape_string($mysqli, $_POST['q10']);}else{$q10 ="";}
if(isset($_POST['q11'])){$q11 = mysqli_real_escape_string($mysqli, $_POST['q11']);}else{$q11 ="";}
if(isset($_POST['q12'])){$q12 = mysqli_real_escape_string($mysqli, $_POST['q12']);}else{$q12 ="";}
if(isset($_POST['q13'])){$q13 = mysqli_real_escape_string($mysqli, $_POST['q13']);}else{$q13 ="";}
if(isset($_POST['q14'])){$q14 = mysqli_real_escape_string($mysqli, $_POST['q14']);}else{$q14 ="";}
if(isset($_POST['q15'])){$q15 = mysqli_real_escape_string($mysqli, $_POST['q15']);}else{$q15 ="";}

if(isset($_POST['iu1'])){$iu1 = mysqli_real_escape_string($mysqli, $_POST['iu1']);}else{$iu1 ="";}
if(isset($_POST['iu2'])){$iu2 = mysqli_real_escape_string($mysqli, $_POST['iu2']);}else{$iu2 ="";}
if(isset($_POST['iu3'])){$iu3 = mysqli_real_escape_string($mysqli, $_POST['iu3']);}else{$iu3 ="";}
if(isset($_POST['iu4'])){$iu4 = mysqli_real_escape_string($mysqli, $_POST['iu4']);}else{$iu4 ="";}
if(isset($_POST['iu5'])){$iu5 = mysqli_real_escape_string($mysqli, $_POST['iu5']);}else{$iu5 ="";}
if(isset($_POST['iu6'])){$iu6 = mysqli_real_escape_string($mysqli, $_POST['iu6']);}else{$iu6 ="";}
if(isset($_POST['iu7'])){$iu7 = mysqli_real_escape_string($mysqli, $_POST['iu7']);}else{$iu7 ="";}
if(isset($_POST['iu8'])){$iu8 = mysqli_real_escape_string($mysqli, $_POST['iu8']);}else{$iu8 ="";}
if(isset($_POST['iu9'])){$iu9 = mysqli_real_escape_string($mysqli, $_POST['iu9']);}else{$iu9 ="";}
if(isset($_POST['iu10'])){$iu10 = mysqli_real_escape_string($mysqli, $_POST['iu10']);}else{$iu10 ="";}
if(isset($_POST['iu11'])){$iu11 = mysqli_real_escape_string($mysqli, $_POST['iu11']);}else{$iu11 ="";}
if(isset($_POST['iu12'])){$iu12 = mysqli_real_escape_string($mysqli, $_POST['iu12']);}else{$iu12 ="";}
if(isset($_POST['iu13'])){$iu13 = mysqli_real_escape_string($mysqli, $_POST['iu13']);}else{$iu13 ="";}
if(isset($_POST['iu14'])){$iu14 = mysqli_real_escape_string($mysqli, $_POST['iu14']);}else{$iu14 ="";}
if(isset($_POST['iu15'])){$iu15 = mysqli_real_escape_string($mysqli, $_POST['iu15']);}else{$iu15 ="";}

if(isset($_POST['sc1'])){$sc1 = mysqli_real_escape_string($mysqli, $_POST['sc1']);}else{$sc1 ="";}
if(isset($_POST['sc2'])){$sc2 = mysqli_real_escape_string($mysqli, $_POST['sc2']);}else{$sc2 ="";}
if(isset($_POST['sc3'])){$sc3 = mysqli_real_escape_string($mysqli, $_POST['sc3']);}else{$sc3 ="";}
if(isset($_POST['sc4'])){$sc4 = mysqli_real_escape_string($mysqli, $_POST['sc4']);}else{$sc4 ="";}
if(isset($_POST['sc5'])){$sc5 = mysqli_real_escape_string($mysqli, $_POST['sc5']);}else{$sc5 ="";}
if(isset($_POST['sc6'])){$sc6 = mysqli_real_escape_string($mysqli, $_POST['sc6']);}else{$sc6 ="";}
if(isset($_POST['sc7'])){$sc7 = mysqli_real_escape_string($mysqli, $_POST['sc7']);}else{$sc7 ="";}
if(isset($_POST['sc8'])){$sc8 = mysqli_real_escape_string($mysqli, $_POST['sc8']);}else{$sc8 ="";}
if(isset($_POST['sc9'])){$sc9 = mysqli_real_escape_string($mysqli, $_POST['sc9']);}else{$sc9 ="";}
if(isset($_POST['sc10'])){$sc10 = mysqli_real_escape_string($mysqli, $_POST['sc10']);}else{$sc10 ="";}
if(isset($_POST['sc11'])){$sc11 = mysqli_real_escape_string($mysqli, $_POST['sc11']);}else{$sc11 ="";}
if(isset($_POST['sc12'])){$sc12 = mysqli_real_escape_string($mysqli, $_POST['sc12']);}else{$sc12 ="";}
if(isset($_POST['sc12'])){$sc12 = mysqli_real_escape_string($mysqli, $_POST['sc12']);}else{$sc12 ="";}
if(isset($_POST['sc13'])){$sc13 = mysqli_real_escape_string($mysqli, $_POST['sc13']);}else{$sc13 ="";}
if(isset($_POST['sc14'])){$sc14 = mysqli_real_escape_string($mysqli, $_POST['sc14']);}else{$sc14 ="";}
if(isset($_POST['sc15'])){$sc15 = mysqli_real_escape_string($mysqli, $_POST['sc15']);}else{$sc15 ="";}

if(isset($_POST['imp_1'])){$imp_1= mysqli_real_escape_string($mysqli, $_POST['imp_1']);}else{$imp_1 ="";}
if(isset($_POST['imp_2'])){$imp_2= mysqli_real_escape_string($mysqli, $_POST['imp_2']);}else{$imp_2 ="";}
if(isset($_POST['imp_3'])){$imp_3= mysqli_real_escape_string($mysqli, $_POST['imp_3']);}else{$imp_3 ="";}
if(isset($_POST['imp_4'])){$imp_4= mysqli_real_escape_string($mysqli, $_POST['imp_4']);}else{$imp_4 ="";}
if(isset($_POST['imp_5'])){$imp_5= mysqli_real_escape_string($mysqli, $_POST['imp_5']);}else{$imp_5 ="";}
if(isset($_POST['imp_6'])){$imp_6= mysqli_real_escape_string($mysqli, $_POST['imp_6']);}else{$imp_6 ="";}
if(isset($_POST['imp_7'])){$imp_7= mysqli_real_escape_string($mysqli, $_POST['imp_7']);}else{$imp_7 ="";}
if(isset($_POST['imp_8'])){$imp_8= mysqli_real_escape_string($mysqli, $_POST['imp_8']);}else{$imp_8 ="";}
if(isset($_POST['imp_9'])){$imp_9= mysqli_real_escape_string($mysqli, $_POST['imp_9']);}else{$imp_9 ="";}
if(isset($_POST['imp_10'])){$imp_10= mysqli_real_escape_string($mysqli, $_POST['imp_10']);}else{$imp_10 ="";}
if(isset($_POST['imp_11'])){$imp_11= mysqli_real_escape_string($mysqli, $_POST['imp_11']);}else{$imp_11 ="";}
if(isset($_POST['imp_12'])){$imp_12= mysqli_real_escape_string($mysqli, $_POST['imp_12']);}else{$imp_12 ="";}
if(isset($_POST['imp_13'])){$imp_13= mysqli_real_escape_string($mysqli, $_POST['imp_13']);}else{$imp_13 ="";}
if(isset($_POST['imp_14'])){$imp_14= mysqli_real_escape_string($mysqli, $_POST['imp_14']);}else{$imp_14 ="";}
if(isset($_POST['imp_15'])){$imp_15= mysqli_real_escape_string($mysqli, $_POST['imp_15']);}else{$imp_15 ="";}

if ($q1 == '') { $q1 = '0'; }
if ($q2 == '') { $q2 = '0'; }
if ($q3 == '') { $q3 = '0'; }
if ($q4 == '') { $q4 = '0'; }
if ($q5 == '') { $q5 = '0'; }
if ($q6 == '') { $q6 = '0'; }
if ($q7 == '') { $q7 = '0'; }
if ($q8 == '') { $q8 = '0'; }
if ($q9 == '') { $q9 = '0'; }
if ($q10 == '') { $q10 = '0'; }
if ($q11 == '') { $q11 = '0'; }
if ($q12 == '') { $q12 = '0'; }
if ($q13 == '') { $q13 = '0'; }
if ($q14 == '') { $q14 = '0'; }
if ($q15 == '') { $q15 = '0'; }

if ($sc1 == '') { $sc1 = '0'; }
if ($sc2 == '') { $sc2 = '0'; }
if ($sc3 == '') { $sc3 = '0'; }
if ($sc4 == '') { $sc4 = '0'; }
if ($sc5 == '') { $sc5 = '0'; }
if ($sc6 == '') { $sc6 = '0'; }
if ($sc7 == '') { $sc7 = '0'; }
if ($sc8 == '') { $sc8 = '0'; }
if ($sc9 == '') { $sc9 = '0'; }
if ($sc10 == '') { $sc10 = '0'; }
if ($sc11 == '') { $sc11 = '0'; }
if ($sc12 == '') { $sc12 = '0'; }
if ($sc13 == '') { $sc13 = '0'; }
if ($sc14 == '') { $sc14 = '0'; }
if ($sc15 == '') { $sc15 = '0'; }

if ($iu1 == '') { $iu1 = '0'; }
if ($iu2 == '') { $iu2 = '0'; }
if ($iu3 == '') { $iu3 = '0'; }
if ($iu4 == '') { $iu4 = '0'; }
if ($iu5 == '') { $iu5 = '0'; }
if ($iu6 == '') { $iu6 = '0'; }
if ($iu7 == '') { $iu7 = '0'; }
if ($iu8 == '') { $iu8 = '0'; }
if ($iu9 == '') { $iu9 = '0'; }
if ($iu10 == '') { $iu10 = '0'; }
if ($iu11 == '') { $iu11 = '0'; }
if ($iu12 == '') { $iu12 = '0'; }
if ($iu13 == '') { $iu13 = '0'; }
if ($iu14 == '') { $iu14 = '0'; }
if ($iu15 == '') { $iu15 = '0'; }

if ($imp_1 == '') { $imp_1 = '0'; }
if ($imp_2 == '') { $imp_2 = '0'; }
if ($imp_3 == '') { $imp_3 = '0'; }
if ($imp_4 == '') { $imp_4 = '0'; }
if ($imp_5 == '') { $imp_5 = '0'; }
if ($imp_6 == '') { $imp_6 = '0'; }
if ($imp_7 == '') { $imp_7 = '0'; }
if ($imp_8 == '') { $imp_8 = '0'; }
if ($imp_9 == '') { $imp_9 = '0'; }
if ($imp_10 == '') { $imp_10 = '0'; }
if ($imp_11 == '') { $imp_11 = '0'; }
if ($imp_12 == '') { $imp_12 = '0'; }
if ($imp_13 == '') { $imp_13 = '0'; }
if ($imp_14 == '') { $imp_14 = '0'; }
if ($imp_15 == '') { $imp_15 = '0'; }


$telaio='';
$piva='';

/*
$sq4 = "UPDATE preventivi SET veicolo = '$veicolo', targa = '$targa', km = '$km', email = '$email', cliente = '$cliente', tel = '$tel', itr1 = '$itr1', itr2 = '$itr2', itr3 = '$itr3', itr4 = '$itr4', itr5 = '$itr5', itr6 = '$itr6', itr7 = '$itr7', itr8 = '$itr8', itr9 = '$itr9', itr10 = '$itr10', itr11 = '$itr11', itr12 = '$itr12', itr13 = '$itr13', itr14 = '$itr14', itr15 = '$itr15', for1 = '$for1', for2 = '$for2', for3 = '$for3', for4 = '$for4', for5 = '$for5', for6 = '$for6', for7 = '$for7', for8 = '$for8', for9 = '$for9', for10 = '$for10', for11 = '$for11', for12 = '$for12', for13 = '$for13', for14 = '$for14', for15 = '$for15', q1 = '$q1', q2 = '$q2', q3 = '$q3', q4 = '$q4', q5 = '$q5', q6 = '$q6', q7 = '$q7', q8 = '$q8', q9 = '$q9', q10 = '$q10', q11 = '$q11', q12 = '$q12', q13 = '$q13', q14 = '$q14', q15 = '$q15', sc1 = '$sc1', sc2 = '$sc2', sc3 = '$sc3', sc4 = '$sc4', sc5 = '$sc5', sc6 = '$sc6', sc7 = '$sc7', sc8 = '$sc8', sc9 = '$sc9', sc10 = '$sc10', sc11 = '$sc11', sc12 = '$sc12', sc13 = '$sc13', sc14 = '$sc14', sc15 = '$sc15', iu1 = '$iu1', iu2 = '$iu2', iu3 = '$iu3', iu4 = '$iu4', iu5 = '$iu5', iu6 = '$iu6', iu7 = '$iu7', iu8 = '$iu8', iu9 = '$iu9', iu10 = '$iu10', iu11 = '$iu11', iu12 = '$iu12', iu13 = '$iu13', iu14 = '$iu14', iu15 = '$iu15', imp_1 = '$imp_1', imp_2 = '$imp_2', imp_3 = '$imp_3', imp_4 = '$imp_4', imp_5 = '$imp_5', imp_6 = '$imp_6', imp_7 = '$imp_7', imp_8 = '$imp_8', imp_9 = '$imp_9', imp_10 = '$imp_10', imp_11 = '$imp_11', imp_12 = '$imp_12', imp_13 = '$imp_13', imp_14 = '$imp_14', imp_15 = '$imp_15', totale = '$totale', n_accettatore =  '$n_accettatore', data = STR_TO_DATE('$data', '%d/%m/%Y'), allegato = '$allegato' WHERE id_preventivo = '$id_preventivo'";
$rs4 = $mysqli->query($sq4);
*/

/* QUERY DI INSERIMENTO*/
$sq4 = "INSERT INTO commesse (veicolo,targa,km,telaio,cliente,indirizzo,piva,tel,itr1,itr2,itr3,itr4,itr5,itr6,itr7,itr8,itr9,itr10,itr11,itr12,itr13,itr14,itr15,for1,for2,for3,for4,for5,for6,for7,for8,for9,for10,for11,for12,for13,for14,for15,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,iu1,iu2,iu3,iu4,iu5,iu6,iu7,iu8,iu9,iu10,iu11,iu12,iu13,iu14,iu15,sc1,sc2,sc3,sc4,sc5,sc6,sc7,sc8,sc9,sc10,sc11,sc12,sc13,sc14,sc15,imp_1,imp_2,imp_3,imp_4,imp_5,imp_6,imp_7,imp_8,imp_9,imp_10,imp_11,imp_12,imp_13,imp_14,imp_15,totale,n_tecnico,data,pagamento,allegato) VALUES ('$veicolo','$targa','$km','$telaio','$cliente','$indirizzo','$piva','$tel','$itr1','$itr2','$itr3','$itr4','$itr5','$itr6','$itr7','$itr8','$itr9','$itr10','$itr11','$itr12','$itr13','$itr14','$itr15','$for1','$for2','$for3','$for4','$for5','$for6','$for7','$for8','$for9','$for10','$for11','$for12','$for13','$for14','$for15','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$iu1','$iu2','$iu3','$iu4','$iu5','$iu6','$iu7','$iu8','$iu9','$iu10','$iu11','$iu12','$iu13','$iu14','$iu15','$sc1','$sc2','$sc3','$sc4','$sc5','$sc6','$sc7','$sc8','$sc9','$sc10','$sc11','$sc12','$sc13','$sc14','$sc15','$imp_1','$imp_2','$imp_3','$imp_4','$imp_5','$imp_6','$imp_7','$imp_8','$imp_9','$imp_10','$imp_11','$imp_12','$imp_13','$imp_14','$imp_15','$totale','$n_tecnico',STR_TO_DATE('$data', '%d/%m/%Y'),'$pagamento','$allegato')";
$rs4 = $mysqli->query($sq4);
//var_dump($sq4);
//exit;


if (!$rs4) {
echo "<p style='margin-top: 40px;text-align:center;'>Ho trovato un errore nell'esecuzione della <b>QUERY</b>$sq4</p>";

}else{
	
$messaggio = "<div class='success'>Commessa generata correttamente! Attendi..</div>";
echo "<meta http-equiv='refresh' content='0;url=index.php?page=home'>";
 
  }
 }
}
?>


<!--
$id_com = "";
$pagamento = "";	
/* PRELEVO L'ULTIMO ID INSERITO */
$sq8 = "SELECT * FROM commesse ORDER BY id_com ASC";
$rs8 = $mysqli->query($sq8);
while ($row = $rs8->fetch_array(MYSQLI_ASSOC)) {
$id_commessa_inserita = mysqli_real_escape_string($mysqli, $row['id_com']);
}

/* QUERY DI INSERIMENTO TECNICO*/
$sq9 = "UPDATE commesse SET n_tecnico = '$n_tecnico', pagamento = '$pagamento' WHERE id_com = '$id_commessa_inserita'";
$rs9 = $mysqli->query($sq9);
var_dump($sq9);
exit;
-->


<!--<?php $messaggio = ''; ?>-->
<!--<?php echo $messaggio; ?>-->


<?php include("js/cavicchi.js"); ?>

<form class="form" method="post" id="modulo" name="generaCommessa" action="" enctype="multipart/form-data">

<div class="form-container">

<div class="card-commesse">
  <div class="card-header">Anagrafica Cliente</div>
  <div class="card-block">

	<div class="row">
		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data" required="required" value="<?= $data_oggi; ?>">
			  </div>
		</div>
	</div>
	  
	  <hr>
	
	<div class="row">
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" aria-hidden="true" name="cliente" required="required" placeholder="Nome Cognome Cliente" value="<?= $cliente; ?>">
			  </div>
		</div>
		
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="indirizzo" placeholder="Indirizzo" value="<?= $indirizzo; ?>">
			  </div>
		</div>	

		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="tel" required="required" placeholder="Telefono" value="<?= $tel; ?>">
			  </div>
		</div>	
	</div> 
	

</div>
</div><!--Close Div Anagrafica Cliente-->


<div class="card-commesse">
  <div class="card-header">Anagrafica Vettura</div>
  <div class="card-block">

	<div class="row">
		
		<div class="col-md-4">
		 <label class="sr-only" for="Veicolo">Veicolo</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="veicolo" required="required" placeholder="Veicolo" value="<?= $veicolo; ?>" >
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Targa">Targa</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="targa" required="required" placeholder="Targa Veicolo" id=targa" maxlength="8" onkeyup="VerificaTarga(this)" value="<?= $targa; ?>">
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Km">Km</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="km" required="required" placeholder= "Km Veicolo" id="km" onkeyup="VerificaKm(this)" value="<?= $km; ?>">
			  </div>
		</div>	
	</div>
	  
	  <hr>
	
	
<div class="row">
		
		<div class="col-md-4">
				 <label class="sr-only" for="n_tecnico">Tecnico</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
						<select class="form-control" id="n_tecnico" name="n_tecnico" required="required">
						<?php 
							echo "<option value='$n_tecnico'>$n_tecnico</option>"; 
							$sq10 = "SELECT * FROM tecnico ORDER BY n_tecnico ASC";
							$rs10 = $mysqli->query($sq10);
							echo "<option value=''> Seleziona Tecnico ... </option>"; 
							while ($row = $rs10->fetch_array(MYSQLI_ASSOC)) {
							$n_tecnico = mysqli_real_escape_string($mysqli, strtoupper($row['n_tecnico']));
							echo "<option value='$n_tecnico'>$n_tecnico</option>";
							}
						?>
						</select>
				</div>
				
		</div>
		
		<div class="col-md-4">
				 <label class="sr-only" for="pagamento">Pagamento</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
						<select class="form-control" id="pagamento" name="pagamento" required="required">
						<?php 
							echo "<option value='$pagamento'>$pagamento</option>"; 
							$sq11 = "SELECT * FROM tipo_pagamento ORDER BY stato_pag ASC";
							$rs11 = $mysqli->query($sq11);
							echo "<option value=''> Seleziona Pagamento </option>"; 
							while ($row = $rs11->fetch_array(MYSQLI_ASSOC)) {
							$stato_pag = mysqli_real_escape_string($mysqli, strtoupper($row['stato_pag']));
							echo "<option value='$stato_pag'>$stato_pag</option>";
							}
						?>
						</select>
				</div>
				
		</div>		

		<div class="col-md-4">
				 <label class="sr-only" for="allegato">Allegato</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
						<select class="form-control" id="allegato" name="allegato" required="required">
						<?php 
							echo "<option value='$allegato'>$allegato</option>"; 
							$sq12 = "SELECT * FROM allegato ORDER BY allegato ASC";
							$rs12 = $mysqli->query($sq12);
							echo "<option value=''> Allegato </option>"; 
							while ($row = $rs12->fetch_array(MYSQLI_ASSOC)) {
							$allegato = mysqli_real_escape_string($mysqli, strtoupper($row['allegato']));
							echo "<option value='$allegato'>$allegato</option>";
							}
						?>
						</select>
				</div>
				
		</div>	
		

	</div>
	  
	  <hr>
	  
</div>
</div><!--Close Div Anagrafica Vettura-->


<fieldset>
<legend>Commessa Generata da Preventivo</legend>
<table id="commessa">
<tbody>

<tr>
<td><b>Intervento</b></td>
<td><b>Fornitore</b></td>
<td><b>Q.t&agrave;</b></td>
<td><b>Unitario</b></td>
<td><b>Sconto %</b></td>
<td><b>Totale</b></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr1" id="itr1" class="t1" value="<?= $itr1 ?>"></td>
<td><input type="text" name="for1" id="for1" class="t1" value="<?= $for1 ?>"></td>
<td><input type="text" name="q1" id="q1" class="t2 somma" onKeyUp="SommaRiga(1)" value="<?= $q1 ?>" placeholder="0"></td>
<td><input type="text" name="iu1" id="iu1" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" value="<?= $iu1 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc1" id="sc1" class="t2 somma" onKeyUp="Virgola(1)" value="<?= $sc1 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_1" id="imp_1" class="t2 somma" value="<?= $imp_1 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr2" id="itr2" class="t1" value="<?= $itr2 ?>"></td>
<td><input type="text" name="for2" id="for2" class="t1" value="<?= $for2 ?>"></td>
<td><input type="text" name="q2" id="q2" class="t2 somma" onKeyUp="SommaRiga(2)" value="<?= $q2 ?>" placeholder="0"></td>
<td><input type="text" name="iu2" id="iu2" class="t2 somma" onKeyUp="SommaRiga(2)" onBlur="Format(2)" value="<?= $iu2 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc2" id="sc2" class="t2 somma" onKeyUp="Virgola(2)" value="<?= $sc2 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_2" id="imp_2" class="t2 somma" value="<?= $imp_2 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr3" id="itr3" class="t1" value="<?= $itr3 ?>"></td>
<td><input type="text" name="for3" id="for3" class="t1" value="<?= $for3 ?>"></td>
<td><input type="text" name="q3" id="q3" class="t2 somma" onKeyUp="SommaRiga(3)" value="<?= $q3 ?>" placeholder="0"></td>
<td><input type="text" name="iu3" id="iu3" class="t2 somma" onKeyUp="SommaRiga(3)" onBlur="Format(3)" value="<?= $iu3 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc3" id="sc3" class="t2 somma" onKeyUp="Virgola(3)" value="<?= $sc3 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_3" id="imp_3" class="t2 somma" value="<?= $imp_3 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr4" id="itr4" class="t1" value="<?= $itr4 ?>"></td>
<td><input type="text" name="for4" id="for4" class="t1" value="<?= $for4 ?>"></td>
<td><input type="text" name="q4" id="q4" class="t2 somma" onKeyUp="SommaRiga(4)" value="<?= $q4 ?>" placeholder="0"></td>
<td><input type="text" name="iu4" id="iu4" class="t2 somma" onKeyUp="SommaRiga(4)" onBlur="Format(4)" value="<?= $iu4 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc4" id="sc4" class="t2 somma" onKeyUp="Virgola(4)" value="<?= $sc4 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_4" id="imp_4" class="t2 somma" value="<?= $imp_4 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr5" id="itr5" class="t1" value="<?= $itr5 ?>"></td>
<td><input type="text" name="for5" id="for5" class="t1" value="<?= $for5 ?>"></td>
<td><input type="text" name="q5" id="q5" class="t2 somma" onKeyUp="SommaRiga(5)" value="<?= $q5 ?>" placeholder="0"></td>
<td><input type="text" name="iu5" id="iu5" class="t2 somma" onKeyUp="SommaRiga(5)" onBlur="Format(5)" value="<?= $iu5 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc5" id="sc5" class="t2 somma" onKeyUp="Virgola(5)" value="<?= $sc5 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_5" id="imp_5" class="t2 somma" value="<?= $imp_5 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr6" id="itr6" class="t1" value="<?= $itr6 ?>"></td>
<td><input type="text" name="for6" id="for6" class="t1" value="<?= $for6 ?>"></td>
<td><input type="text" name="q6" id="q6" class="t2 somma" onKeyUp="SommaRiga(6)" value="<?= $q6 ?>" placeholder="0"></td>
<td><input type="text" name="iu6" id="iu6" class="t2 somma" onKeyUp="SommaRiga(6)" onBlur="Format(6)" value="<?= $iu6 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc6" id="sc6" class="t2 somma" onKeyUp="Virgola(6)" value="<?= $sc6 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_6" id="imp_6" class="t2 somma" value="<?= $imp_6 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr7" id="itr7" class="t1" value="<?= $itr7 ?>"></td>
<td><input type="text" name="for7" id="for7" class="t1" value="<?= $for7 ?>"></td>
<td><input type="text" name="q7" id="q7" class="t2 somma" onKeyUp="SommaRiga(7)" value="<?= $q7 ?>" placeholder="0"></td>
<td><input type="text" name="iu7" id="iu7" class="t2 somma" onKeyUp="SommaRiga(7)" onBlur="Format(7)" value="<?= $iu7 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc7" id="sc7" class="t2 somma" onKeyUp="Virgola(7)" value="<?= $sc7 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_7" id="imp_7" class="t2 somma" value="<?= $imp_7 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr8" id="itr8" class="t1" value="<?= $itr8 ?>"></td>
<td><input type="text" name="for8" id="for8" class="t1" value="<?= $for8 ?>"></td>
<td><input type="text" name="q8" id="q8" class="t2 somma" onKeyUp="SommaRiga(8)" value="<?= $q8 ?>" placeholder="0"></td>
<td><input type="text" name="iu8" id="iu8" class="t2 somma" onKeyUp="SommaRiga(8)" onBlur="Format(8)" value="<?= $iu8 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc8" id="sc8" class="t2 somma" onKeyUp="Virgola(8)" value="<?= $sc8 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_8" id="imp_8" class="t2 somma" value="<?= $imp_8 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr9" id="itr9" class="t1" value="<?= $itr9 ?>"></td>
<td><input type="text" name="for9" id="for9" class="t1" value="<?= $for9 ?>"></td>
<td><input type="text" name="q9" id="q9" class="t2 somma" onKeyUp="SommaRiga(9)" value="<?= $q9 ?>" placeholder="0"></td>
<td><input type="text" name="iu9" id="iu9" class="t2 somma" onKeyUp="SommaRiga(9)" onBlur="Format(9)" value="<?= $iu9 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc9" id="sc9" class="t2 somma" onKeyUp="Virgola(9)" value="<?= $sc9 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_9" id="imp_9" class="t2 somma" value="<?= $imp_9 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr10" id="itr10" class="t1" value="<?= $itr10 ?>"></td>
<td><input type="text" name="for10" id="for10" class="t1" value="<?= $for10 ?>"></td>
<td><input type="text" name="q10" id="q10" class="t2 somma" onKeyUp="SommaRiga(10)" value="<?= $q10 ?>" placeholder="0"></td>
<td><input type="text" name="iu10" id="iu10" class="t2 somma" onKeyUp="SommaRiga(10)" onBlur="Format(10)" value="<?= $iu10 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc10" id="sc10" class="t2 somma" onKeyUp="Virgola(10)" value="<?= $sc10 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_10" id="imp_10" class="t2 somma" value="<?= $imp_10 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr11" id="itr11" class="t1" value="<?= $itr11 ?>"></td>
<td><input type="text" name="for11" id="for11" class="t1" value="<?= $for11 ?>"></td>
<td><input type="text" name="q11" id="q11" class="t2 somma" onKeyUp="SommaRiga(11)" value="<?= $q11 ?>" placeholder="0"></td>
<td><input type="text" name="iu11" id="iu11" class="t2 somma" onKeyUp="SommaRiga(11)" onBlur="Format(11)" value="<?= $iu11 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc11" id="sc11" class="t2 somma" onKeyUp="Virgola(11)" value="<?= $sc11 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_11" id="imp_11" class="t2 somma" value="<?= $imp_11 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr12" id="itr12" class="t1" value="<?= $itr12 ?>"></td>
<td><input type="text" name="for12" id="for12" class="t1" value="<?= $for12 ?>"></td>
<td><input type="text" name="q12" id="q12" class="t2 somma" onKeyUp="SommaRiga(12)" value="<?= $q12 ?>" placeholder="0"></td>
<td><input type="text" name="iu12" id="iu12" class="t2 somma" onKeyUp="SommaRiga(12)" onBlur="Format(12)" value="<?= $iu12 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc12" id="sc12" class="t2 somma" onKeyUp="Virgola(12)" value="<?= $sc12 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_12" id="imp_12" class="t2 somma" value="<?= $imp_12 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr13" id="itr13" class="t1" value="<?= $itr13 ?>"></td>
<td><input type="text" name="for13" id="for13" class="t1" value="<?= $for13 ?>"></td>
<td><input type="text" name="q13" id="q13" class="t2 somma" onKeyUp="SommaRiga(13)" value="<?= $q13 ?>" placeholder="0"></td>
<td><input type="text" name="iu13" id="iu13" class="t2 somma" onKeyUp="SommaRiga(13)" onBlur="Format(13)" value="<?= $iu13 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc13" id="sc13" class="t2 somma" onKeyUp="Virgola(13)" value="<?= $sc13 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_13" id="imp_13" class="t2 somma" value="<?= $imp_13 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr14" id="itr14" class="t1" value="<?= $itr14 ?>"></td>
<td><input type="text" name="for14" id="for14" class="t1" value="<?= $for14 ?>"></td>
<td><input type="text" name="q14" id="q14" class="t2 somma" onKeyUp="SommaRiga(14)" value="<?= $q14 ?>" placeholder="0"></td>
<td><input type="text" name="iu14" id="iu14" class="t2 somma" onKeyUp="SommaRiga(14)" onBlur="Format(14)" value="<?= $iu14 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc14" id="sc14" class="t2 somma" onKeyUp="Virgola(14)" value="<?= $sc14 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_14" id="imp_14" class="t2 somma" value="<?= $imp_14 ?>" placeholder="0.00" readonly></td>
</tr>

<tr class="righe">
<td><input type="text" name="itr15" id="itr15" class="t1" value="<?= $itr15 ?>"></td>
<td><input type="text" name="for15" id="for15" class="t1" value="<?= $for15 ?>"></td>
<td><input type="text" name="q15" id="q15" class="t2 somma" onKeyUp="SommaRiga(15)" value="<?= $q15 ?>" placeholder="0"></td>
<td><input type="text" name="iu15" id="iu15" class="t2 somma" onKeyUp="SommaRiga(15)" onBlur="Format(15)" value="<?= $iu15 ?>" placeholder="0.00"></td>
<td><input type="text" name="sc15" id="sc15" class="t2 somma" onKeyUp="Virgola(15)" value="<?= $sc15 ?>" placeholder="sconto"></td>
<td><input type="text" name="imp_15" id="imp_15" class="t2 somma" value="<?= $imp_15 ?>" placeholder="0.00" readonly></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Tot. Generale</td>
<td><input type="text" name="totale" class="t2" id="totale" value="<?= $totale ?>" placeholder="0.00" readonly></td>
</tr>

</tbody>
</table>
</fieldset>

<?php
$url_file1='';
$url_file2='';
$url_file3='';
$sq2 = "SELECT * FROM allegati_p WHERE id_preventivo = '$id_preventivo'";
$rs2 = mysqli_query($mysqli,$sq2);
while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$url_file1 = mysqli_real_escape_string($mysqli, $row['url_file1']);
$url_file2 = mysqli_real_escape_string($mysqli, $row['url_file2']);
$url_file3 = mysqli_real_escape_string($mysqli, $row['url_file3']);
}
?>

<!-- Blocco Documento Allegato -->
    <fieldset>
        <legend>Per modificare gli allegati contattare amministratore</legend>
        <table width="470" id="commessa">
            <tbody>
                <tr class="righe">
                    <td>
                        <?php if($url_file1){?>
                            <a target="_blank" href="<?php echo $url_file1; ?>">1) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento allegato
                        <?php }?>
                    </td>
                </tr>
                <tr class="righe">
                    <td>
                        <?php if($url_file2){?>
                            <a target="_blank" href="<?php echo $url_file2; ?>">2) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento allegato
                        <?php }?>
                    </td>
                </tr>
                <tr class="righe">
                    <td>
                        <?php if($url_file3){?>
                            <a target="_blank" href="<?php echo $url_file3; ?>">3) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento allegato
                        <?php }?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <!-- Fine: Blocco Documento Allegato -->
<!-- Fine: Codice di Domenico -->

	<div class="text-right">
		<button type="submit" name="submit" class="btn btn-success right">Genera Commessa</button> 
	</div>

	<?php include ("js/attempt.js"); ?>

	  
</div><!--Close Form Container-->
</form><!--Close Form-->