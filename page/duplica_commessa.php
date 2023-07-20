<?php

/* Recupero l'id della commessa interessata */
$id_com = (int)$_GET['id_com'];

$data_oggi=date("d/m/Y");


/* Recupero i dati della commessa inserita */
$sq1 = "SELECT * FROM commesse WHERE id_com = '$id_com'";
$rs1 = $mysqli->query($sq1);
$count = mysqli_num_rows($rs1);

/* Conto le righe per vedere se esiste la commessa */
if ($count == 0) {
echo "<p style='text-align:center;margin-top: 10%;'>Non esistono Commesse corrispondenti all'ID: $id_com</p>";

}else{

while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);
$piva = mysqli_real_escape_string($mysqli, $row['piva']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$dtscrev = mysqli_real_escape_string($mysqli, $row['dtscrev']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$telaio = mysqli_real_escape_string($mysqli, $row['telaio']);
$km = mysqli_real_escape_string($mysqli, $row['km']);



/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$indirizzo = trim(strip_tags(stripslashes($indirizzo)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */
 
 }
}

/*CONVERTO LA DATA RECUPERATA DAL CICLO WHILE NEL FORMATO GG/MM/AAAA */
$data = strtotime($data);
$data = date('d/m/Y', $data);

$dtscrev = strtotime($dtscrev);
$dtscrev = date('d/m/Y', $dtscrev);

?>

<?php include("js/cavicchi.js"); ?>

<form class="form" method="post" id="modulo" action="index.php?page=salva_commessa" enctype="multipart/form-data">

<div class="form-container">

<div class="card-commesse">
  <div class="card-header">Anagrafica Cliente</div>
  <div class="card-block">

	<div class="row">
		<div class="col-md-2">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data" required="required" value="<?= $data_oggi; ?>">
			  </div>
		</div>
		
		<div class="col-md-2">
		</div>	
		
		
		<label><strong>Data Scadenza Revisione</strong></span><br><span style="text-decoration:underline; color:red;">(Modificare solo se disponibile scadenza reale)</span></label>
		
		<div class="col-md-2">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker1" placeholder="Data Commessa" name="dtscrev" required="required" value="<?= $dtscrev; ?>">
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
				<input type="text" class="form-control" name="km" required="required" placeholder= "Km Veicolo" id="km" onkeyup="VerificaKm(this)">
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
							$sq1 = "SELECT * FROM tecnico ORDER BY n_tecnico ASC";
							$rs1 = $mysqli->query($sq1);
							echo "<option value=''> Seleziona Tecnico ... </option>"; 
							while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
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
							$sq1 = "SELECT * FROM tipo_pagamento ORDER BY stato_pag ASC";
							$rs1 = $mysqli->query($sq1);
							echo "<option value=''> Seleziona Pagamento </option>"; 
							while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
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
							$sq1 = "SELECT * FROM allegato ORDER BY allegato ASC";
							$rs1 = $mysqli->query($sq1);
							echo "<option value=''> Allegato </option>"; 
							while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
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
			<td>Aggiungi</td>
		</tr>

			<tr class="righe">
			<td><input type="text" name="itr1" id="itr1" class="t1" required="required" size="30" placeholder="Max 49 caratteri" maxlength="49" ></td>
			<td><input type="text" name="for1" id="for1" class="t1" size="10"></td>
			<td><input type="text" name="q1" required="required" class="t2 somma" onKeyUp="SommaRiga(1)" id="q1" size="3" value="0.0" placeholder="0"></td>
			<td><input type="text" name="iu1" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" id="iu1" size="6" value="0.0" placeholder="0.00"></td>
			<td><input type="text" name="sc1" class="t2 somma" onKeyUp="Virgola(1)" id="sc1" size="8" value="0.0" placeholder="sconto"></td>
			<td><input type="text" name="imp_1" id="imp_1" class="t2 somma" size="8" value="0.0" placeholder="0.00" readonly></td>
			<td><img src="images/add.png" name="add1" width="16" height="16" id="add1" class="add"></td>
			</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Tot. Gen.</td>
			<td><input type="text" name="totale" class="t2" id="totale" size="7" value="" placeholder="0.00" readonly></td>
		</tr>

		</tbody>
	</table> 
	

</div>
</div>

<div class="card-commesse">
  <div class="card-header">Gestione Allegati</div>
  <div class="card-block">

	<div class="row">
		
		<div class="col-md-4">
			<label class="control-label">Allegato 1</label>
			<input id="allegato1" name="allegato1" type="file" class="file file-loading" data-allowed-file-extensions='["pdf", "xls", "xlsx", "doc", "docx" ]'>
		</div>


		<div class="col-md-4">
			<label class="control-label">Allegato 2</label>
			<input id="allegato2" name="allegato2" type="file" class="file file-loading" data-allowed-file-extensions='["pdf", "xls", "xlsx", "doc", "docx" ]'>
		</div>

		<div class="col-md-4">
			<label class="control-label">Allegato 3</label>
			<input id="allegato3" name="allegato3" type="file" class="file file-loading" data-allowed-file-extensions='["pdf", "xls", "xlsx", "doc", "docx" ]'>
		</div>		

	</div>
	
</div>
</div><!--Close Div Gestione Allegati-->

	<div class="text-right">
		<button type="submit" name="submit" class="btn btn-success right">Registra Commessa</button> 
	</div>
	  
</div><!--Close Form Container-->
</form><!--Close Form-->