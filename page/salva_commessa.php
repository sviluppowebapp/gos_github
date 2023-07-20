<?php

/* RECUPERO I DATI DAL FORM INSERIMENTO COMMESSA */
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['km'])){$km = mysqli_real_escape_string($mysqli, $_POST['km']);}else{$km ="";}
if(isset($_POST['telaio'])){$telaio = mysqli_real_escape_string($mysqli, $_POST['telaio']);}else{$telaio ="";}
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";}
if(isset($_POST['indirizzo'])){$indirizzo = mysqli_real_escape_string($mysqli, $_POST['indirizzo']);}else{$indirizzo ="";}
if(isset($_POST['piva'])){$piva = mysqli_real_escape_string($mysqli, $_POST['piva']);}else{$piva ="";}
if(isset($_POST['tel'])){$tel = mysqli_real_escape_string($mysqli, $_POST['tel']);}else{$tel ="";}
if(isset($_POST['totale'])){$totale = mysqli_real_escape_string($mysqli, $_POST['totale']);}else{$totale ="";}
if(isset($_POST['n_tecnico'])){$n_tecnico = mysqli_real_escape_string($mysqli, $_POST['n_tecnico']);}else{$n_tecnico ="";}
if(isset($_POST['pagamento'])){$pagamento = mysqli_real_escape_string($mysqli, $_POST['pagamento']);}else{$pagamento ="";}
if(isset($_POST['data'])){$data = mysqli_real_escape_string($mysqli, $_POST['data']);}else{$data ="";}
if(isset($_POST['dtscrev'])){$dtscrev = mysqli_real_escape_string($mysqli, $_POST['dtscrev']);}else{$dtscrev ="";}
if(isset($_POST['noterev'])){$noterev = mysqli_real_escape_string($mysqli, $_POST['noterev']);}else{$noterev ="";} //AGGIUNTA IL 12-08-2020
if(isset($_POST['allegato'])){$allegato = mysqli_real_escape_string($mysqli, $_POST['allegato']);}else{$allegato ="";}
if(isset($_POST['allegato1'])){$allegato1 = mysqli_real_escape_string($mysqli, $_POST['allegato1']);}else{$allegato1 ="";}
if(isset($_POST['allegato2'])){$allegato2 = mysqli_real_escape_string($mysqli, $_POST['allegato2']);}else{$allegato2 ="";}
if(isset($_POST['allegato3'])){$allegato = mysqli_real_escape_string($mysqli, $_POST['allegato3']);}else{$allegato3 ="";}

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$veicolo = trim(strip_tags(strtoupper($veicolo)));
$targa = trim(strip_tags(strtoupper($targa)));
$km = trim(strip_tags(strtoupper($km)));
$telaio = trim(strip_tags(strtoupper($telaio)));
$cliente = trim(strip_tags(strtoupper($cliente)));
$indirizzo = trim(strip_tags(strtoupper($indirizzo)));
$piva = trim(strip_tags(strtoupper($piva)));
$tel = trim(strip_tags(strtoupper($tel)));
$totale = trim(strip_tags(strtoupper($totale)));
$n_tecnico = trim(strip_tags(strtoupper($n_tecnico)));
$pagamento = trim(strip_tags(strtoupper($pagamento)));
$data = trim(strip_tags(strtoupper($data)));
$dtscrev = trim(strip_tags(strtoupper($dtscrev)));
$noterev = trim(strip_tags(strtoupper($noterev))); //AGGIUNTA IL 12-08-2020
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

$itr1 = trim(strip_tags(strtoupper($itr1)));
$itr2 = trim(strip_tags(strtoupper($itr2)));
$itr3 = trim(strip_tags(strtoupper($itr3)));
$itr4 = trim(strip_tags(strtoupper($itr4)));
$itr5 = trim(strip_tags(strtoupper($itr5)));
$itr6 = trim(strip_tags(strtoupper($itr6)));
$itr7 = trim(strip_tags(strtoupper($itr7)));
$itr8 = trim(strip_tags(strtoupper($itr8)));
$itr9 = trim(strip_tags(strtoupper($itr9)));
$itr10 = trim(strip_tags(strtoupper($itr10)));
$itr11 = trim(strip_tags(strtoupper($itr11)));
$itr12 = trim(strip_tags(strtoupper($itr12)));
$itr13 = trim(strip_tags(strtoupper($itr13)));
$itr14 = trim(strip_tags(strtoupper($itr14)));
$itr15 = trim(strip_tags(strtoupper($itr15)));

$for1 = trim(strip_tags(strtoupper($for1)));
$for2 = trim(strip_tags(strtoupper($for2)));
$for3 = trim(strip_tags(strtoupper($for3)));
$for4 = trim(strip_tags(strtoupper($for4)));
$for5 = trim(strip_tags(strtoupper($for5)));
$for6 = trim(strip_tags(strtoupper($for6)));
$for7 = trim(strip_tags(strtoupper($for7)));
$for8 = trim(strip_tags(strtoupper($for8)));
$for9 = trim(strip_tags(strtoupper($for9)));
$for10 = trim(strip_tags(strtoupper($for10)));
$for11 = trim(strip_tags(strtoupper($for11)));
$for12 = trim(strip_tags(strtoupper($for12)));
$for13 = trim(strip_tags(strtoupper($for13)));
$for14 = trim(strip_tags(strtoupper($for14)));
$for15 = trim(strip_tags(strtoupper($for15)));

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

