<?php


$minuti="min.";
$tipo = trim(strip_tags(stripslashes($_GET['tipo'])));

if ($tipo == "tutti") {
    $where = "WHERE data = '$oggi'";

}elseif ($tipo == "accettazione") {
    $where = "WHERE stato_pren = 'ATTESA ACCETTAZIONE' AND tipo_pren = 'NOLEGGIO'";

}elseif ($tipo == "lavorazione") {
    $where = "WHERE stato_pren = 'LAVORAZIONE' AND tipo_pren = 'NOLEGGIO'";

}elseif ($tipo == "terminato") {
    $where = "WHERE stato_pren = 'TERMINATO' AND tipo_pren = 'NOLEGGIO'";
}

$sql = "SELECT * FROM appuntamenti $where ORDER BY data ASC";
//var_dump($sql);
$res = $mysqli->query($sql);
$count = mysqli_num_rows($res);

if ($count == 0) {
	
echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-danger center-button'>Non ci sono appuntamenti in $tipo di Clienti Noleggio nel database.</p></div>";
echo "</div>";

}else{
	
echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Ora</th>";
echo "<th>Cliente</th>";
echo "<th>Tempi di Lavorazione<br>(minuti)</th>";
echo "<th>Telefono</th>";
echo "<th>Veicolo</th>";
echo "<th>Tipo Pren.</th>";
echo "<th>Tipo Lav.</th>";
echo "<th>Stato Pren.</th>";
echo "<th>Note</th>";
echo "<th>Aggiorna</th>";
echo "<th>Stampa</th>";
echo "</tr>";

while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
$id_app = mysqli_real_escape_string($mysqli, $row['id_app']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$gestore = mysqli_real_escape_string($mysqli, $row['gestore']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$tlav = mysqli_real_escape_string($mysqli, $row['tlav']);
$stato_pren = mysqli_real_escape_string($mysqli, $row['stato_pren']);
$tipo_pren = mysqli_real_escape_string($mysqli, $row['tipo_pren']);
$tipo_lavorazione = mysqli_real_escape_string($mysqli, $row['tipo_lavorazione']);
$telefono = mysqli_real_escape_string($mysqli, $row['telefono']);
$note = mysqli_real_escape_string($mysqli, $row['note']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$note = trim(strip_tags(stripslashes($note)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

if ($stato_pren == 'ATTESA ACCETTAZIONE') { $classe = 'table-danger-rs'; }
if ($stato_pren == 'LAVORAZIONE') { $classe = 'table-warning-rs'; }
if ($stato_pren == 'TERMINATO') { $classe = 'table-success-rs'; }

if ($tipo_lavorazione == 'MECCANICA') { $lav = 'table-warning-mec'; }
if ($tipo_lavorazione == 'CARROZZERIA') { $lav = 'table-warning-car'; }
if ($tipo_lavorazione == 'PNEUMATICI') { $lav = 'table-warning-pneus'; }

?>

<tr>
<td><b><?php echo $data; ?></b></td>
<td><?php echo $ora; ?></td>
<td><?php echo $cliente; ?></td>
<td><?php echo ($tlav == 0 ? "L'accettatore non ha inserito i tempi" : $tlav. " " .$minuti); ?></td>
<td><?php echo $telefono; ?></td>
<td><?php echo $veicolo; ?></td>
<td><?php echo $tipo_pren; ?></td>
<td class='<?= $lav; ?>'><? echo $tipo_lavorazione; ?></td>
<td class='<?= $classe; ?>'><? echo $stato_pren; ?></td>
<td><?php echo $note; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_appuntamento&id_app=$id_app' target='_blank'><img src='images/edit.png' alt=''></a>"; ?></td>
<td><?php echo "<a href='pdf_appuntamento.php?id_app=$id_app' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
</tr>

<?php
 }
	echo "</table>";
	echo "</div>";
}
?>