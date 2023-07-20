<?php
		include "../db_connection.php";

		 $filename="quickybook_".date('d-m-Y').".xls";
		 header ("Content-Type: application/vnd.ms-excel");
		 header ("Content-Disposition: inline; filename=$filename");
		 
		 echo "<table>";
				echo "<thead>";
				echo "<th>Cognome</th>";				
				echo "<th>Nome</th>";
				echo "<th>Telefono</th>";
				echo "<th>Email</th>";
				echo "</thead>";
				echo "<tbody>";
				
			$query_string = "SELECT * FROM contacts ORDER BY cognome";
			
				$result = $mysqli->query($query_string);
				while($row = $result->fetch_assoc()){
					//echo print_r($row);
					echo "<tr>";
					echo "<td>".$row[cognome]."</td>";
					echo "<td>".$row[nome]."</td>";					
					echo "<td>".$row[telefono]."</td>";
					echo "<td>".$row[email]."</td>";
					echo "</tr>";
					}
				echo "</tbody>";
				echo "</table>";

?>