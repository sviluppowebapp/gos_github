<?php

/* Recupero l'id dell'ultima commessa inserita */
$id_com = (int)$_GET['id_com'];

/* Recupero i dati della commessa inserita */
$sq1 = "SELECT * FROM commesse WHERE id_com = '$id_com'";
$rs1 = $mysqli->query($sq1);
$count = mysqli_num_rows($rs1);

/* Conto le righe per vedere se esiste la commessa */
if ($count == 0) {

echo "<p style='text-align:center;margin-top: 10%;'>Non esistono Commesse corrispondenti all'ID: $id</p>";

}else{

while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
$id_com = mysqli_real_escape_string($mysqli, $row['id_com']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
//$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$piva = mysqli_real_escape_string($mysqli, $row['piva']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$telaio = mysqli_real_escape_string($mysqli, $row['telaio']);
$km = mysqli_real_escape_string($mysqli, $row['km']);
$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);
$pagamento = mysqli_real_escape_string($mysqli, $row['pagamento']);
//$note = mysqli_real_escape_string($mysqli, $row['note']);
$allegato = mysqli_real_escape_string($mysqli, $row['allegato']);
$totale = mysqli_real_escape_string($mysqli, $row['totale']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$indirizzo = trim(strip_tags(stripslashes($indirizzo)));
$pagamento = trim(strip_tags(stripslashes($pagamento)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$n_tecnico = trim(strip_tags(stripslashes($n_tecnico)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

$itr1 = mysqli_real_escape_string($mysqli, $row['itr1']);
$itr2 = mysqli_real_escape_string($mysqli, $row['itr2']);
$itr3 = mysqli_real_escape_string($mysqli, $row['itr3']);
$itr4 = mysqli_real_escape_string($mysqli, $row['itr4']);
$itr5 = mysqli_real_escape_string($mysqli, $row['itr5']);
$itr6 = mysqli_real_escape_string($mysqli, $row['itr6']);
$itr7 = mysqli_real_escape_string($mysqli, $row['itr7']);
$itr8 = mysqli_real_escape_string($mysqli, $row['itr8']);
$itr9 = mysqli_real_escape_string($mysqli, $row['itr9']);
$itr10 = mysqli_real_escape_string($mysqli, $row['itr10']);
$itr11 = mysqli_real_escape_string($mysqli, $row['itr11']);
$itr12 = mysqli_real_escape_string($mysqli, $row['itr12']);
$itr13 = mysqli_real_escape_string($mysqli, $row['itr13']);
$itr14 = mysqli_real_escape_string($mysqli, $row['itr14']);
$itr15 = mysqli_real_escape_string($mysqli, $row['itr15']);

$for1 = mysqli_real_escape_string($mysqli, $row['for1']);
$for2 = mysqli_real_escape_string($mysqli, $row['for2']);
$for3 = mysqli_real_escape_string($mysqli, $row['for3']);
$for4 = mysqli_real_escape_string($mysqli, $row['for4']);
$for5 = mysqli_real_escape_string($mysqli, $row['for5']);
$for6 = mysqli_real_escape_string($mysqli, $row['for6']);
$for7 = mysqli_real_escape_string($mysqli, $row['for7']);
$for8 = mysqli_real_escape_string($mysqli, $row['for8']);
$for9 = mysqli_real_escape_string($mysqli, $row['for9']);
$for10 = mysqli_real_escape_string($mysqli, $row['for10']);
$for11 = mysqli_real_escape_string($mysqli, $row['for11']);
$for12 = mysqli_real_escape_string($mysqli, $row['for12']);
$for13 = mysqli_real_escape_string($mysqli, $row['for13']);
$for14 = mysqli_real_escape_string($mysqli, $row['for14']);
$for15 = mysqli_real_escape_string($mysqli, $row['for15']);

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

?>

<form class="form" name="InserisciCommessaOfficina" method="POST" id="modulo" action="<?php echo "pdf_commessa.php?id_com=$id_com"; ?>" enctype="multipart/form-data">

<div class="form-container">

<div class="card-commesse">
  <div class="card-header">Anagrafica Cliente</div>
  <div class="card-block">

	<div class="row">

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" name="id_com" disabled="disabled" id="id" value="<?php echo $id_com ?>" size="10" readonly="readonly">
			  </div>
		</div>

	<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data" value="<?php echo $data ?>" readonly="readonly">
			  </div>
		</div>	
	</div>
	  
	  <hr>
	
	<div class="row">
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" aria-hidden="true" name="cliente" required="required" placeholder="Nome Cognome Cliente" value="<?php echo $cliente ?>" readonly="readonly">
			  </div>
		</div>
		
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="indirizzo" placeholder="Indirizzo" value="<?php echo $indirizzo ?>" readonly="readonly">
			  </div>
		</div>	

		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="tel" required="required" placeholder="Telefono" value="<?php echo $tel ?>" readonly="readonly">
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
				<input type="text" class="form-control" name="veicolo" required="required" placeholder="Veicolo" value="<?php echo $veicolo ?>" readonly="readonly">
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Targa">Targa</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="targa" required="required" placeholder="Targa Veicolo" id=targa" maxlength="8" onkeyup="VerificaTarga(this)" value="<?php echo $targa ?>" readonly="readonly">
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Km">Km</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="km" required="required" placeholder= "Km Veicolo" id="km" onkeyup="VerificaKm(this)" value="<?php echo $km ?>" readonly="readonly">
			  </div>
		</div>	
	</div>
	  
	  <hr>
	
	
<div class="row">
		
		<div class="col-md-4">
		 <label class="sr-only" for="tecnico">Tecnico</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="n_tecnico" required="required" placeholder= "Tecnico" id="n_tecnico" value="<?php echo $n_tecnico ?>" readonly="readonly">
			  </div>
		</div>
		
		
		<div class="col-md-4">
		 <label class="sr-only" for="pagamento">Pagamento</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="pagamento" required="required" placeholder= "Pagamento" id="pagamento" value="<?php echo $pagamento ?>" readonly="readonly">
			  </div>
		</div>
			

		<div class="col-md-4">
		 <label class="sr-only" for="allegato">Allegato</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="allegato" required="required" placeholder= "Allegato" id="allegato" value="<?php echo $allegato ?>" readonly="readonly">
			  </div>
		</div>
			
		

	</div>
	  
	  <hr>
	  
</div>
</div><!--Close Div Anagrafica Vettura-->




<div class="card-commesse">
  <div class="card-header">Interventi Manutenzione Veicolo</div>
  <div class="card-block">

	<table id="commessa">
		<tbody>
		<tr>
			<td>Intervento</td>
			<td>Fornitore</td>
			<td>Q.t&agrave;</td>
			<td>Unitario</td>
			<td>Sconto %</td>
			<td>Totale</td>
		</tr>
		
			
			<? if ($itr1 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr1" id="itr1" class="t1" size="30" maxlength="49" value="<?= $itr1 ?>" readonly="readonly"></td>
			<td><input type="text" name="for1" id="for1" class="t1" size="10" value="<?= $for1 ?>" readonly="readonly"></td>
			<td><input type="text" name="q1" id="q1" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q1 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu1" id="iu1" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu1 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc1" id="sc1" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc1 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_1" id="imp_1" class="t2 somma" size="8" value="<?= $imp_1 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>

			<? if ($itr2 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr2" id="itr2" class="t1" size="30" maxlength="49" value="<?= $itr2 ?>" readonly="readonly"></td>
			<td><input type="text" name="for2" id="for2" class="t1" size="10" value="<?= $for2 ?>" readonly="readonly"></td>
			<td><input type="text" name="q2" id="q2" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q2 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu2" id="iu2" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu2 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc2" id="sc2" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc2 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_2" id="imp_2" class="t2 somma" size="8" value="<?= $imp_2 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
	
			<? if ($itr3 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr3" id="itr3" class="t1" size="30" maxlength="49" value="<?= $itr3 ?>" readonly="readonly"></td>
			<td><input type="text" name="for3" id="for3" class="t1" size="10" value="<?= $for3 ?>" readonly="readonly"></td>
			<td><input type="text" name="q3" id="q3" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q3 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu3" id="iu3" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu3 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc3" id="sc3" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc3 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_3" id="imp_3" class="t2 somma" size="8" value="<?= $imp_3 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr4 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr4" id="itr4" class="t1" size="30" maxlength="49" value="<?= $itr4 ?>" readonly="readonly"></td>
			<td><input type="text" name="for4" id="for4" class="t1" size="10" value="<?= $for4 ?>" readonly="readonly"></td>
			<td><input type="text" name="q4" id="q4" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q4 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu4" id="iu4" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu4 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc4" id="sc4" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc4 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_4" id="imp_4" class="t2 somma" size="8" value="<?= $imp_4 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr5 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr5" id="itr5" class="t1" size="30" maxlength="49" value="<?= $itr5 ?>" readonly="readonly"></td>
			<td><input type="text" name="for5" id="for5" class="t1" size="10" value="<?= $for5 ?>" readonly="readonly"></td>
			<td><input type="text" name="q5" id="q5" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q5 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu5" id="iu5" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu5 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc5" id="sc5" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc5 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_5" id="imp_5" class="t2 somma" size="8" value="<?= $imp_5 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>

			<? if ($itr6 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr6" id="itr6" class="t1" size="30" maxlength="49" value="<?= $itr6 ?>" readonly="readonly"></td>
			<td><input type="text" name="for6" id="for6" class="t1" size="10" value="<?= $for6 ?>" readonly="readonly"></td>
			<td><input type="text" name="q6" id="q6" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q6 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu6" id="iu6" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu6 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc6" id="sc6" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc6 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_6" id="imp_6" class="t2 somma" size="8" value="<?= $imp_6 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr7 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr7" id="itr7" class="t1" size="30" maxlength="49" value="<?= $itr7 ?>" readonly="readonly"></td>
			<td><input type="text" name="for7" id="for7" class="t1" size="10" value="<?= $for7 ?>" readonly="readonly"></td>
			<td><input type="text" name="q7" id="q7" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q7 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu7" id="iu7" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu7 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc7" id="sc7" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc7 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_7" id="imp_7" class="t2 somma" size="8" value="<?= $imp_7 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr8 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr8" id="itr8" class="t1" size="30" maxlength="49" value="<?= $itr8 ?>" readonly="readonly"></td>
			<td><input type="text" name="for8" id="for8" class="t1" size="10" value="<?= $for8 ?>" readonly="readonly"></td>
			<td><input type="text" name="q8" id="q8" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q8 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu8" id="iu8" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu8 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc8" id="sc8" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc8 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_8" id="imp_8" class="t2 somma" size="8" value="<?= $imp_8 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr9 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr9" id="itr9" class="t1" size="30" maxlength="49" value="<?= $itr9 ?>" readonly="readonly"></td>
			<td><input type="text" name="for9" id="for9" class="t1" size="10" value="<?= $for9 ?>" readonly="readonly"></td>
			<td><input type="text" name="q9" id="q9" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q9 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu9" id="iu9" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu9 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc9" id="sc9" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc9 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_9" id="imp_9" class="t2 somma" size="8" value="<?= $imp_9 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr10 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr10" id="itr10" class="t1" size="30" maxlength="49" value="<?= $itr10 ?>" readonly="readonly"></td>
			<td><input type="text" name="for10" id="for10" class="t1" size="10" value="<?= $for10 ?>" readonly="readonly"></td>
			<td><input type="text" name="q10" id="q10" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q10 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu10" id="iu10" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu10 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc10" id="sc10" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc10 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_10" id="imp_10" class="t2 somma" size="8" value="<?= $imp_10 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr11 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr11" id="itr11" class="t1" size="30" maxlength="49" value="<?= $itr11 ?>" readonly="readonly"></td>
			<td><input type="text" name="for11" id="for11" class="t1" size="10" value="<?= $for11 ?>" readonly="readonly"></td>
			<td><input type="text" name="q11" id="q11" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q11 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu11" id="iu11" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu11 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc11" id="sc11" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc11 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_11" id="imp_11" class="t2 somma" size="8" value="<?= $imp_11 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr12 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr12" id="itr12" class="t1" size="30" maxlength="49" value="<?= $itr12 ?>" readonly="readonly"></td>
			<td><input type="text" name="for12" id="for12" class="t1" size="10" value="<?= $for12 ?>" readonly="readonly"></td>
			<td><input type="text" name="q12" id="q12" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q12 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu12" id="iu12" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu12 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc12" id="sc12" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc12 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_12" id="imp_12" class="t2 somma" size="8" value="<?= $imp_12 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr13 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr13" id="itr13" class="t1" size="30" maxlength="49" value="<?= $itr13 ?>" readonly="readonly"></td>
			<td><input type="text" name="for13" id="for13" class="t1" size="10" value="<?= $for13 ?>" readonly="readonly"></td>
			<td><input type="text" name="q13" id="q13" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q13 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu13" id="iu13" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu13 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc13" id="sc13" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc13 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_13" id="imp_13" class="t2 somma" size="8" value="<?= $imp_13 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr14 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr14" id="itr14" class="t1" size="30" maxlength="49" value="<?= $itr14 ?>" readonly="readonly"></td>
			<td><input type="text" name="for14" id="for14" class="t1" size="10" value="<?= $for14 ?>" readonly="readonly"></td>
			<td><input type="text" name="q14" id="q14" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q14 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu14" id="iu14" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu14 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc14" id="sc14" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc14 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_14" id="imp_14" class="t2 somma" size="8" value="<?= $imp_14 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
			
			<? if ($itr15 != '') { ?>
			<tr class="righe">
			<td><input type="text" name="itr15" id="itr15" class="t1" size="30" maxlength="49" value="<?= $itr15 ?>" readonly="readonly"></td>
			<td><input type="text" name="for15" id="for15" class="t1" size="10" value="<?= $for15 ?>" readonly="readonly"></td>
			<td><input type="text" name="q15" id="q15" class="t2 somma" onKeyUp="SommaRiga(1)" size="3" value="<?= $q15 ?>" readonly="readonly"></td>
			<td><input type="text" name="iu15" id="iu15" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" size="6" value="<?= $iu15 ?>" readonly="readonly"></td>
			<td><input type="text" name="sc15" id="sc15" class="t2 somma" onKeyUp="Virgola(1)"  size="8" value="<?= $sc15 ?>" readonly="readonly"></td>
			<td><input type="text" name="imp_15" id="imp_15" class="t2 somma" size="8" value="<?= $imp_15 ?>" readonly="readonly"></td>
			</tr>
			<? } ?>
				
			
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Tot. Gen.</td>
			<td><input type="text" name="totale" class="t2" id="totale" size="7" value="<?php echo $totale ?>" readonly="readonly"></td>
		</tr>

		</tbody>
	</table> 
	

</div>
</div>

<?php
$sq2 = "SELECT * FROM allegati_c WHERE id_com = '$id_com'";
$rs2 = mysqli_query($mysqli,$sq2);
while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$url_file1 = mysqli_real_escape_string($mysqli, $row['url_file1']);
$url_file2 = mysqli_real_escape_string($mysqli, $row['url_file2']);
$url_file3 = mysqli_real_escape_string($mysqli, $row['url_file3']);
}
//var_dump($sq2);
?>


<div class="card-commesse">
  <div class="card-header">Gestione Allegati</div>
  <div class="card-block">

	<div class="row">
		
		<div class="col-md-4">
			<label class="control-label">Allegato 1 :</label>
			    <tr class="righe">
                    <td>
                        <?php if($url_file1){?>
                            <a target="_blank" href="<?php echo $url_file1; ?>">1) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento
                        <?php }?>
                    </td>
                </tr>
		</div>


		<div class="col-md-4">
			<label class="control-label">Allegato 2 :</label>
			        <td>
                        <?php if($url_file2){?>
                            <a target="_blank" href="<?php echo $url_file2; ?>">2) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento
                        <?php }?>
                    </td>
                </tr>
		</div>

		<div class="col-md-4">
			<label class="control-label">Allegato 3 :</label>
			        <td>
                        <?php if($url_file3){?>
                            <a target="_blank" href="<?php echo $url_file3; ?>">3) Visualizza documento</a>
                        <?php }else{?>
                            Nessun documento
                        <?php }?>
                    </td>
		</div>		

	</div>
	
</div>
</div><!--Close Div Gestione Allegati-->


	<div class="text-right">
		<button type="submit" name="submit" class="btn btn-success right">Stampa Commessa</button> 
	</div>
	  
</div><!--Close Form Container-->
</form><!--Close Form-->