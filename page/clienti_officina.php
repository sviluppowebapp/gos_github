<?php
date_default_timezone_set('Europe/Rome');
require_once('function/date_day.php');

$veicolo='UNDEF';
$targa='UNDEF';
$cliente='UNDEF';
$tel='UNDEF';
$data='UNDEF';
$where='';

//var_dump($_GET['tipo']);
//exit;

if(isset($_GET['tipo']))$tipo = trim(strip_tags(stripslashes($_GET['tipo'])));
else echo 'Attenzione è stato riscontrato un errore contattare amministratore';

if ($tipo == "daeseguire"){
		$where = "WHERE YEAR(dtscrev) = YEAR(NOW()) AND MONTH(dtscrev)= MONTH(NOW()) AND DAY(dtscrev) >= DAY(NOW())";
}elseif($tipo == "scadute"){
		$where = "WHERE dtscrev < NOW()-1 AND dtscrev <> '0000-00-00'";
}


$query = "SELECT * FROM commesse $where GROUP BY targa ORDER BY cliente ASC LIMIT 20";
$oggetto =$mysqli->query($query);
$count = mysqli_num_rows($oggetto);

if ($count == 0) {

echo "<div class = 'container-ricerca-nulla'>";
echo "<div class ='row'><p class='btn btn-danger center-button'>Nessuna revisione presente</p></div>";
echo "</div>";

}else{

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped table-responsive'>";
echo "<tr>";
echo "<th style='color:green'>Veicolo</th>";
echo "<th style='color:green'>Targa</th>";
echo "<th style='color:green'>Cliente</th>";
echo "<th style='color:green'>Telefono</th>";
echo "<th style='color:green'>Data Ultimo<br>Intervento</th>";
echo "</tr>";

while($scorri_oggetto=$oggetto->fetch_assoc()){
$veicolo = mysqli_real_escape_string($mysqli, $scorri_oggetto['veicolo']);
$targa = mysqli_real_escape_string($mysqli, $scorri_oggetto['targa']);
$cliente = mysqli_real_escape_string($mysqli, $scorri_oggetto['cliente']);
$tel = mysqli_real_escape_string($mysqli, $scorri_oggetto['tel']);
$data = mysqli_real_escape_string($mysqli, $scorri_oggetto['data']);	


/* FILTRI e CONVERSIONI SULLE VARIABILI POST */
$cliente = trim(strip_tags(stripslashes($cliente)));
$cliente = str_replace('\r\n' , '<br>', $cliente);
$cliente = stripslashes($cliente);
$cliente = wordwrap($cliente,18,"<br>"); //MANDO A CAPO OGNI 18 CARATTERI

$veicolo = trim(strip_tags(stripslashes($veicolo)));
$veicolo = str_replace('\r\n' , '<br>', $veicolo);

$data = strtotime($data);
$data = date('d/m/Y', $data);
?>

<tr>
<td style="text-align:left;"><?php echo $veicolo; ?></td>
<td style="text-align:left;"><?php echo $targa; ?></td>
<td style="text-align:left;"><?php echo $cliente; ?></td>
<td style="text-align:left;"><?php echo $tel; ?></td>
<td style="text-align:left;"><?php echo data_it($data);?></td>
</tr>

<?php
 }
echo "</table>";
echo "</div>";
}
?>