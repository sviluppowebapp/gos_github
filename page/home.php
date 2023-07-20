<?php
date_default_timezone_set('Europe/Rome');
$today = date("Y-m-d");
$mese = date("m");
?>

<br />


<?php
//RICAVO I RECORD DEL MESE CORRENTE CON DATA REVISIONE NON ANCORA SCADUTA
$cntrev = $cntrevsc = 0;
$sqlrev = "SELECT * FROM commesse WHERE YEAR(dtscrev) = YEAR(NOW()) AND MONTH(dtscrev)= MONTH(NOW()) and DAY(dtscrev) >= DAY(NOW()) GROUP BY targa";
$rsrev = $mysqli->query($sqlrev);
if ($rsrev) {
	$cntrev = mysqli_num_rows($rsrev);
}


// RICAVO I RECORD CON DATA REVISIONE SCADUTA ED ESCLUDO IL CONTEGGIO DEI NON VALORIZZATI
$sqlrevsc = "SELECT * FROM commesse WHERE dtscrev < NOW()-1 AND dtscrev <> '0000-00-00' GROUP BY targa LIMIT 20";
$rsrevsc = $mysqli->query($sqlrevsc);
if ($rsrevsc) {
	$cntrevsc = mysqli_num_rows($rsrevsc);
}

?>

<!--APRO UNA ROW COMPOSTA PER LA GESTIONE SCADENZE REVISIONI-->
<div class="container-home">
	<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-block">
					<div class="alert alert-success-home" role="alert">
						<h2><b>Monitoraggio Revisioni Ministeriali</b></h2>
					</div>
					<ul class="list-group">
						<li class="list-group-item justify-content-between">Veicoli con scadenza revisione questo mese (non ancora scaduta) <a href="index.php?page=scadenza_revisione&tipo=daeseguire"><span class="badge-home badge-default badge-pill"><?= $cntrev ?></span></a></li>
					</ul>
					<ul class="list-group">
						<li class="list-group-item justify-content-between">Visualizza 20 veicoli con data revisione scaduta: <a href="index.php?page=scadenza_revisione&tipo=scadute"><span class="badge-home badge-default badge-pill"><?= $cntrevsc ?></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Chiudo la riga scadenza revisioni-->

	<hr>

	<!--a href="index.php?page=lista_appuntamenti_oggi&tipo=accettazione&cliente=privato"-->


	<div class="clear"></div>

	<hr>

	<div class="row">
		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>GESTIONE COMMESSE</b></div>
				<div class="card-block-home">
					<a href="index.php?page=home_commesse"><img src="icon/gest_comm_64.png"><br /></a>
				</div>
			</div>
		</div>


		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>GESTIONE APPUNTAMENTI</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=home_appuntamenti"><img src="icon/gest_app_64.png"><br /></a>
				</div>
			</div>
		</div>


		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>GESTIONE PREVENTIVI</b></div>
				<div class="card-block-home">
					<a href="index.php?page=home_preventivi"><img src="icon/nuovo_preventivo_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>GESTIONE SISTEMA</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=home_sistema"><img src="icon/ricerca_commessa_55.png"><br /></a>
				</div>
			</div>
		</div>
	</div>
	<!--CHIUDO LA RIGA-->

	<div class="row">
		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>RICERCA COMMESSA</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=ricerca_commessa"><img src="icon/ricerca_commessa_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>APPUNTAMENTI OGGI</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=lista_appuntamenti_oggi&tipo=tutti"><img src="icon/appuntamenti_oggi_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>RICERCA INTERVENTO</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=ricerca_intervento"><img src="icon/ricerca_intervento_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>REGISTRA PROMEMORIA</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="http://www.salzanosrl.com/reminders" target="_blank"><img src="icon/promemoria_55.png"><br /></a>
				</div>
			</div>
		</div>
	</div>
	<!--CHIUDO LA RIGA-->

	<div class="row">
		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>LINK DISPOSITIVI ASSICURATIVI</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="index.php?page=home_dispositivi" target="_blank"><img src="icon/web_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>LINK GESTIONE FLOTTE</b></div>
				<div class="card-block-home">
					<a href="index.php?page=home_flotte" target="_blank"><img width="55" heigth="55" src="icon/noleggio.jpeg" class="img-responsive"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>LINK GESTIONE PNEUMATICI</b></div>
				<div class="card-block-home">
					<a href="index.php?page=home_pneus" target="_blank"><img width="55" heigth="55" src="icon/pneusico.png" class="img-responsive"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>NOLEGGIO</b></div>
				<div class="card-block-home">
					<a href="index.php?page=home_noleggio" target="_blank"><img width="55" heigth="55" src="icon/scnoleggio.jpg" class="img-responsive"><br /></a>
				</div>
			</div>
		</div>
	</div>
	<!--CHIUDO LA RIGA-->

	<div class="row">
		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>RUBRICA</b></div>
				<div class="card-block-home">
					<a href="../gos/rubrica/index.php" target="_blank"><img width="55" heigth="55" src="icon/rubrica.jpg" class="img-responsive"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="card-home">
				<div class="card-header-home"><b>ESCI</b></div>
				<div class="card-block-home">
					<a class="thumbnail" href="logout.php" onclick="return confirm('Confermi di voler uscire dal sistema ?')"><img src="icon/logout_55.png"><br /></a>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
		</div>

		<div class="col-sm-3">
		</div>
	</div>
	<!--CHIUDO LA RIGA-->
</div>
<!--CHIUDO IL CONTAINER-->