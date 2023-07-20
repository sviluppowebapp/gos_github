<?php 
		include "../db_connection.php";
		require('fpdf.php');
		
		$id_contact = $_GET['id'];
		
		$query_string = "SELECT * FROM contacts WHERE id = ".$id_contact."";
					$result = $mysqli->query($query_string);
					$row = $result->fetch_assoc();
						$cognome = $row[cognome];
							$cognome = utf8_decode($cognome);
						$nome = $row[nome];
							$nome = utf8_decode($nome);
						$telefono = $row['telefono'];
						$email = $row['email'];
						
					//PDF
					$pdf = new FPDF();
					$pdf->AddPage('L',Array(120,85));
						$pdf->Image('./img/dx_image.png',10,10);
					$pdf->SetFont('Helvetica','B',12);							
					$pdf->Cell(120,20,"",0,1,'C');
					$pdf->Cell(100,5,$cognome." ".$nome,'B',0,'L');
					
					$pdf->SetFont('Helvetica','B',9);							
					
					$pdf->Cell(120,10,"",0,1,'C');
					$pdf->Cell(120,7,"Tel.: ".$telefono,0,1,'L');
					$pdf->Cell(120,7,"Email: ".$email,0,1,'L');

					$pdf->Output('I');		
		$mysqli->close();

?>