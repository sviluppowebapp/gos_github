<?php

$sql = "SELECT * FROM tecnico ORDER BY id_tec ASC";
$res = $mysqli->query($sql);
$count = mysqli_num_rows($res);
//var_dump($count);
//exit;

if ($count == 0) {
echo "<p style='text-align:center;'>Non ci sono tecnici nel database.</p>";
echo "<p style='text-align:center;'><a href='index.php?page=nuovo_tenico'>inserisci un tecnico</a></p>";

}else{
	
	echo "<br />";

echo "<div class ='container-appuntamento'>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Tecnico</th>";
echo "<th>Aggiorna</th>";
echo "</tr>";

while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
$id_tec = mysqli_real_escape_string($mysqli, $row['id_tec']);
$n_tecnico = mysqli_real_escape_string($mysqli, strtoupper($row['n_tecnico']));

//$data = strtotime($data);
//$data = date('d/m/Y', $data);
?>

<tr>
<td><b><?php echo $id_tec; ?></b></td>
<td><?php echo $n_tecnico; ?></td>
<td><?php echo "<a href='index.php?page=aggiorna_tecnico&id_tec=$id_tec'><img src='images/edit.png' alt=''></a>"; ?></td>
</tr>

<?php
 }
echo "</table>";
echo "</div>";
}
?>