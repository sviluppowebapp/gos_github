<?php

if (isset($_GET['id_noleggio'])) {
$id_noleggio = (int)$_GET['id_noleggio'];
$sql1 = "SELECT * FROM scnoleggio WHERE id_noleggio = '$id_noleggio'";
$res1 = $mysqli->query($sql1);

while ($row = $res1->fetch_array(MYSQLI_ASSOC)) {
$id_noleggio = mysqli_real_escape_string($mysqli, $row['id_noleggio']);
$societacliente = mysqli_real_escape_string($mysqli, $row['societacliente']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$modelloauto = mysqli_real_escape_string($mysqli,$row['modelloauto']);
$utilizzatore = mysqli_real_escape_string($mysqli,$row['utilizzatore']);
$telefono = mysqli_real_escape_string($mysqli, $row['telefono']);
$email = mysqli_real_escape_string($mysqli, $row['email']);
$note = mysqli_real_escape_string($mysqli, $row['note']);
$datainiziocontratto = mysqli_real_escape_string($mysqli, $row['datainiziocontratto']);
$datafinecontratto = mysqli_real_escape_string($mysqli, $row['datafinecontratto']);

// RECUPERO LA DATA NEL FORMATO ITALIANO
$datainiziocontratto = strtotime($datainiziocontratto);
$datainiziocontratto = date('d/m/Y', $datainiziocontratto);
$datafinecontratto = strtotime($datafinecontratto);
$datafinecontratto = date('d/m/Y', $datafinecontratto);

}


/* RECUPERO I DATI DAL FORM */
if (isset($_POST['submit'])) {
$id_noleggio = (int)$_GET['id_noleggio'];

function pulisci($stringa, $mysqli) {
return $mysqli->real_escape_string(trim(strip_tags(strtoupper($stringa))));
}

foreach ($_POST as $key => $value) {
$_POST[$key] = pulisci($value, $mysqli);
}

extract($_POST);

$sql2 = "UPDATE scnoleggio SET societacliente = '$societacliente', targa = '$targa', modelloauto = '$modelloauto', utilizzatore = '$utilizzatore', telefono = '$telefono', email = '$email', note = '$note',  datainiziocontratto = STR_TO_DATE('$datainiziocontratto', '%d/%m/%Y'), datafinecontratto = STR_TO_DATE('$datafinecontratto', '%d/%m/%Y') WHERE id_noleggio = '$id_noleggio'";
$res2 = $mysqli->query($sql2);

if (!$res2) {
echo "<p style='margin-top: 40px;text-align:center;'>Ho trovato un errore nell'esecuzione della <b>QUERY</b> $sql2</p>";

}else{

$messaggio = 		"<div class = 'container-ricerca-nulla'>";
					"<div class='success'>Cliente Aggiornato con Successo! Attendi..</div>";
					"</div>";
					
					echo "<meta http-equiv='refresh' content='2;url=index.php?page=home'>";
 
  }
 }
}
?>


<? echo $messaggio; ?>

<script type="text/javascript">
<!--
function soloInteri(campo){
    var pattern=/^[0-9]{1,4}$/;
    var c=campo.value
    if(!c.match(pattern) || parseInt(c)>1000){
        alert('Inserire solo il numero di minuti')
        campo.value=0;
        campo.focus();
    }
}
//-->
</script>

<form class="form" method="post" id="modulo" action="" enctype="multipart/form-data">

<div class="form-container">

<div class="card-commesse">
  <div class="card-header">Modifica Dati Cliente</div>
  <div class="card-block">

	<div class="row">
		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker1" placeholder="Data Inizio Contratto" name="datainiziocontratto" value="<?= $datainiziocontratto; ?>">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker2" placeholder="Data Fine Contratto" name="datafinecontratto" value="<?= $datafinecontratto; ?>">
			  </div>
		</div>

		<div class="col-md-4">
			<label class="sr-only" for="stato_pren">Gestore</label>
				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
					<select class="form-control" select name="societacliente" id="societacliente" required="required" >
						<?php 
						echo "<option value='$societacliente'>$societacliente</option>"; 
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
		
	</div>
	  
	  <hr>
	
	<div class="row">
		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" aria-hidden="true" name="utilizzatore" required="required" placeholder="Nome Cognome Cliente" value="<?= $utilizzatore; ?>">
			  </div>
		</div>
		
		<div class="col-md-4">
		 <label class="sr-only" for="Veicolo">Veicolo</label>
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="modelloauto" required="required" placeholder="Veicolo" value="<?= $modelloauto; ?>" >
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="targa" required="required" placeholder="targa" value="<?= $targa; ?>">
			  </div>
		</div>	
	</div> 


	<hr>

	<div class="row">
		
		<div class="col-md-4">
			<label class="sr-only" for="email">Email</label>
				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="email" placeholder="Email" value="<?= $email; ?>">
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
			<div class="col-12">
				<div class="form-group has-danger">
					<label for="note">Note</label>
					<textarea class="form-control" name= "note" id="note" rows="5" maxlength="90" placeholder="Max 90 caratteri" required="required"> <?= $note = str_replace('\\','',$note); ?></textarea>
				</div>
			</div>
		</div>

</div><!--Close Div card-block-->
</div><!--Close Div card-commesse-->
<div class="clear"></div>
	
	<div class="text-right">
		<button type="submit" name="submit" class="btn btn-success right" onclick="if(confirm('Confermi la modifica dei dati cliente ?') ){this.form.submit();}">Aggiorna Cliente</button>
	</div>
</div><!--Close Div Container-->
</form>
