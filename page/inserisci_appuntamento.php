<script type="text/javascript">
	function soloInteri(campo) {
		var pattern = /^[0-9]{1,4}$/;
		var c = campo.value
		if (!c.match(pattern) || parseInt(c) > 3000) {
			alert('Inserire solo il numero di minuti')
			campo.value = 0;
			campo.focus();
		}
	}
</script>

<style>
	@-webkit-keyframes blinker {
		0% {
			opacity: 0.3;
		}

		50% {
			opacity: 1.0;
		}

		100% {
			opacity: 0.3;
		}
	}

	.css3_blink {
		-webkit-animation-name: blinker;
		-webkit-animation-iteration-count: infinite;
		-webkit-animation-timing-function: cubic-bezier(.5, 0, 1, 1);
		-webkit-animation-duration: 1.7s;
		color: green;
	}

	.container-calcolo-ore {
		display: flex;
		width: 90%;
		background: #000;
		margin: 20px auto 0px auto;
		border-radius: 2px;
	}

	.descrizione {
		width: 50%;
		text-align: right;
		text-decoration: blink;
	}

	.descrizione>h3 {
		margin-top: 3px;
		padding: 10px;
		color: yellow;
		font-size: 1.2em;
		font-weight: bold
	}

	.calcolo {
		padding: 10px;
		width: 50%;
		text-align: left;
	}
</style>


<div class="container-calcolo-ore">
	<div class="descrizione">
		<h3 class="css3_blink">Esegui conversione rapida da ore a minuti</h3>
	</div>
	<div class="calcolo">
		<div id="oreminuti">
			<input type="number" min='0' max='60' name="ore" id="ore" placeholder="Inserisci Ore">
			<input type="number" min='0' max='60' name="minuti" id="minuti" placeholder="Inserisci Minuti">
			<input type="text" name="minutiTot" id="minutiTot" value="0">
		</div>
	</div>
</div>


<script>
	"use strict";
	const oreminuti = document.getElementById('oreminuti');
	const minutiTot = document.getElementById('minutiTot');
	oreminuti.addEventListener('input', calcMinutiTotali);

	function calcMinutiTotali() {
		if (+ore.value > 60 || +ore.value < 0) {
			alert('Ore dev\'essere compreso tra 0 e 60');
			ore.value = 0;
		}
		if (+minuti.value > 60 || +minuti.value < 0) {
			alert('Minuti dev\'essere compreso tra 0 e 60');
			minuti.value = 0;
		}
		minutiTot.value = (+ore.value * 60) + +minuti.value;
	}
</script>




<form class="form" method="post" id="modulo" action="index.php?page=salva_appuntamento" enctype="multipart/form-data">

	<div class="form-container">

		<div class="card-commesse">
			<div class="card-header">
				<h3>
					<center>REGISTRA UN NUOVO APPUNTAMENTO</center>
				</h3>
			</div>
			<div class="card-block">

				<div class="row">
					<div class="col-md-4">
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="datepicker" placeholder="Data Prenotazione" name="data" required="required" autocomplete="off">
						</div>
					</div>

					<div class="col-md-4">
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="far fa-clock" aria-hidden="true"></i></span>
							<input type="text" class="form-control timepicker" id="timepicker" placeholder="Ora Prenotazione ..." name="ora" required="required">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="tipo_pren">Tipo Cliente</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
							<select class="form-control" select name="tipo_pren" id="tipo_pren" required="required">
								<?php
								$sq2 = "SELECT * FROM tipo_prenotazione ORDER BY tipo_pren ASC";
								$rs2 = $mysqli->query($sq2);
								echo "<option value=''> Tipo Cliente ... </option>";
								while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
									$tipo_pren = mysqli_real_escape_string($mysqli, strtoupper($row['tipo_pren']));
									echo "<option value='$tipo_pren'>$tipo_pren</option>";
								}
								?>
							</select>
						</div>

					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" aria-hidden="true" name="cliente" id="cliente" maxlength="30" required="required" placeholder="Cognome Nome Cliente">
						</div>
					</div>

					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="veicolo" id="veicolo" placeholder="Marca Modello Veicolo" required="required">
						</div>
					</div>

					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="telefono" value="00000" id="telefono" required="required" placeholder="Telefono">
						</div>
					</div>

				</div>

				<hr>

				<div class="row">
					<div class="col-md-4">
						<label class="sr-only" for="stato_pren">Stato Prenotazione</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
							<select class="form-control" select name="stato_pren" id="stato_pren" required="required">
								<?php
								$sq3 = "SELECT * FROM stato_prenotazione ORDER BY stato_pren ASC";
								$rs3 = $mysqli->query($sq3);
								echo "<option value=''> Stato Prenotazione ... </option>";
								while ($row = $rs3->fetch_array(MYSQLI_ASSOC)) {
									$stato_pren = mysqli_real_escape_string($mysqli, $row['stato_pren']);
									echo "<option value='$stato_pren'>$stato_pren</option>";
								}
								?>
							</select>
						</div>

					</div>

					<div class="col-md-4">
						<label class="sr-only" for="stato_pren">Gestore</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
							<select class="form-control" select name="gestore" id="gestore" required="required">
								<?php
								$sq1 = "SELECT * FROM gestore ORDER BY gestore ASC";
								$rs1 = $mysqli->query($sq1);
								echo "<option value=''> Gestore </option>";
								while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
									$gestore = mysqli_real_escape_string($mysqli, strtoupper($row['gestore']));
									echo "<option value='$gestore'>$gestore</option>";
								}
								?>
							</select>
						</div>

					</div>

					<div class="col-md-4">
						<label class="sr-only" for="tipo_lavorazione">Tipo Lavorazione</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
							<select class="form-control" select name="tipo_lavorazione" id="tipo_lavorazione" required="required">
								<?php
								$sq4 = "SELECT * FROM tipo_lavorazione ORDER BY tipo_lav ASC";
								$rs4 = $mysqli->query($sq4);
								echo "<option value=''> Tipo lavorazione ... </option>";
								while ($row = $rs4->fetch_array(MYSQLI_ASSOC)) {
									$tipo_lavorazione = mysqli_real_escape_string($mysqli, strtoupper($row['tipo_lav']));
									echo "<option value='$tipo_lavorazione'>$tipo_lavorazione</option>";
								}
								?>
							</select>
						</div>

					</div>
				</div>

				<hr>

				<div class="row">

					<div class="col-md-4">
						<label class="sr-only" for="targa">Targa</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="targa" placeholder="Inserisci la targa del veicolo">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="tlav">tlav</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="tlav" id="tlav" value="0" placeholder="Ore di lavorazione espresse in minuti" onchange="soloInteri(this)">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="email">Email</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fas fa-envelope-open-text" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" placeholder="Email">
						</div>
					</div>

				</div>

				<hr>


				<div class="row">
					<div class="col-12">
						<div class="form-group has-danger">
							<label for="note">Inserisci Lamentato</label>
							<textarea class="form-control" name="note" id="note" rows="5" maxlength="170" placeholder="Max 170 caratteri"></textarea>
						</div>
					</div>
				</div>



			</div>
		</div>
		<!--Close Div card-commesse-->

		<div class="text-right">
			<button type="submit" name="submit" class="btn btn-success right" onclick="return confirm('Confermi la registrazione appuntamento ?')">Registra Appuntamento</button>
		</div>

		<div class="text-right">
			<button type="submit" name="submit" class="btn btn-success right-privacy" onclick="window.open('privacy/privacy.pdf','')">Stampa Privacy</button>
		</div>
	</div>
	<!--Close Div Container-->
</form>