<?php

// Creo una variabile dove imposto il numero di record 
// da mostrare in ogni pagina
$x_pag = 5;

// Recupero il numero di pagina corrente.
// Generalmente si utilizza una querystring
$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

// Controllo se $pag è valorizzato e se è numerico
// ...in caso contrario gli assegno valore 1
if (!$pag || !is_numeric($pag)) $pag = 1; 

$sq1 = "SELECT id_app FROM appuntamenti WHERE stato_pren = 'ATTESA ACCETTAZIONE'";
$rs1 = $mysqli->query($sq1);
$all_rows = mysqli_num_rows($rs1);

if ($all_rows == 0) {

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-warning center-button'>Non ci sono appuntamenti in accettazione</p></div>";
echo "</div>";

}else{

// Tramite una semplice operazione matematica definisco il numero totale di pagine
$all_pages = ceil($all_rows / $x_pag);

// Calcolo da quale record iniziare
$first = ($pag - 1) * $x_pag;

$sq2 = "SELECT * FROM appuntamenti WHERE stato_pren = 'ATTESA ACCETTAZIONE' ORDER BY data DESC LIMIT $first, $x_pag";
$rs2 = $mysqli->query($sq2);

if ($rs2 != 0){
for($x = 0; $x < $rs2; $x++){

echo "<br />";

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Ora</th>";
echo "<th>Cliente</th>";
echo "<th>Telefono</th>";
echo "<th>Veicolo</th>";
echo "<th>Tipo Pren.</th>";
echo "<th>Stato Pren.</th>";
echo "<th>Note</th>";
echo "<th>Aggiorna</th>";
echo "<th>Stampa</th>";
echo "</tr>";

while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$id_app = mysqli_real_escape_string($mysqli, $row['id_app']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$gestore = mysqli_real_escape_string($mysqli, $row['gestore']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$stato_pren = mysqli_real_escape_string($mysqli, $row['stato_pren']);
$tipo_pren = mysqli_real_escape_string($mysqli, $row['tipo_pren']);
$telefono = mysqli_real_escape_string($mysqli, $row['telefono']);
$note = mysqli_real_escape_string($mysqli, $row['note']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$note = trim(strip_tags(stripslashes($note)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */

?>

<tr>
<td><b><?php echo $data; ?></b></td>
<td><?php echo $ora; ?></td>
<td><?php echo $cliente; ?></td>
<td><?php echo $telefono; ?></td>
<td><?php echo $veicolo; ?></td>
<td><?php echo $tipo_pren; ?></td>
<td class='table-danger-rs'><?php echo $stato_pren; ?></td>
<td><?php echo $note; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_appuntamento&id_app=$id_app'><img src='images/edit.png' alt=''></a>"; ?></td>
<td><?php echo "<a href='pdf_appuntamento.php?id_app=$id_app' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
</tr>

<?php
}
echo "</table>";
echo "</div>";

echo "<div class='pagination form'>";
if ($all_pages > 1){
  if ($pag > 1){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=appuntamenti_accettazione&pag=" . ($pag - 1) . "\">";
    echo "&lt;&lt; Precedente</a>&nbsp;&nbsp;&nbsp;";
  } 
  if ($all_pages > $pag){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=appuntamenti_accettazione&pag=" . ($pag + 1) . "\">";
    echo "Successiva &gt;&gt;</a>";
  } 
 }
echo "</div>";
  }
 }
}
?>