if ($q1 == '') { $q1 = 0; }
if ($q2 == '') { $q2 = 0; }
if ($q3 == '') { $q3 = 0; }
if ($q4 == '') { $q4 = 0; }
if ($q5 == '') { $q5 = 0; }
if ($q6 == '') { $q6 = 0; }
if ($q7 == '') { $q7 = 0; }
if ($q8 == '') { $q8 = 0; }
if ($q9 == '') { $q9 = 0; }
if ($q10 == '') { $q10 = 0; }
if ($q11 == '') { $q11 = 0; }
if ($q12 == '') { $q12 = 0; }
if ($q13 == '') { $q13 = 0; }
if ($q14 == '') { $q14 = 0; }
if ($q15 == '') { $q15 = 0; }

if ($iu1 == '') { $iu1 = 0; }
if ($iu2 == '') { $iu2 = 0; }
if ($iu3 == '') { $iu3 = 0; }
if ($iu4 == '') { $iu4 = 0; }
if ($iu5 == '') { $iu5 = 0; }
if ($iu6 == '') { $iu6 = 0; }
if ($iu7 == '') { $iu7 = 0; }
if ($iu8 == '') { $iu8 = 0; }
if ($iu9 == '') { $iu9 = 0; }
if ($iu10 == '') { $iu10 = 0; }
if ($iu11 == '') { $iu11 = 0; }
if ($iu12 == '') { $iu12 = 0; }
if ($iu13 == '') { $iu13 = 0; }
if ($iu14 == '') { $iu14 = 0; }
if ($iu15 == '') { $iu15 = 0; }

if ($sc1 == '') { $sc1 = 0; }
if ($sc2 == '') { $sc2 = 0; }
if ($sc3 == '') { $sc3 = 0; }
if ($sc4 == '') { $sc4 = 0; }
if ($sc5 == '') { $sc5 = 0; }
if ($sc6 == '') { $sc6 = 0; }
if ($sc7 == '') { $sc7 = 0; }
if ($sc8 == '') { $sc8 = 0; }
if ($sc9 == '') { $sc9 = 0; }
if ($sc10 == '') { $sc10 = 0; }
if ($sc11 == '') { $sc11 = 0; }
if ($sc12 == '') { $sc12 = 0; }
if ($sc13 == '') { $sc13 = 0; }
if ($sc14 == '') { $sc14 = 0; }
if ($sc15 == '') { $sc15 = 0; }

if ($imp_1 == '') { $imp_1 = 0; }
if ($imp_2 == '') { $imp_2 = 0; }
if ($imp_3 == '') { $imp_3 = 0; }
if ($imp_4 == '') { $imp_4 = 0; }
if ($imp_5 == '') { $imp_5 = 0; }
if ($imp_6 == '') { $imp_6 = 0; }
if ($imp_7 == '') { $imp_7 = 0; }
if ($imp_8 == '') { $imp_8 = 0; }
if ($imp_9 == '') { $imp_9 = 0; }
if ($imp_10 == '') { $imp_10 = 0; }
if ($imp_11 == '') { $imp_11 = 0; }
if ($imp_12 == '') { $imp_12 = 0; }
if ($imp_13 == '') { $imp_13 = 0; }
if ($imp_14 == '') { $imp_14 = 0; }
if ($imp_15 == '') { $imp_15 = 0; }


