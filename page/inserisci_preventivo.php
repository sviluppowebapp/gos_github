<?php include("js/cavicchi.js"); ?>

<form class="form" name="insPreventivo" method="post" id="modulo" action="index.php?page=salva_preventivo" enctype="multipart/form-data">

<div class="form-container">

<div class="card-commesse">
  <div class="card-header">Anagrafica Cliente</div>
  <div class="card-block">

	<div class="row">
		<div class="col-md-2">
			  <div class="input-group">
				<span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker" placeholder="Data Preventivo" name="data" autocomplete="off" required >
			  </div>
		</div>
	</div>
	  
	  <hr>
	
	<div class="row">
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" aria-hidden="true" name="cliente" required="required" placeholder="Cognome Nome Cliente">
			  </div>
		</div>
		
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="email" placeholder="Email">
			  </div>
		</div>	

		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="tel" placeholder="Telefono" required>
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
				<input type="text" class="form-control" name="veicolo" placeholder="Veicolo" required>
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Targa">Targa</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="targa" placeholder="Targa Veicolo" id="targa" maxlength="8" required>
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Km">Km al preventivo</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="km" placeholder= "Km al preventivo" id="km" required>
			  </div>
		</div>	
	</div>
	  
	  <hr>
	
	
<div class="row">
		
		<div class="col-md-3">
				 <label class="sr-only" for="n_accettatore">Preventivato da</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
						<select class="form-control" id="n_accettatore" name="n_accettatore" required>
						<?php 
							$sq1 = "SELECT * FROM accettatore ORDER BY n_accettatore ASC";
							$rs1 = $mysqli->query($sq1);
							echo "<option value=''> Preventivato da: </option>"; 
							while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
							$n_accettatore = mysqli_real_escape_string($mysqli, strtoupper($row['n_accettatore']));
							echo "<option value='$n_accettatore'>$n_accettatore</option>";
							}
						?>
						</select>
				</div>
				
		</div>
		
		<div class="col-md-3">
				 <label class="sr-only" for="n_tecnico">Tecnico</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
						<select class="form-control" id="n_tecnico" name="n_tecnico" required>
						<?php 
							$sq10 = "SELECT * FROM tecnico ORDER BY n_tecnico ASC";
							$rs10 = $mysqli->query($sq10);
							echo "<option value='OPERATORE PREVENTIVI'>OPERATORE PREVENTIVI</option>"; 
							while ($row = $rs10->fetch_array(MYSQLI_ASSOC)) {
							$n_tecnico = mysqli_real_escape_string($mysqli, strtoupper($row['n_tecnico']));
							echo "<option value='$n_tecnico'>$n_tecnico</option>";
							}
						?>
						</select>
				</div>	
		</div>
		
		<div class="col-md-3">
				 <label class="sr-only" for="pagamento">Pagamento</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
						<select class="form-control" id="pagamento" name="pagamento" required>
						<?php 
							$sq11 = "SELECT * FROM tipo_pagamento ORDER BY stato_pag ASC";
							$rs11 = $mysqli->query($sq11);
							echo "<option value='Non Definito'>NON DEFINITO</option>"; 
							while ($row = $rs11->fetch_array(MYSQLI_ASSOC)) {
							$stato_pag = mysqli_real_escape_string($mysqli, strtoupper($row['stato_pag']));
							echo "<option value='$stato_pag'>$stato_pag</option>";
							}
						?>
						</select>
				</div>	
		</div>
		
		<div class="col-md-3">
				 <label class="sr-only" for="allegato">Allegato</label>
				 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
						<select class="form-control" id="allegato" name="allegato" required>
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
			<td><b>Intervento</b></td>
			<td><b>Fornitore</b></td>
			<td><b>Q.t&agrave;</b></td>
			<td><b>Unitario</b></td>
			<td><b>Sconto %</b></td>
			<td><b>Totale</b></td>
			<td><b>Aggiungi</b></td>
		</tr>

		<tr class="righe">
			<td><input type="text" name="itr1" id="itr1" class="t1" size="30" placeholder="Max 49 caratteri" maxlength="49" required ></td>
			<td><input type="text" name="for1" id="for1" class="t1" size="10"></td>
			<td><input type="text" name="q1" class="t2 somma" onKeyUp="SommaRiga(1)" id="q1" size="3" value="0.0" placeholder="0" required></td>
			<td><input type="text" name="iu1" class="t2 somma" onKeyUp="SommaRiga(1)" onBlur="Format(1)" id="iu1" size="6" value="0.0" placeholder="0.00" autocomplete="off"></td>
			<td><input type="text" name="sc1" class="t2 somma" onKeyUp="Virgola(1)" id="sc1" size="8" value="0.0" placeholder="sconto" autocomplete="off"></td>
			<td><input type="text" name="imp_1" id="imp_1" class="t2 somma" size="8" value="0.0" placeholder="0.00" readonly></td>
			<td><img src="images/add.png" name="add1" width="16" height="16" id="add1" class="add"></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Tot. Generale</td>
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
		<button type="submit" class="btn btn-success right" onclick="if( confirm('Confermi registrazione preventivo ?') ){this.form.submit();}">Registra Preventivo</button>  
	</div>
	

	
	  
</div><!--Close Form Container-->
</form><!--Close Form-->