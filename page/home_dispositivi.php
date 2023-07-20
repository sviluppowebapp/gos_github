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
			<div class="alert alert-warning-home" role="alert"><h2>NOLEGGIO APPUNTAMENTO TOTALI</h2></div>
			<ul class="list-group">
				<li class="list-group-item justify-content-between">Attesa Accettazione: <a href="index.php?page=appuntamenti_noleggio&tipo=accettazione"><span class="badge-home badge-default badge-pill"><?= $cnt10 ?></span></a></li>
				<li class="list-group-item justify-content-between">In lavorazione: <a href="index.php?page=appuntamenti_noleggio&tipo=lavorazione"><span class="badge-home badge-default badge-pill"><?= $cnt11 ?></span></a></li>
			</ul>
		  </div>
		</div>
	  </div>
	</div><!--Chiudo la prima Row-->



<div class="clear"></div>

	<style>
	p {
	 margin: 0
	} 
	</style>

        <hr>
		
		<div class="row">
            <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>OCTOTELEMATICS</b></div>
					<div class="card-block-home">
						<a href="https://www.octotelematics.it/octo/login.jsp" target="_blank"><img width = "150" src="icon/assicurazioni/octo.jpg" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
				
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>VIASAT</b></div>
					<div class="card-block-home">
						 <a href="https://www.viasatonline.it/dte/" target="_blank"><img width="170" src="icon/assicurazioni/viasat.jpg" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>ALLIANZ</b></div>
					<div class="card-block-home">
						 <a href="https://www.allianzppu.com/PPUWebPortal/login.jsf" target="_blank"><img width="100" src="icon/assicurazioni/allianz.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>VODAFONE</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="https://installatori.automotive.vodafone.com/tbm" target="_blank"><img width="160" src="icon/assicurazioni/vodafone.jpg" class="img-responsive"><br/></a>
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>				
					</div>
				</div>
			</div>
		</div><!--CHIUDO LA PRIMA RIGA-->

		<div class="row"><!--APRO LA SECONDA RIGA-->
		
		
		    <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>DIMISA</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="http://dms.gruppoac.it/login" target="_blank"><img width="160" src="icon/assicurazioni/dms.png" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
		    <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>ALFAEVOLUTION</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="https://partners.unipoltech.com" target="_blank"><img width="160" src="icon/assicurazioni/alfaevolution_n.png" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
		    <div class="col-sm-3">
				<div class="card-home">
					<div class="card-header-home"><b>INFOMOBILITY</b></div>
						<div class="card-block-home">
							<a class="thumbnail" href="https://installatori.infomobility.it/" target="_blank"><img width="160" src="icon/assicurazioni/infomob_n.png" class="img-responsive"><br/></a>   
						</div>
						<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
            <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>OCTOTELEMATICS - GENIUS</b></div>
					<div class="card-block-home">
						<a href="https://www.octotelematics.it/octo/login.jsp" target="_blank"><img width = "150" src="icon/assicurazioni/octo.jpg" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>	
		</div> <!--CHIUDO LA SECONDA RIGA-->
		
		<div class="row"> <!--Apro la terza riga-->
		<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>G-EVOLUTION</b></div>
					<div class="card-block-home">
						<a href="https://bit.ly/3bHXAkC" target="_blank"><img width = "150" src="icon/assicurazioni/gevolution.png" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>


		<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>BACK TO HOME</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="index.php?page=home"><img width="106" src="icon/assicurazioni/back.png" class="img-responsive"><br/></a>   
					</div>
				</div>
			</div>

		</div><!--Chiudo la terza riga-->
		
</div><!--Chiudo il Container-->