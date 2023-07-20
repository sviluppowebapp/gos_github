<?php 
		include "../db_connection.php";
		require('fpdf.php');
		
					$pdf = new FPDF();
					$pdf->AddPage();
					$pdf->SetDrawColor(165,165,165);
					
					$pdf->SetFont('Helvetica','B',12);							

					$pdf->Cell(190,5,"Contatti in Rubrica",0,0,'C');
					
					$pdf->SetFont('Helvetica','B',9);							
					
					$pdf->Cell(190,10,"",0,1,'C');
					$pdf->Cell(50,5,"Cognome",0,0,'L');
					$pdf->Cell(50,5,"Nome",0,0,'L');
					$pdf->Cell(40,5,"Telefono",0,0,'L');
					$pdf->Cell(40,5,"Email",0,1,'L');
					
					$pdf->SetFont('Helvetica','',8);
					
					$query_string = "SELECT * FROM contacts order by cognome";
					$result = $mysqli->query($query_string);
					while($row = $result->fetch_assoc()){
						$cognome = $row[cognome];
							$cognome = utf8_decode($cognome);
						$nome = $row[nome];
							$nome = utf8_decode($nome);
						$telefono = $row['telefono'];
						$email = $row['email'];
						
						$pdf->Cell(50,5,$cognome,'T',0,'L');
						$pdf->Cell(50,5,$nome,'T',0,'L');
						$pdf->Cell(40,5,$telefono,'T',0,'L');
						$pdf->Cell(45,5,$email,'T',1,'R');
					}			
					
					$pdf->Output('I');		
		$mysqli->close();

?>