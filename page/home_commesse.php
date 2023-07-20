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
            <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Crea una nuova Commessa</b></div>
					<div class="card-block-home">
						<a href="index.php?page=inserisci_commessa"><img src="icon/registra_commessa_55.png"><br/></a>   
					</div>
				</div>
			</div>
				
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Ricerca una commessa</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="index.php?page=ricerca_commessa"><img src="icon/ricerca_commessa_55.png"><br/></a>  
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Comparazione Fatturato</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="index.php?page=fatturato"><img src="icon/fatturato_55.png"><br/></a>  
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Ritorna alla home</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="index.php?page=home"><img src="icon/logout_55.png"><br/></a>       
					</div>
				</div>
			</div>
		</div>		
</div><!--Chiudo il Container-->
		
		


	
		<!--div class="row">

			<!--div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home">Appuntamenti in Lavorazione</div>
					<div class="card-block-home">
						<a class="thumbnail" href="index.php?page=appuntamenti_lavorazione"><img src="icon/appuntamenti_lavorazione_55.png"><br/></a>       
					</div>
				</div>
			</div-->
			
			
			<!--div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home">Appuntamenti Accettazione</div>
					<div class="card-block-home">
						<a class="thumbnail" href="index.php?page=appuntamenti_accettazione"><img src="icon/attesa_accettazione_55.png"><br/></a>           
					</div>
				</div>
			</div-->