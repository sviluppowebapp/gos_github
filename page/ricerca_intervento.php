<form class="form-inline form" method="post" action="">
<div class="form-container">

<div class="card">
	<div class="card-header">Ricerca Intervento</div>
		<div class="card-block">

<h6>Questa funzione ti permette di ricercare gli interventi eseguiti sui veicoli.
	Devono essere valorizzati <b><u>obbligatoriamente</u></b> entrambi i campi e sono ammesse abbreviazioni.
	<br><br><pre>Es: Se volessi ricercare <b><u>BATTERIA</u></b> per il veicolo targato <b><u>BX256JY</u></b> potrei scrivere:</pre>
	<pre><b>Campo Targa:</b>BX256 - <b>Campo Intervento:</b>BATT<pre></h6>

			 <div class="row">
					<div class="col-md-6">
						  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-window-maximize" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="targa" name="targa" placeholder="Targa" required="required">
						  </div>
					</div>

					<div class="col-md-6">
						  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-cog" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="intervento" name="intervento" placeholder="Intervento" required="required">
						  </div>
					</div>
			 </div>
		</div>
		 <button type="submit" name="submit" class="btn btn-success btn-md">Ricerca Intervento</button>
</div>
</div>
</form><!--Close Form-->


<?php
require_once('function/date_day.php');

if (isset($_POST['submit'])) {
$targa = mysqli_real_escape_string($mysqli, $_POST['targa']);
$intervento = mysqli_real_escape_string($mysqli, $_POST['intervento']);

if ($targa === "" || $intervento === ""){

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-warning center-button'>Attenzione non hai inserito nessun valore di ricerca</p></div>";
echo "<br />";
echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_commessa'>Effettua una nuova ricerca</a></p></div>";
echo "</div>";

}else{

$query = "SELECT * FROM commesse WHERE `targa` LIKE '%$targa%' AND (`itr1` LIKE '%$intervento%' OR `itr2` LIKE '%$intervento%' OR `itr3` LIKE '%$intervento%' OR `itr4` LIKE '%$intervento%' OR `itr5` LIKE '%$intervento%' OR `itr6` LIKE '%$intervento%' OR `itr7` LIKE '%$intervento%' OR `itr8` LIKE '%$intervento%' OR `itr9` LIKE '%$intervento%' OR `itr10` LIKE '%$intervento%' OR `itr11` LIKE '%$intervento%' OR `itr12` LIKE '%$intervento%' OR `itr13` LIKE '%$intervento%' OR `itr14` LIKE '%$intervento%' OR `itr15` LIKE '%$intervento%')";
$rs = $mysqli->query($query);
$count = mysqli_num_rows($rs);

if ($count == 0){

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-warning center-button'>Non sono presenti interventi, provare a cambiare tipo di ricerca</p></div>";
echo "<br />";
echo "<div class ='row'><p class='btn btn-success center-button'><a href='index.php?page=ricerca_intervento'>Effettua una nuova ricerca</a></p></div>";
echo "</div>";

}else{

echo "<div class ='container-ric-intervento'>";
echo "<div class='card'>";
echo "<div class='card-header'>Risultato della ricerca</div>";
echo "<div class='card-block'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Cliente</th>";
echo "<th>Veicolo</th>";
echo "<th>Targa</th>";
echo "<th>Totale</th>";
echo "<th>Pagamento</th>";
echo "<th>PDF</th>";
echo "</tr>";

while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
$id_com = mysqli_real_escape_string($mysqli, $row['id_com']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
//$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$piva = mysqli_real_escape_string($mysqli, $row['piva']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$telaio = mysqli_real_escape_string($mysqli, $row['telaio']);
$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);
//$note = mysqli_real_escape_string($mysqli, $row['note']);
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
<td><?php echo $cliente; ?></td>
<td><?php echo $veicolo; ?></td>
<td><?php echo $targa; ?></td>
<td>&euro; <?php echo $totale; ?></td>
<td><?php echo $pagamento; ?></td>
<td><?php echo "<a href='pdf_commessa.php?id_com=$id_com' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
</tr>

<?php
}
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
  }
 }
}
?>
