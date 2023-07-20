<?php
date_default_timezone_set('Europe/Rome');
$today = date("Y-m-d");
?>

<br />

<?php
$sq1 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'ATTESA ACCETTAZIONE' and tipo_pren = 'PRIVATO' ORDER BY id_app ASC";
$rs1 = $mysqli->query($sq1);
$cnt1 = mysqli_num_rows($rs1);

$sq2 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'LAVORAZIONE' and tipo_pren = 'PRIVATO' ORDER BY id_app ASC";
$rs2 = $mysqli->query($sq2);
$cnt2 = mysqli_num_rows($rs2);

$sq3 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'TERMINATO' and tipo_pren = 'PRIVATO' ORDER BY id_app ASC";
$rs3 = $mysqli->query($sq3);
$cnt3 = mysqli_num_rows($rs3);
?>

<div class="container-home">
<div class="row">
	  <div class="col-sm-3">
		<div class="card">
		  <div class="card-block">
				<div class="alert alert-success-home" role="alert"><h2>PRIVATI APPUNTAMENTI OGGI</h2></div>
				<ul class="list-group">
					<li class="list-group-item justify-content-between">Attesa Accettazione: <a href="index.php?page=lista_appuntamenti_oggi&tipo=accettazione&cliente=privato"><span class="badge-home badge-default badge-pill"><?= $cnt1 ?></span></a></li>
					<li class="list-group-item justify-content-between">In lavorazione: <a href="index.php?page=lista_appuntamenti_oggi&tipo=lavorazione&cliente=privato"><span class="badge-home badge-default badge-pill"><?= $cnt2 ?></span></a></li>
				</ul>
		  </div>
		</div>
	</div>

<?php
$sq4 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'ATTESA ACCETTAZIONE' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs4 = $mysqli->query($sq4);
$cnt4 = mysqli_num_rows($rs4);

$sq5 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'LAVORAZIONE' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs5 = $mysqli->query($sq5);
$cnt5 = mysqli_num_rows($rs5);

$sq6 = "SELECT * FROM appuntamenti WHERE data = '$today' AND stato_pren = 'TERMINATO' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs6 = $mysqli->query($sq6);
$cnt6 = mysqli_num_rows($rs6);

?>

<div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <div class="alert alert-success-home" role="alert"><h2>NOLEGGIO APPUNTAMENTI OGGI</h2></div>
		<ul class="list-group">
			<li class="list-group-item justify-content-between">Attesa Accettazione: <a href="index.php?page=lista_appuntamenti_oggi&tipo=accettazione&cliente=noleggio"><span class="badge-home badge-default badge-pill"><?= $cnt4 ?></span></a></li>
			<li class="list-group-item justify-content-between">In lavorazione: <a href="index.php?page=lista_appuntamenti_oggi&tipo=lavorazione&cliente=noleggio"><span class="badge-home badge-default badge-pill"><?= $cnt5 ?></span></a></li>
		</ul>
      </div>
    </div>
</div>

<?php
$sq7 = "SELECT * FROM appuntamenti WHERE stato_pren = 'ATTESA ACCETTAZIONE' and tipo_pren = 'privato' ORDER BY id_app ASC";
$rs7 = $mysqli->query($sq7);
$cnt7 = mysqli_num_rows($rs7);

$sq8 = "SELECT * FROM appuntamenti WHERE stato_pren = 'LAVORAZIONE' and tipo_pren = 'privato' ORDER BY id_app ASC";
$rs8 = $mysqli->query($sq8);
$cnt8 = mysqli_num_rows($rs8);

$sq9 = "SELECT * FROM appuntamenti WHERE stato_pren = 'TERMINATO' and tipo_pren = 'privato' ORDER BY id_app ASC";
$rs9 = $mysqli->query($sq9);
$cnt9 = mysqli_num_rows($rs9);

?>

