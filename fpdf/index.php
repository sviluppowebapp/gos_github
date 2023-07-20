<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

include_once('../officina/inc/db.php');
require('fpdf.php');
 

// mi connetto al DBMS
$myconn = mysql_connect($host, $user, $pass) or die('Errore...');

//Mi connetto al database
mysql_select_db($database, $myconn) or die('Errore...');

//Select the Products you want to show in your PDF file
$result=mysql_query("select targa,km,totale from CommesseOfficina ORDER BY targa",$link);
$number_of_products = mysql_numrows($result);

//Initialize the 3 columns and the total
$column_targa = "";
$column_km = "";
$column_totale = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $targa = $row["targa"];
    $km = substr($row["km"],0,20);
    $torale = $row["totale"];
    $price_to_show = number_format($row["Price"],',','.','.');

    $column_targa = $column_targa.$targa."\n";
    $column_km = $column_km.$km."\n";
    $column_totale = $column_totale.$price_to_show."\n";

    //Sum all the Prices (TOTAL)
    $total = $total+$real_price;
}
mysql_close();

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
$total = number_format($total,',','.','.');

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'TARGA',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'KM',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'TOTALE',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_targa,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_km,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$columna_totale,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(30,6,'$ '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>