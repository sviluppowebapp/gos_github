<?php
date_default_timezone_set('Europe/Rome');
require_once 'function/date_day.php';
require_once 'function/datainizio.php';


if (isset($_POST['submit'])) {

if(isset($_POST['societacliente'])){$societacliente = mysqli_real_escape_string($mysqli, $_POST['societacliente']);}else{$societacliente ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['modelloauto'])){$modelloauto = mysqli_real_escape_string($mysqli, $_POST['modelloauto']);}else{$modelloauto ="";}
if(isset($_POST['utilizzatore'])){$utilizzatore = mysqli_real_escape_string($mysqli, $_POST['utilizzatore']);}else{$utilizzatore ="";}
if(isset($_POST['telefono'])){$telefono = mysqli_real_escape_string($mysqli, $_POST['telefono']);}else{$telefono ="";}
if(isset($_POST['email'])){$email = mysqli_real_escape_string($mysqli, $_POST['email']);}else{$email ="";}
if(isset($_POST['note'])){$note = mysqli_real_escape_string($mysqli, $_POST['note']);}else{$note ="";}
if(isset($_POST['datainiziocontratto'])){$datainiziocontratto = mysqli_real_escape_string($mysqli, $_POST['datainiziocontratto']);}else{$datainiziocontratto ="";}
if(isset($_POST['datafinecontratto'])){$datafinecontratto = mysqli_real_escape_string($mysqli, $_POST['datafinecontratto']);}else{$datafinecontratto ="";}


$query = "SELECT * FROM scnoleggio WHERE 1=1";

if (!empty($societacliente)) {
    $query .= " AND `societacliente` LIKE '%$societacliente%'";
}

if (!empty($targa)) {
    $query .= " AND `targa` LIKE '%$targa%'";
}

if (!empty($modelloauto)) {
    $query .= " AND `modelloauto` LIKE '%$modelloauto%'";
}

if (!empty($utilizzatore)) {
    $query .= " AND `utilizzatore` LIKE '%$utilizzatore%'";
}

if (!empty($telefono)) {
    $query .= " AND `telefono` LIKE '%$telefono%'";
}

if (!empty($email)) {
    $query .= " AND `email` LIKE '%$email%'";
}

if (!empty($note)) {
    $query .= " AND `note` LIKE '%$note%'";
}

if (!empty($datainiziocontratto)) {
	$query .= " AND `datafinecontratto` BETWEEN  STR_TO_DATE('$datainiziocontratto', '%d/%m/%Y') AND STR_TO_DATE('$datafinecontratto', '%d/%m/%Y')";	
	}

$query .= " ORDER BY datafinecontratto ASC";
$rs = $mysqli->query($query);
$count = mysqli_num_rows($rs);

//var_dump ($query);
//exit;


if (trim($_POST['societacliente']) == '' && trim($_POST['targa']) == '' && trim($_POST['modelloauto']) == '' && trim($_POST['utilizzatore']) == '' && trim($_POST['telefono']) == '' && trim($_POST['email']) == '' && trim($_POST['note']) == '' && trim($_POST['datainiziocontratto']) == '' && trim($_POST['datafinecontratto']) == '')
{
    //REINDIRIZZO L'UTENTE AL MESSAGGIO DI ERRORE ATTENZIONE COMPILA ALMENO UN CAMPO
	echo "<div class = 'container-ricerca-nulla'>";
	echo "<div class ='row'><p class='btn btn-warning center-button'>Nessun valore di ricerca inserito</div>";
    echo "<br />";
    echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_appuntamento'>Effettua una nuova ricerca</a></p></div>";
    echo "</div>";
}

