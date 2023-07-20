<?php
require_once('function/date_day.php');
//var_dump($_POST);



$importo=0;

if(isset($_POST['submit'])) {
if(isset($_POST['data'])){$data = mysqli_real_escape_string($mysqli, $_POST['data']);}else{$data ="";}
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";}
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}	
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['data_da'])){$data_da = mysqli_real_escape_string($mysqli, $_POST['data_da']);}else{$data_da ="";}
if(isset($_POST['data_a'])){$data_a = mysqli_real_escape_string($mysqli, $_POST['data_a']);}else{$data_a ="";}



$query = "SELECT *, DATE_FORMAT(preventivi.data,'%d/%m/%Y') as data_it FROM preventivi WHERE 1=1";

if (!empty($data)) {
    $query .= " AND `data` = STR_TO_DATE('$data', '%d/%m/%Y')";
}

if (!empty($cliente)) {
    $query .= " AND `cliente` LIKE '%$cliente%'";
}

if (!empty($veicolo)) {
    $query .= " AND `veicolo` LIKE '%$veicolo%'";
}

if (!empty($targa)) {
    $query .= " AND `targa` LIKE '%$targa%'";
}

if (!empty($data_da)) {
    $query .= " AND `data` BETWEEN  STR_TO_DATE('$data_da', '%d/%m/%Y') AND STR_TO_DATE('$data_a', '%d/%m/%Y')";
}

$query .= " ORDER BY data DESC";
$rs = $mysqli->query($query);
$count = mysqli_num_rows($rs);
//var_dump ($query);
if (trim($_POST['cliente']) == '' && trim($_POST['veicolo']) == '' && trim($_POST['targa']) == '' && trim($_POST['data']) == '' && trim($_POST['data_da']) == ''){
    //REINDIRIZZO L'UTENTE AL MESSAGGIO DI ERRORE ATTENZIONE COMPILA ALMENO UN CAMPO 
		
		echo "<div class = 'container-ricerca-nulla'>";
		echo "<div class ='row'><p class='btn btn-warning center-button'>Nessun valore di ricerca inserito</div>";
        echo "<br />";
        echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_preventivo'>Effettua una nuova ricerca</a></p></div>";
        echo "</div>";
}

elseif ($count == 0) {
	

		echo "<div class = 'container-ricerca-nulla'>";
		echo "<div class ='row'><p class='btn btn-warning center-button'>Nessun valore di ricerca inserito</div>";
        echo "<br />";
        echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_preventivo'>Effettua una nuova ricerca</a></p></div>";
        echo "</div>";

}else{

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th style='color:green'>Data <br>Preventivo</th>";
echo "<th style='color:green'>Cliente</th>";
echo "<th style='color:green'>Veicolo</th>";
echo "<th style='color:green'>Targa</th>";
echo "<th style='color:green'>Totale <br>Preventivato</th>";
echo "<th>MODIFICA</th>";
echo "<th>GENERA COMMESSA</th>";
echo "<th>GENERA PDF</th>";
echo "<th>CANCELLA</th>";
echo "</tr>";

while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
$id_preventivo = mysqli_real_escape_string($mysqli, $row['id_preventivo']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$n_accettatore = mysqli_real_escape_string($mysqli, $row['n_accettatore']);
$totale = mysqli_real_escape_string($mysqli, $row['totale']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

?>

<tr>
<td><b><?php echo data_it($data); ?></b></td>
<td style="color:Coral; font-weight:bold; text-align:left;"><?php echo $cliente; ?></td>
<td style="text-align:left;"><?php echo $veicolo; ?></td>
<td><?php echo $targa; ?></td>
<td>&euro; <?php echo $totale; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_preventivo&id_preventivo=$id_preventivo' target='_blank'><img src='images/edit.png' alt='aggiorna'\" onclick=\"return confirm('Attenzione stai per modificare il preventivo ... Sei sicuro ?')\"></a>"; ?></td>
<td><?php echo "<a href='index.php?page=genera_commessa&id_preventivo=$id_preventivo' target='_blank'><img src='images/commessa_32.png' alt='Stampa'></a>"; ?></td>
<td><?php echo "<a href='pdf_preventivo.php?id_preventivo=$id_preventivo' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
<td><?php echo "<a onclick=\"return confirm('Confermi l\'eliminazione del preventivo ?')\" href='index.php?page=elimina_preventivo&id_preventivo=$id_preventivo' target='_blank'><img src='images/trash.png' alt='Elimina'></a>"; ?></td>

<?php
 }
echo "</table>";
echo "</div>";
}

}else{

?>



<form class="form-inline" method="post" action="">
<div class="form-container">

<div class="card">
  <div class="card-header">Ricerca Preventivo</div>
  <div class="card-block">


 <div class="row">
 
		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="Data" name="data" id="datepicker">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="Cliente" name="cliente">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="Veicolo" name="veicolo">
			  </div>
		</div>
	  
 </div>
 
 <hr>
 
 <div class="row">


		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			  <span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>
			  <input class="form-control" type="text" placeholder="Targa" name="targa">
			  </div>
		</div>
	
		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="Da Data" name="data_da" id="datepicker1">
			  </div>
		</div>

		<div class="col-md-4">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
				<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
				<input class="form-control" type="text" placeholder="A Data" name="data_a" id="datepicker2">
			  </div>
		</div>
	 
 </div>
 

</div><!--Close Class Card-->
</div><!--Close Class CardBlock-->

 <div class="text-right">
  <button type="submit" name="submit" class="btn btn-success right">Ricerca Preventivo</button> 
 </div>

</div><!--Close Container-->
</form><!--Close Form-->
<?php
}
?>