<div class="col-sm-3">
		<div class="card">
		  <div class="card-block">
			<div class="alert alert-warning-home" role="alert"><h2>PRIVATI APPUNTAMENTI TOTALI</h2></div>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">Attesa Accettazione: <a href="index.php?page=appuntamenti_privati&tipo=accettazione"><span class="badge-home badge-default badge-pill"><?= $cnt7 ?></span></a></li>
				<li class="list-group-item justify-content-between">In lavorazione: <a href="index.php?page=appuntamenti_privati&tipo=lavorazione"><span class="badge-home badge-default badge-pill"><?= $cnt8 ?></span></a></li>
			</ul>
		</div>
	</div>
</div>

<?php
$sq10 = "SELECT * FROM appuntamenti WHERE stato_pren = 'ATTESA ACCETTAZIONE' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs10 = $mysqli->query($sq10);
$cnt10 = mysqli_num_rows($rs10);

$sq11 = "SELECT * FROM appuntamenti WHERE stato_pren = 'LAVORAZIONE' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs11 = $mysqli->query($sq11);
$cnt11 = mysqli_num_rows($rs11);

$sq12 = "SELECT * FROM appuntamenti WHERE stato_pren = 'TERMINATO' and tipo_pren = 'noleggio' ORDER BY id_app ASC";
$rs12 = $mysqli->query($sq12);
$cnt12 = mysqli_num_rows($rs12);
?>

	<div class="col-sm-3">
		<div class="card">
		  <div class="card-block">
			<div class="alert alert-warning-home" role="alert"><h2>NOLEGGIO APPUNTAMENTI TOTALI</h2></div>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">Attesa Accettazione: <a href="index.php?page=appuntamenti_noleggio&tipo=accettazione"><span class="badge-home badge-default badge-pill"><?= $cnt10 ?></span></a></li>
				<li class="list-group-item justify-content-between">In lavorazione: <a href="index.php?page=appuntamenti_noleggio&tipo=lavorazione"><span class="badge-home badge-default badge-pill"><?= $cnt11 ?></span></a></li>
			</ul>
		  </div>
		</div>
	  </div>
	</div><!--Chiudo la prima Row-->


	

<div class="clear"></div>

        <hr>
		
		<div class="row">
      <div class="col-sm-6">
				<div class="card-home">
				<div class="card-header-home"><b>Carica nuovo Cliente - Società</b></div>
					<div class="card-block-home">
						<a href="index.php?page=ins_cliente_noleggio"><img src="icon/cliente_noleggio.png"><br/></a>   
					</div>
				</div>
			</div>
				
			<div class="col-sm-6">
				<div class="card-home">
				<div class="card-header-home"><b>Verifica Scadenza Contratto</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="index.php?page=scadenza_contratto"><img src="icon/contratto_noleggio.jpg"><br/></a>  
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row"><!--APRO LA ROW-->
      <div class="col-sm-6">
				<div class="card-home">
				<div class="card-header-home"><b>Gestione Quotazioni(DISPONIBILE A BREVE)</b></div>
					<div class="card-block-home">
						<a href="#"><img src="icon/preventivi.png"><br/></a>   
					</div>
				</div>
			</div>
		</div> <!--CHIUDO LA ROW-->

		<div class="row"><!--APRO LA ROW-->
      <div class="col-sm-3">
				<div class="card-noleggio">
				<div class="card-header-home"><b>Quotatore Leaseplan</b></div>
					<div class="card-block-home">
						<a href="https://www.leaseplan.it/amministrazione/index.php?sxy=2" target="_black"><img src="icon/leaseplan.png" class="img-fluid"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
				
			<div class="col-sm-3">
				<div class="card-noleggio">
				<div class="card-header-home"><b>Quotatore Ald</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="https://www.aldquoter.it/site/login" target="_black"><img src="icon/ald.jpg" class="img-fluid"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-noleggio">
				<div class="card-header-home"><b>Quotatore Leasys</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="https://touch.leasys.com" target="_black"><img src="icon/leasys_nol.png" class="img-fluid"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		</div><!--CHIUDO LA ROW-->
	
		<div class="row"><!--APRO LA ROW-->			
			<div class="col-sm-12">
				<div class="card-home">
				<div class="card-header-home"><b>Esci</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="index.php?page=home"><img src="icon/exit_noleggio.png"><br/></a>       
					</div>
				</div>
			</div>
		</div>
</div><!--Chiudo il Container-->

