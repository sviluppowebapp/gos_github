<?php

function ClientIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if (isset($_GET['id_app'])) {
	$id_app = (int)$_GET['id_app'];
	$sql1 = "SELECT * FROM appuntamenti WHERE id_app = '$id_app'";
	$res1 = $mysqli->query($sql1);



	while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
		$id_app = mysqli_real_escape_string($mysqli, $row['id_app']);
		$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
		$data = mysqli_real_escape_string($mysqli, $row['data']);
		$ora = mysqli_real_escape_string($mysqli, $row['ora']);
		$gestore = mysqli_real_escape_string($mysqli, $row['gestore']);
		$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
		$targa = mysqli_real_escape_string($mysqli, $row['targa']);
		$tlav = mysqli_real_escape_string($mysqli, $row['tlav']);
		$stato_pren = mysqli_real_escape_string($mysqli, $row['stato_pren']);
		$tipo_pren = mysqli_real_escape_string($mysqli, $row['tipo_pren']);
		$tipo_lavorazione = mysqli_real_escape_string($mysqli, $row['tipo_lavorazione']);
		$telefono = mysqli_real_escape_string($mysqli, $row['telefono']);
		$note = mysqli_real_escape_string($mysqli, $row['note']);
		$email = mysqli_real_escape_string($mysqli, $row['email']);
		$data = strtotime($data);
		$data = date('d/m/Y', $data);
	}


	/* RECUPERO I DATI DAL FORM */
	if (isset($_POST['submit'])) {
		$id_app = (int)$_GET['id_app'];

		/*EVITO LA STAMPA DEL CARATTERE RN*/
		$veicolo = trim(str_replace("\r\n", ' ', $veicolo));
		$note = trim(str_replace("\r\n", ' ', $note));

		function pulisci($stringa, $mysqli)
		{
			return $mysqli->real_escape_string(trim(strip_tags(strtoupper($stringa))));
		}

		foreach ($_POST as $key => $value) {
			$_POST[$key] = pulisci($value, $mysqli);
		}

		extract($_POST);
		$ipadd_mod = ClientIP();
		$sql2 = "UPDATE appuntamenti SET ipadd_mod = '{$ipadd_mod}', veicolo = '$veicolo', targa = '$targa', data = STR_TO_DATE('$data', '%d/%m/%Y'), ora = '$ora', cliente = '$cliente', tlav = '$tlav', telefono = '$telefono', gestore = '$gestore', tipo_pren = '$tipo_pren', tipo_lavorazione = '$tipo_lavorazione', stato_pren = '$stato_pren', note = '$note', email = '$email' WHERE id_app = '$id_app'";
		$res2 = $mysqli->query($sql2);

		if (!$res2) {
			echo "<p style='margin-top: 40px;text-align:center;'>Errore nella <b>QUERY</b> $sql2</p>";
		} else {

			$messaggio =
				"<div class = 'container-ricerca-nulla'>";
			"<div class='success'>Appuntamento aggiornato con successo! Attendi..</div>";
			"</div>";

			echo "<meta http-equiv='refresh' content='2;url=index.php?page=lista_appuntamenti&id_app=$id_app'>";
		}
	}
}
?>


<? echo $messaggio; ?>

<script type="text/javascript">
	function soloInteri(campo) {
		var pattern = /^[0-9]{1,4}$/;
		var c = campo.value
		if (!c.match(pattern) || parseInt(c) > 1000) {
			alert('Inserire solo il numero di minuti')
			campo.value = 0;
			campo.focus();
		}
	}

</script>

<form class="form" method="post" id="modulo" action="" enctype="multipart/form-data">

	<div class="form-container">

		<div class="card-commesse">
			<div class="card-header">Modifica Appuntamento</div>
			<div class="card-block">

				<div class="row">
					<div class="col-md-4">
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data" required="required" value="<?= $data; ?>">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="ora">Ora Prenotazione</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
							<input type="text" name="ora" class="timepicker" value="<?= $ora; ?>" required="required">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="tipo_pren">Tipo Cliente</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
							<select class="form-control" select name="tipo_pren" id="tipo_pren" required="required">
								<?php
								echo "<option value='$tipo_pren'>$tipo_pren</option>";
								$sq1 = "SELECT * FROM tipo_prenotazione WHERE tipo_pren != '$tipo_pren' ORDER BY tipo_pren ASC";
								$rs1 = $mysqli->query($sq1);
								echo "<option value=''> Tipo Cliente ... </option>";
								while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
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
							<input type="text" class="form-control" aria-hidden="true" name="cliente" required="required" placeholder="Nome Cognome Cliente" value="<?= $cliente = str_replace('\\', '', $cliente); ?>">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="Veicolo">Veicolo</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="veicolo" required="required" placeholder="Veicolo" value="<?= $veicolo = str_replace('\\', '', $veicolo); ?>">
						</div>
					</div>

					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?= $telefono; ?>">
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
								echo "<option value='$stato_pren'>$stato_pren</option>";
								$sq2 = "SELECT * FROM stato_prenotazione WHERE stato_pren != '$stato_pren' ORDER BY stato_pren ASC";
								$rs2 = $mysqli->query($sq2);
								echo "<option value=''> Stato Prenotazione ... </option>";
								while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
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
								echo "<option value='$gestore'>$gestore</option>";
								$sq3 = "SELECT * FROM gestore WHERE gestore != '$gestore' ORDER BY gestore ASC";
								$rs3 = $mysqli->query($sq3);
								echo "<option value=''> Gestore </option>";
								while ($row = $rs3->fetch_array(MYSQLI_ASSOC)) {
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
								echo "<option value='$tipo_lavorazione'>$tipo_lavorazione</option>";
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
							<input type="text" class="form-control" name="targa" placeholder="Inserisci la targa del veicolo" value="<?= $targa; ?>">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="email">Email</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fas fa-envelope-open-text" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" placeholder="Email" value="<?= $email; ?>">
						</div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="tlav">tlav</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="tlav" id="tlav" placeholder="Ore di lavorazione espresse in minuti" value="<?= $tlav; ?>" onchange="soloInteri(this)">
						</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-12">
						<div class="form-group has-danger">
							<label for="note">Inserisci Lamentato</label>
							<textarea class="form-control" name="note" id="note" rows="5" maxlength="170" placeholder="Max 170 caratteri" required="required"> <?= $note = str_replace('\\', '', $note); ?></textarea>
						</div>
					</div>
				</div>

			</div>
			<!--Close Div card-block-->
		</div>
		<!--Close Div card-commesse-->
		<div class="clear"></div>

		<div class="text-right">
			<button type="submit" name="submit" class="btn btn-success right" onclick="if(confirm('Confermi la modifica della commessa ?') ){this.form.submit();}">Modifica Appuntamento</button>
		</div>

		<div class="text-right">
			<button type="submit" name="privacy" class="btn btn-success right-privacy" onclick="window.open('privacy/privacy.pdf','')">Stampa Privacy</button>
		</div>
	</div>
	<!--Close Div Container-->
</form>