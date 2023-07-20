<?php
require_once('function/date_day.php');


/*DICHIARO LE VARIABILI CHE UTILIZZERO'*/

$importo=0;

if(isset($_POST['submit'])) {
if(isset($_POST['data'])){$data = mysqli_real_escape_string($mysqli, $_POST['data']);}else{$data ="";}
if(isset($_POST['cliente'])){$cliente = mysqli_real_escape_string($mysqli, $_POST['cliente']);}else{$cliente ="";}
if(isset($_POST['veicolo'])){$veicolo = mysqli_real_escape_string($mysqli, $_POST['veicolo']);}else{$veicolo ="";}
if(isset($_POST['targa'])){$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);}else{$targa ="";}
if(isset($_POST['data_da'])){$data_da = mysqli_real_escape_string($mysqli, $_POST['data_da']);}else{$data_da ="";}
if(isset($_POST['data_a'])){$data_a = mysqli_real_escape_string($mysqli, $_POST['data_a']);}else{$data_a ="";}



$query = "SELECT * FROM commesse WHERE 1=1";

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
    $query .= " AND `data` BETWEEN STR_TO_DATE('$data_da', '%d/%m/%Y') AND STR_TO_DATE('$data_a', '%d/%m/%Y')";
}

$query .= " ORDER BY data DESC";
$rs = $mysqli->query($query);
$count = mysqli_num_rows($rs);

if (trim($_POST['cliente']) == '' && trim($_POST['veicolo']) == '' && trim($_POST['targa']) == '' && trim($_POST['data']) == '' && trim($_POST['data_a']) == '') {
//REINDIRIZZO L'UTENTE AL MESSAGGIO DI ERRORE ATTENZIONE COMPILA ALMENO UN CAMPO

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-warning center-button'>Attenzione non hai inserito nessun valore di ricerca</p></div>";
echo "<br />";
echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_commessa'>Effettua una nuova ricerca</a></p></div>";
echo "</div>";
}

elseif ($count == 0) {

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-warning center-button'>Non ci sono commesse con i criteri ricercati</p></div>";
echo "<br />";
echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_commessa'>Effettua una nuova ricerca</a></p></div>";
echo "</div>";


}else{

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th style='color:green'>Data</th>";
echo "<th style='color:green'>Cliente</th>";
echo "<th style='color:green'>Veicolo</th>";
echo "<th style='color:green'>Targa</th>";
echo "<th style='color:green'>Km Rilevati <br> alla registrazione</th>";
echo "<th style='color:green'>Tecnico</th>";
echo "<th style='color:green'>Totale</th>";
echo "<th style='color:green'>Pagamento</th>";
echo "<th>MOD.</th>";
echo "<th>DUP.</th>";
echo "<th>PDF</th>";
echo "<th>ELIMINA</th>";
echo "</tr>";

while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
$id_com = mysqli_real_escape_string($mysqli, $row['id_com']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$piva = mysqli_real_escape_string($mysqli, $row['piva']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$km = mysqli_real_escape_string($mysqli, $row['km']);
$telaio = mysqli_real_escape_string($mysqli, $row['telaio']);
$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);
$pagamento = mysqli_real_escape_string($mysqli, $row['pagamento']);
$totale = mysqli_real_escape_string($mysqli, $row['totale']);



/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$pagamento = trim(strip_tags(stripslashes($pagamento)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */
?>


<tr>
<td><b><?php echo data_it($data); ?></b></td>
<td style="color:Coral; font-weight:bold; text-align:left;"><?php echo $cliente; ?></td> <!--Cambio colore al font Cliente-->
<td style="text-align:left;"><?php echo $veicolo; ?></td>
<td><?php echo $targa; ?></td>
<td style="text-align:center;font-weight:bold;color:blue;"><?php echo ($km == '0' ? "Km non valorizzati <br>in fase di commessa" : $km);?></td>
<td style="text-align:left;"><?php echo $n_tecnico; ?></td>
<td style="text-align:left;">&euro; <?php echo $totale; ?></td>
<td style="text-align:left;"><?php echo $pagamento; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_commessa&id_com=$id_com' target='_blank'><img src='images/edit.png' alt='Modifica' \" onclick=\"return confirm('ATTENZIONE stai per modificare la commessa ... Sei sicuro ?')\"></a>"; ?></td>
<td><?php echo "<a href='index.php?page=duplica_commessa&id_com=$id_com' target='_blank'><img src='images/copy.png' alt='Duplica'></a>"; ?></td>
<td><?php echo "<a href='pdf_commessa.php?id_com=$id_com' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
<td><?php echo "<a onclick=\"return confirm('Visualizza l\'identificativo da comunicare al tuo referente ?')\" href='index.php?page=elimina_commessa&id_com=$id_com' target='_blank'><img src='images/delete_32.png' alt='Elimina'></a>"; ?></td>
</tr>

<?php
$importo += floatval($totale);
//print_r($importo);
 }
echo "</table>";
echo "</div>";
}

/*Se la tabella risultati è diversa da 0 mostro il div del totale altrimenti lo nascondo nell'else*/
if (!$count == 0){
	
	
echo " 	<div class = 'container-badge-footer'>";
echo "	<div class='box-tlav'>";
echo "	<div class='testata-ore'>Totale Incasso</div>";
echo "	<div class='totale-ore'><span class='badge-home-ore badge-default-ore badge-pill-ore'>&#8364 $importo</span></div>";
echo "	</div>";
echo "	</div>";
}

/*Non eseguo nulla è quindi nascondo il div del totale*/
}else{

?>

<form class="form-inline" method="post" action="">
<div class="form-container">

<div class="card">
  <div class="card-header">Ricerca Commesse Officina</div>
  <div class="card-block">


<h6><b>Effettua la ricerca per una data specifica</b></h6>
 <div class="row">

  <label class="sr-only" for="inlineFormInputGroup">Data</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="fas fa-calendar-day" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data">
	  </div>

 </div>

 <hr>

<h6><b>Effettua la ricerca per parametri specifici</b></h6>
 <div class="row">
  <label class="sr-only" for="inlineFormInputGroup">Cliente</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cliente" name="cliente">
	  </div>

  <label class="sr-only" for="inlineFormInputGroup">Veicolo</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Veicolo" name="veicolo">
	  </div>

  <label class="sr-only" for="inlineFormInputGroup">Targa</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="fas fa-ad" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="datepicker" placeholder="Targa" name="targa">
	  </div>

 </div>

 <hr>


 <h6><b>Effettua la ricerca in un intervallo di date (Attenzione i campi devono essere entrambi valorizzati)</b></h6>
 <div class="row">
    <label class="sr-only" for="inlineFormInputGroup">Da Data</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="datepicker1" placeholder="Da Data" name="data_da">
	  </div>

  <label class="sr-only" for="inlineFormInputGroup">A Data</label>
	  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		<span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
		<input type="text" class="form-control" id="datepicker2" placeholder="A Data" name="data_a">
	  </div>
 </div>
</div>
	
    <button type="submit" name="submit" class="btn btn-success right">Ricerca Commessa</button>

</div><!--Close Class Card-->
</div><!--Close Container-->
</form><!--Close Form-->



<?php
}
?>