elseif ($count == 0) {

	echo "<div class = 'container-ricerca-nulla'>";
	echo "<div class ='row'><p class='btn btn-warning center-button'>Non ci sono appuntamenti con i criteri ricercati</p></div>";
	echo "</div>";

}else{

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th>Cliente</th>";
echo "<th>Targa</th>";
echo "<th>Veicolo</th>";
echo "<th>Utilizzatore</th>";
echo "<th>Telefono</th>";
echo "<th>Email</th>";
echo "<th>Note</th>";
echo "<th>Data Inizio Contratto</th>";
echo "<th>Data Fine Contratto</th>";
echo "<th>Nuovo</th>";
echo "<th>Aggiorna</th>";
echo "</tr>";

while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
$id_noleggio = mysqli_real_escape_string($mysqli, $row['id_noleggio']);
$societacliente = mysqli_real_escape_string($mysqli, $row['societacliente']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$modelloauto = mysqli_real_escape_string($mysqli, $row['modelloauto']);
$utilizzatore = mysqli_real_escape_string($mysqli, $row['utilizzatore']);
$telefono = mysqli_real_escape_string($mysqli, $row['telefono']);
$email = mysqli_real_escape_string($mysqli, $row['email']);
$note = mysqli_real_escape_string($mysqli, $row['note']);
$datainiziocontratto = mysqli_real_escape_string($mysqli, $row['datainiziocontratto']);
$datafinecontratto = mysqli_real_escape_string($mysqli, $row['datafinecontratto']);


/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$societacliente = trim(strip_tags(stripslashes($societacliente)));
$targa = trim(strip_tags(stripslashes($targa)));
$modelloauto = trim(strip_tags(stripslashes($modelloauto)));
$utilizzatore = trim(strip_tags(stripslashes($utilizzatore)));
$telefono = trim(strip_tags(stripslashes($telefono)));
$email = trim(strip_tags(stripslashes($email)));
$note = trim(strip_tags(stripslashes($note)));

//PREPARO LE DATE PER LA VISUALIZZAZIONE ITALIANO
$datainiziocontratto = strtotime($datainiziocontratto);
$datainiziocontratto = date('d/m/Y', $datainiziocontratto);
$datafinecontratto = strtotime($datafinecontratto);
$datafinecontratto = date('d/m/Y', $datafinecontratto);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */
?>



<tr>
<td><?php echo $societacliente; ?></td>
<td><?php echo $targa; ?></td>
<td><?php echo $modelloauto; ?></td>
<td><?php echo $utilizzatore; ?></td>
<td><?php echo $telefono; ?></td>
<td><?php echo $email; ?></td>
<td><?php echo $note; ?></td>
<td><?php echo $datainiziocontratto; ?></td>
<td><?php echo $datafinecontratto; ?></td>
<td><?php echo "<a href='index.php?page=ins_cliente_noleggio' target='_blank'><img src='images/add_32.png' alt=''></a>"; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_noleggio&id_noleggio=$id_noleggio' target='_blank'><img src='images/edit.png' alt=''></a>"; ?></td>
</tr>

<?php
$totale+=$tlav;
 }
echo "</table>";
echo "</div>";
}

//$tempo_totale = floor($totale / 60)."h ".($totale % 60)."m ";
//$ore_operai = round(($totale/$numero_operai)/60, 2). " h";


/*Se ci sono appuntamenti mostro il div del totale altrimenti lo nascondo nell'else*/
//if (!$count == 0){

//echo "	<div class='box-tlav'>";
//echo "	<div class='testata-ore'>Totale Ore Vendute</div>";
//echo "	<div class='totale-ore'><span class='badge-home-ore badge-default-ore badge-pill-ore'>$tempo_totale</span></div>";
//echo "	</div>";

//echo "	<div class='box-oreoperai'>";
//echo "	<div class='testata-ore'>Ore Vendute per 5 operai</div>";
//echo "	<div class='totale-ore'><span class='badge-home-ore badge-default-ore badge-pill-ore'>$ore_operai</span></div>";
//echo "	</div>";
//}

//elseif ($count == 0){

	/* In questo spazio potrei gestire un box da mostrare nel caso in cui non ci fossero appuntamenti

	echo "	<div class='box-oreoperai'>";
	echo "	<div class='testata-ore'>Esegui una nuova ricerca</div>";
	echo "	<div class='totale-ore'><span class='badge-home-ore badge-default-ore badge-pill-ore'>$ore_operai</span></div>";
	echo "	</div>";
*/
//	}
}

else{

?>

<form class="form-inline" method="post" action="">
<div class="form-container">

<div class="card">
  <div class="card-header"><h3><center>RICERCA CONTRATTI NOLEGGIO NEL DBMS</center></h3></div>
  <div class="card-block">

 <h6><b>Effettua la ricerca in un intervallo di date (Attenzione i campi devono essere entrambi valorizzati)</b></h6>
 <div class="row">

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker1" name="datainiziocontratto" value="01/01/2015" readonly="readonly">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="datepicker2" name="datafinecontratto" placeholder="A Data ... ">
			  </div>
		</div>

 </div>

 <hr>
 
 <h6><b>Effettua la ricerca per: Cliente | Veicolo | Targa</b></h6>
	<div class="row">
 
 		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="utilizzatore" name="utilizzatore" placeholder="Cliente/Utilizzatore ... " >
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
				<input type="text" class="form-control" name="modelloauto" id="modelloauto" placeholder="Veicolo ...">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="targa" name="targa" placeholder="Targa ...">
			  </div>
		</div>
		
	</div>
 <hr>
 
 <h6><b>Altri parametri utili alla tua ricerca</b></h6>
	 <div class="row">
		<div class="col-md-4">
			<label class="sr-only" for="stato_pren">Gestore</label>
				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
					<select class="form-control" select name="societacliente" id="societacliente">
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
			<div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono ...">
			</div>
		</div> 
	 </div>

</div><!--Close Class Card-->
</div><!--Close Class CardBlock-->

 <div class="text-right">
  <button type="submit" name="submit" class="btn btn-success right">Ricerca Contratti</button>
 </div>

</div><!--Close Container-->
</form><!--Close Form-->

<?php
}
?>
