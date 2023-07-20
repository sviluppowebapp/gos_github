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

$sq1 = "SELECT id_com FROM commesse";
$rs1 = $mysqli->query($sq1);
$all_rows = mysqli_num_rows($rs1);

// Tramite una semplice operazione matematica definisco il numero totale di pagine
$all_pages = ceil($all_rows / $x_pag);

// Calcolo da quale record iniziare
$first = ($pag - 1) * $x_pag;

$sq2 = "SELECT * FROM commesse ORDER BY data ASC LIMIT $first, $x_pag";
$rs2 = $mysqli->query($sq2);

if ($rs2 != 0){
for($x = 0; $x < $rs2; $x++){

echo "<br />";

echo "<div class='table-responsive'>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Cliente</th>";
echo "<th>Veicolo</th>";
echo "<th>Targa</th>";
echo "<th>Totale</th>";
echo "<th>Pagamento</th>";
echo "<th>MOD.</th>";
echo "<th>DUP.</th>";
echo "<th>PDF</th>";
echo "</tr>";

while ($row = $rs2->fetch_array(MYSQLI_ASSOC)) {
$id_com = mysqli_real_escape_string($mysqli, $row['id_com']);
$cliente = mysqli_real_escape_string($mysqli, $row['cliente']);
$data = mysqli_real_escape_string($mysqli, $row['data']);
$ora = mysqli_real_escape_string($mysqli, $row['ora']);
$indirizzo = mysqli_real_escape_string($mysqli, $row['indirizzo']);
$veicolo = mysqli_real_escape_string($mysqli, $row['veicolo']);
$piva = mysqli_real_escape_string($mysqli, $row['piva']);
$tel = mysqli_real_escape_string($mysqli, $row['tel']);
$targa = mysqli_real_escape_string($mysqli, $row['targa']);
$telaio = mysqli_real_escape_string($mysqli, $row['telaio']);
$n_tecnico = mysqli_real_escape_string($mysqli, $row['n_tecnico']);
$note = mysqli_real_escape_string($mysqli, $row['note']);
$pagamento = mysqli_real_escape_string($mysqli, $row['pagamento']);
$totale = mysqli_real_escape_string($mysqli, $row['totale']);

/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$pagamento = trim(strip_tags(stripslashes($pagamento)));
$veicolo = trim(strip_tags(stripslashes($veicolo)));
$data = strtotime($data);
$data = date('d/m/Y', $data);
/* FINE FILTRI e CONVERSIONI SULLE VARIABILI POST */
?>

<tr>
<td><? echo $data; ?></td>
<td><? echo $cliente; ?></td>
<td><? echo $veicolo; ?></td>
<td><? echo $targa; ?></td>
<td>&euro; <? echo $totale; ?></td>
<td><? echo $pagamento; ?></td>
<td><? echo "<a href='index.php?page=aggiorna_commessa&id_com=$id_com'><img src='images/edit.png' alt=''></a>"; ?></td>
<td><? echo "<a href='index.php?page=duplica_commessa&id_com=$id_com'><img src='images/copy.png' alt='Duplica'></a>"; ?></td>
<td><? echo "<a href='pdf_commessa.php?id_com=$id_com' target='_blank'><img src='images/print.png' alt='Stampa'></a>"; ?></td>
</tr>

<?
 }
echo "</table>";
echo "</div>";

echo "<div class='pagination'>";
// stampo i link per andare avanti e indietro tra le diverse pagine!
if ($all_pages > 1){
  if ($pag > 1){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=lista_commesse&pag=" . ($pag - 1) . "\">";
    echo "&lt;&lt; Precedente</a>&nbsp;&nbsp;&nbsp;";
  } 
  if ($all_pages > $pag){
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=lista_commesse&pag=" . ($pag + 1) . "\">";
    echo "Successiva &gt;&gt;</a>";
  } 
 }
echo "</div>";
}

}else{

echo "<p style='text-align:center;margin-top: 10%;'>Non ci sono Commesse nel database.</p>";

}

?>