/* QUERY DI INSERIMENTO SENZA UPPER, L'UPPER E' DEMANDATO AL COMANDO FOREACH */
$sq1 = "INSERT INTO commesse (veicolo,targa,km,telaio,cliente,indirizzo,piva,tel,itr1,itr2,itr3,itr4,itr5,itr6,itr7,itr8,itr9,itr10,itr11,itr12,itr13,itr14,itr15,for1,for2,for3,for4,for5,for6,for7,for8,for9,for10,for11,for12,for13,for14,for15,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,iu1,iu2,iu3,iu4,iu5,iu6,iu7,iu8,iu9,iu10,iu11,iu12,iu13,iu14,iu15,sc1,sc2,sc3,sc4,sc5,sc6,sc7,sc8,sc9,sc10,sc11,sc12,sc13,sc14,sc15,imp_1,imp_2,imp_3,imp_4,imp_5,imp_6,imp_7,imp_8,imp_9,imp_10,imp_11,imp_12,imp_13,imp_14,imp_15,totale,n_tecnico,pagamento,data,dtscrev,noterev,allegato) VALUES ('$veicolo','$targa','$km','$telaio','$cliente','$indirizzo','$piva','$tel','$itr1','$itr2','$itr3','$itr4','$itr5','$itr6','$itr7','$itr8','$itr9','$itr10','$itr11','$itr12','$itr13','$itr14','$itr15','$for1','$for2','$for3','$for4','$for5','$for6','$for7','$for8','$for9','$for10','$for11','$for12','$for13','$for14','$for15','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$iu1','$iu2','$iu3','$iu4','$iu5','$iu6','$iu7','$iu8','$iu9','$iu10','$iu11','$iu12','$iu13','$iu14','$iu15','$sc1','$sc2','$sc3','$sc4','$sc5','$sc6','$sc7','$sc8','$sc9','$sc10','$sc11','$sc12','$sc13','$sc14','$sc15','$imp_1','$imp_2','$imp_3','$imp_4','$imp_5','$imp_6','$imp_7','$imp_8','$imp_9','$imp_10','$imp_11','$imp_12','$imp_13','$imp_14','$imp_15','$totale','$n_tecnico','$pagamento',STR_TO_DATE('$data', '%d/%m/%Y'),STR_TO_DATE('$dtscrev','%d/%m/%Y'),'$noterev','$allegato')";
$rs1 = $mysqli->query($sq1);
//var_dump($sq1);
//exit;

if (!$rs1) {
echo "<p style='margin-top: 40px;text-align:center;'>Ho trovato un errore nell'esecuzione della <b>QUERY</b></p>";
die("Errore nella query $sq1: " . mysqli_error());
}else{

/* PRELEVO L'ULTIMO ID INSERITO */
$sq2 = "SELECT * FROM commesse ORDER BY id_com ASC";
$rs2 = $mysqli->query($sq2);
while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$id_commessa_inserita = mysqli_real_escape_string($mysqli, $row['id_com']);
}

var_dump($sq2);

//Prelevo e gestisco gli allegati
$vuoto = '';
$sql = "INSERT INTO `allegati_c` (`id_com`,`url_file1`,`url_file2`,`url_file3`) VALUES (('$id_commessa_inserita'),('$vuoto'),('$vuoto'),('$vuoto'))";
$result = mysqli_query($mysqli,$sql);

//File1
if(isset($_FILES["allegato1"]["name"])){
	$nome_file1 = $_FILES["allegato1"]["name"];
	$nome_allegato1 = "_1_".$id_commessa_inserita."_".$targa."_".$nome_file1; // Serve per identificare un allegato da un altro

	$url_file1 = "allegati_commessa/".$nome_allegato1;


	if (move_uploaded_file($_FILES["allegato1"]["tmp_name"], $url_file1)){
	    //echo "File caricato con successo";

	    //Inserisce il documento nella tabella "allegati_c"
	    //$sql = "INSERT INTO `allegati_c` (`id_commessa`,`url_file1`) VALUES (('$id_commessa_inserita'),('$url_file1'))";
		$sql = "UPDATE allegati_c SET url_file1 =('$url_file1') WHERE id_com = '$id_commessa_inserita'";
		$result = mysqli_query($mysqli,$sql);
	} else {
	    //echo "Errore nel caricamento del file";
	}
}


//File2
if(isset($_FILES["allegato2"]["name"])){
	$nome_file2 = $_FILES["allegato2"]["name"];
	$nome_allegato2 = "_2_".$id_commessa_inserita."_".$targa."_".$nome_file2; // Serve per identificare un allegato da un altro

	$url_file2 = "allegati_commessa/".$nome_allegato2;


	if (move_uploaded_file($_FILES["allegato2"]["tmp_name"], $url_file2)){
	    //echo "File caricato con successo";

	    //Inserisce il documento nella tabella "allegati_c"
	    $sql = "UPDATE allegati_c SET url_file2 =('$url_file2') WHERE id_com = '$id_commessa_inserita'";
		$result = mysqli_query($mysqli,$sql);
	} else {
	    //echo "Errore nel caricamento del file";
	}
}


//File3
if(isset($_FILES["allegato3"]["name"])){
	$nome_file3 = $_FILES["allegato3"]["name"];
	$nome_allegato3 = "_3_".$id_commessa_inserita."_".$targa."_".$nome_file3; // Serve per identificare un allegato da un altro

	$url_file3 = "allegati_commessa/".$nome_allegato3;


	if (move_uploaded_file($_FILES["allegato3"]["tmp_name"], $url_file3)){
	    //echo "File caricato con successo";

	    //Inserisce il documento nella tabella "allegati_c"
	    $sql = "UPDATE allegati_c SET url_file3 =('$url_file3') WHERE id_com = '$id_commessa_inserita'";
		$result = mysqli_query($mysqli,$sql);
	} else {
	    //echo "Errore nel caricamento del file";
	}
}


/*** Fine: Codice di Domenico ***/

/* Redirect alla pagina di stampa e recupero l'id commessa */
echo "<script language=javascript>document.location.href='index.php?page=saveandpdf&id_com=$id_commessa_inserita'</script>"; 

 }

?>