<?php
		include "../db_connection.php";
		
		$id_contact = $_POST['id_contact'];
		
		$testo = $_POST['testo'];
			$testo = addslashes($testo);

	$query_string = "SELECT * FROM contacts
	WHERE CONCAT(cognome,' ',nome) LIKE '%".$testo."%'
	ORDER BY cognome";
				
		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<th>Cognome</th>";
		echo "<th>Nome</th>";
		echo "<th>Telefono</th>";
		echo "<th>Email</th>";
		echo "<th></th>";
		echo "</thead>";
		
		$result = $mysqli->query($query_string);
		while($row = $result->fetch_assoc()){
			
			echo "<tr>";
			echo "<td class=\"col-md-3\">";
				echo $row[cognome];
			echo "</td>";
			echo "<td class=\"col-md-3\">";
				echo $row[nome];
			echo "</td>";
			echo "<td>";
				echo $row[telefono];
			echo "</td>";
			echo "<td>";
				echo $row[email];
			echo "</td>";
			echo "<td>";
				echo " <button class='btn btn-warning' data-toggle='modal' data-target='#modal_modifica".$row[id]."' title='Modifica'>";
				echo "<i class='fa fa-edit' aria-hidden='true'></i>";
				echo "</button>";
				echo " <button class='btn btn-info' onclick='vcard(".$row[id].")' title='Stampa Vcard'>";
				echo "<i class='fa fa-id-card-o' aria-hidden='true'></i>";
				echo "</button>";
				echo " <button class='btn btn-danger' onclick='delete_item(".$row[id].")' title='Elimina'><i class='fa fa-trash' aria-hidden='true'></i></button>";
			echo "</td>";
			echo "</tr>";
		
		//MODAL		
echo " <div class='modal fade' id='modal_modifica".$row[id]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel".$row[id]."'>
<div class='modal-dialog' role='document'>
<div class='modal-content'>
	<div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		<h4 class='modal-title' id='myModalLabel".$row[id]."'><strong>$row[cognome] $row[nome]</strong></h4>
	</div>
<div class='modal-body'>
	<div class='form-group form-group-sm'>
		<label>Cognome</label>
		<input type='text' class='form-control' id='cognome_mod".$row[id]."' value=\"$row[cognome]\">
	</div>
	<div class='form-group form-group-sm'>
		<label>Nome</label>
		<input type='text' class='form-control' id='nome_mod".$row[id]."' value=\"$row[nome]\">
	</div>
	<div class='form-group form-group-sm'>
		<label>Telefono</label>
		<input type='text' class='form-control' id='telefono_mod".$row[id]."' value=\"$row[telefono]\">
	</div>
	<div class='form-group form-group-sm'>
		<label>Email</label>
		<input type='text' class='form-control' id='email_mod".$row[id]."' value=\"$row[email]\">
	</div>
</div>
<div class='modal-footer'>
	<button type='button' class='btn btn-success' data-dismiss='modal' onclick='update(".$row[id].")'>Salva</button>
	<button type='button' class='btn btn-default' data-dismiss='modal'>Chiudi</button>
</div>";
echo "</div>";
//MODAL
		
		}
			echo "</table>";
				

				
/* close connection */
$mysqli->close();
		
?>