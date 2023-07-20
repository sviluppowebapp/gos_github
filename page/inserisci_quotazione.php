<style>
hr{
	display: block;
	margin-top: 0.5em;
	margin-bottom: 0.5em;
	margin-left: auto;
	margin-right: auto;
	border-style: inset;
	border-width: 1px;

}

h3{
	color:#F68A00;
}

legend{
	font-family: Arial;
	font-size: 1.1em;
	color: #fff;
	background-color:#F68D55;
	padding: 5px;
	border-radius: 3px;
	height:35px;
}

fieldset{
	padding: 0px;
	margin-bottom: 30px;
}

textarea{
	background-image: url('icon/social_balloon.png');  /*Sfondo con immagine */
	background-repeat: no-repeat;
	/*background-attachment: fixed;*/
 	background-position: right top;
    font-size: 14px;
    height: 200px; /* Altezza */
	width:100%; /* Larghezza */
    overflow: hidden; /* disabilitare la scrollbar in IE */
	color: #F68D55; /* Colore del testo */
    font-family: Verdana, sans-serif; /* Tipo di carattere per il testo */
	display: block;
	margin-left: auto;
	margin-right: auto;
    border: 1px solid #F68D55; /* Bordo */
	border-radius: 10px;
    line-height: 30px; /* Altezza di riga */
    padding: 0 10px; /* Padding */
	text-transform: uppercase;
}
</style>

<form class="form" method="post" id="modulo" action="index.php?page=salva_quotazione" enctype="multipart/form-data">
	<div class="form-container">
		<div class="card-commesse">
		  <div class="card-header"><h3><center>GESTIONE QUOTAZIONI NOLEGGIO</center></h3></div>
			<div class="card-block">

		<fieldset>
    	<legend>Data quotazione</legend>
				<div class="row">
					<div class="col-md-2">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="datepicker1" name="data_quotazione" placeholder="Data Quotazione" required="required">
						  </div>
					</div>			
		</fieldset>	


		<fieldset>
    		<legend>Dati Identificativi Cliente</legend>
				<div class="row"><!--APRO LA ROW-->
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" aria-hidden="true" name="cliente" maxlength="30" required="required" placeholder="Società che richiede la quotazione">
						  </div>
					</div>

					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" aria-hidden="true" name="cliente" maxlength="30" required="required" placeholder="Referente Aziendale">
						  </div>
					</div>
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" aria-hidden="true" name="piva" maxlength="30" required="required" placeholder="Partita Iva">
						  </div>
					</div>
					</div><!--CHIUDO LA ROW-->
		</fieldset>
		
		
		<fieldset>
				<div class="row"><!--APRO LA ROW-->
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
						  </div>
					</div>
	
					<div class="col-md-4">
						<label class="sr-only" for="email">Email</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" placeholder="Email" >
							</div>
					</div>
				</div><!--CHIUDO LA ROW-->
		</fieldset>


		<fieldset>
    	<legend>Quotazione</legend>
				<div class="row">
					<div class="col-md-3">
						<label class="sr-only" for="stato_pren">Gestore</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
								<select class="form-control" select name="gestore" id="gestore" required="required" >
									<?php
										$sq1 = "SELECT * FROM gestore ORDER BY gestore ASC";
										$rs1 = $mysqli->query($sq1);
										echo "<option value=''>Società Noleggio...</option>";
										while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
										$gestore = mysqli_real_escape_string($mysqli, strtoupper($row['gestore']));
										echo "<option value='$gestore'>$gestore</option>";
										}
									?>
									</select>
							</div>
					</div>

					<div class="col-md-3">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="veicolo" placeholder="Veicolo Quotato" required="required">
						  </div>
					</div>

					<div class="col-md-2">
						<label class="sr-only" for="stato_pren">Gestore</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
								<select class="form-control" select name="gestore" id="gestore" required="required" >
									<?php
										$sq1 = "SELECT * FROM gestore ORDER BY gestore ASC";
										$rs1 = $mysqli->query($sq1);
										echo "<option value=''>Stato Quotazione...</option>";
										while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
										$gestore = mysqli_real_escape_string($mysqli, strtoupper($row['gestore']));
										echo "<option value='$gestore'>$gestore</option>";
										}
									?>
									</select>
							</div>
				</div>
			</fieldset>


			<fieldset>
    			<legend>Note</legend>
				<div class="row">
					<div class="col-12">
						<div class="form-group has-danger">
							<textarea name="note" id="note" maxlength="90" placeholder="Max 90 caratteri"></textarea>
						</div>
					</div>
				</div>
			</fieldset>

				<div class="text-right">
					<button type="submit" name="submit" class="btn btn-success right" onclick="return confirm('Confermi di voler caricare la quotazione ?')">Registra Quotazione</button>
				</div>

			</div>
		</div><!--Close Div card-commesse-->
	</div><!--Close Div Container-->
</form>