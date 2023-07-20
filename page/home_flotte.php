<?php
date_default_timezone_set('Europe/Rome');
$today = date("Y-m-d");
?>

<br/>

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

	<style>
	p {
	 margin: 0
	} 
	</style>
    
	    <hr>
		
		<div class="row"><!--APRO LA PRIMA RIGA-->
            <div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>ALD WEB-RELIEF/MEC/</b></div>
					<div class="card-block-home">
						<a href="http://ald5.wr.serviziauto.it/" target="_blank"><img width="150" height="150" src="icon/ald.jpg" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>ALD WEB-SUPPLIER|TICKET|FATT</b></div>
					<div class="card-block-home">
						 <a href="http://www.aldportalefornitori.com/italian/" target="_blank"><img width="150" height="150" src="icon/ald.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>NEMO</b></div>
					<div class="card-block-home">
						 <a href="https://nemo.aldautomotive.it" target="_blank"><img width="150" height="150" src="icon/logo-nemo.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>			

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>NEMO</b></div>
					<div class="card-block-home">
						 <a href="https://nemo.aldautomotive.it" target="_blank"><img width="150" height="150" src="icon/logo-nemo.jpg" class="img-responsive"><br/></a> 
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
				<div class="card-header-home"><b>NEMO</b></div>
					<div class="card-block-home">
						 <a href="https://nemo.aldautomotive.it" target="_blank"><img width="150" height="150" src="icon/logo-nemo.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>NEMO</b></div>
					<div class="card-block-home">
						 <a href="https://nemo.aldautomotive.it" target="_blank"><img width="150" height="150" src="icon/logo-nemo.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>NEMO INVOICING</b></div>
					<div class="card-block-home">
						 <a href="https://nemo.aldautomotive.it" target="_blank"><img width="150" height="150" src="icon/logo-nemo.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>HERTZ ITALIANA</b></div>
					<div class="card-block-home">
						 <a href="https://hertz.sdmain.com/webcar/MainForm.wgx" target="_blank"><img width="150" height="150"src="icon/hertz.png" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		</div> <!--CHIUDO LA SECONDA RIGA-->	

		
		<div class="row"><!--APRO LA TERZA RIGA-->
		
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>CAR SERVER</b></div>
					<div class="card-block-home">
						 <a href="http://michelangelo.carserver.it/Account/Login" target="_blank"><img width="150" height="150" src="icon/carserver.svg" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>MR FLEET CARROZZERIA</b></div>
					<div class="card-block-home">
						 <a href="http://www.mrfleet.it/rete/login.php" target="_blank"><img width="150" height="150" src="icon/mrfleet.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>MR FLEET MECCANICA</b></div>
					<div class="card-block-home">
						 <a href="http://www.mrfleet.it/rete/login.php" target="_blank"><img width="150" height="150" src="icon/mrfleet.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>SIFA'</b></div>
					<div class="card-block-home">
						 <a href="https://rfmsifa.fermotecnico.it/Login" target="_blank"><img width="150" height="150" src="icon/sifa.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		</div><!--CHIUDO LA TERZA RIGA-->

			<div class="row"><!--APRO LA QUINTA RIGA-->	
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>LINK-ENTRY-ADMIN</b></div>
					<div class="card-block-home">
						 <a href="https://linkentry.fiat.com" target="_blank"><img width="150" height="150"src="icon/logo_fca.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					
					</div>
				</div>
			</div>
	
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>LINK-ENTRY-PRINCIPALE</b></div>
					<div class="card-block-home">
						 <a href="https://linkentry.fiat.com" target="_blank"><img width="150" height="150"src="icon/logo_fca.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>LINK-ENTRY - 2^ MICROPOD</b></div>
					<div class="card-block-home">
						 <a href="https://app.e.fcawitech.com/wt2/auth/login.html" target="_blank"><img width="150" height="150"src="icon/logo_fca.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Web-Academy (Amedeo)</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="https://linkentry.fiat.com" target="_blank"><img width="250" height="150" src="icon/logo_web_academy.jpg" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		</div><!--CHIUDO LA QUARTA RIGA-->

		<div class="row"><!--APRO LA QUINTA RIGA-->
		
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>Web-Academy Marco</b></div>
					<div class="card-block-home">
						 <a class="thumbnail" href="https://linkentry.fiat.com" target="_blank"><img width="250" height="150" src="icon/logo_web_academy.jpg" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>VETRINA FERRAJOLI</b></div>
					<div class="card-block-home">
						 <a href="https://www.ferrajoliparts.com" target="_blank"><img width="150" height="150" src="icon/vetrina.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>ASCONAUTO</b></div>
					<div class="card-block-home">
						 <a href="https://areariservata.csoftonline.it/" target="_blank"><img width="150" height="150" src="icon/asconauto.jpg" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>AITECPLUS</b></div>
					<div class="card-block-home">
						 <a href="https://aitecsrl.net/wp-login.php" target="_blank"><img width="150" height="150" src="icon/aitecplus.png" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		</div><!--CHIUDO LA QUINTA RIGA-->
	
			<div class="row"><!--APRO LA SESTA RIGA-->
			
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>LEASEPLAN - STOP & GO</b></div>
					<div class="card-block-home">
						<a class="thumbnail" href="https://portal.leaseplan.it" target="_blank"><img width="150" height="150" src="icon/leaseplan.png" class="img-responsive"><br/></a>   
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>
		
			<div class="col-sm-3">
					<div class="card-home">
					<div class="card-header-home"><b>ACCESSO PSA SERVICE BOX</b></div>
						<div class="card-block-home">
							 <a href="https://public.servicebox-parts.com" target="_blank"><img width="150" height="150" src="icon/service_box_psa.jpg" class="img-responsive"><br/></a> 
						</div>
						<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
						</div>
					</div>
			</div>
			
			<div class="col-sm-3">
					<div class="card-home">
					<div class="card-header-home"><b>VOLKSWAGEN FLEET SERVICE</b></div>
						<div class="card-block-home">
							 <a href="https://accessodealer.vwfs.it/VWLFleet/login.aspx" target="_blank"><img width="150" height="150" src="icon/volkswagen-logo.png" class="img-responsive"><br/></a> 
						</div>
						<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
						</div>
					</div>
			</div>
			
			<div class="col-sm-3">
					<div class="card-home">
					<div class="card-header-home"><b>PSA|PEUGEOT|CITROEN</b></div>
						<div class="card-block-home">
							 <a href="https://admpartenaires.psa-peugeot-citroen.com" target="_blank"><img width="150" height="150" src="icon/psa-peugeot-citroen.png" class="img-responsive"><br/></a> 
						</div>
						<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
						</div>
					</div>
			</div>
			</div><!--CHIUDO LA SESTA RIGA-->
			
		<div class="row"><!--APRO LA SETTIMA RIGA-->
		
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>SAOL</b></div>
					<div class="card-block-home">
						 <a href="http://web.serviziauto.it/" target="_blank"><img width="150" height="150"src="icon/saol.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>	
		
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>SAOL CARR. MECC.</b></div>
					<div class="card-block-home">
						 <a href="https://webc.serviziauto.it/" target="_blank"><img width="150" height="150"src="icon/saol.png" class="img-responsive"><br/></a>  
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>	

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>GE.CO MAGNETI MARELLI</b></div>
					<div class="card-block-home">
						 <a href="https://www.magnetimarelli-geco.com/Default2.asp" target="_blank"><img width="150" height="150"src="icon/magnetimarelli.jpg" class="img-responsive"><br/></a>
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>		

			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>E-COMMERCE GR DISTRIBUZIONI</b></div>
					<div class="card-block-home">
						 <a href="http://79.8.35.141/" target="_blank"><img width="150" height="150"src="icon/grdistrib.png" class="img-responsive"><br/></a> 
					</div>
					<div class="card-header">
					<p><b>User: </b>username<br></p>
					<p><b>Pass: </b>password</p>
					</div>
				</div>
			</div>			


		</div><!--CHIUDO LA SETTIMA RIGA-->
		
		
		<div class="row"><!--APRO LA OTTAVA RIGA-->
		
			<div class="col-sm-3">
				<div class="card-home">
				<div class="card-header-home"><b>EUROPCAR (Browser preferenziale Chrome)</b></div>
					<div class="card-block-home">
						 <a href="https://rfm.fermotecnico.it/" target="_blank"><img width="150" height="150"src="icon/europcar.png" class="img-responsive"><br/></a> 
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

		</div><!--CHIUDO LA OTTAVA RIGA-->
		
	</div><!--Chiudo il Container-->