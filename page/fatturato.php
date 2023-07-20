<?php
$fatturati = ['2015'=>array_fill_keys(range(1,12),0),
                   '2016'=>array_fill_keys(range(1,12),0),
                   '2017'=>array_fill_keys(range(1,12),0),
                   '2018'=>array_fill_keys(range(1,12),0),
                   '2019'=>array_fill_keys(range(1,12),0),
                   '2020'=>array_fill_keys(range(1,12),0),
                   '2021'=>array_fill_keys(range(1,12),0),
                   '2022'=>array_fill_keys(range(1,12),0),
				   '2023'=>array_fill_keys(range(1,12),0),
                   
 ];

$query = 
"SELECT
DATE_FORMAT(data, \"%c-%Y\") as meseanno
, SUM(totale) as totalemese
FROM `commesse`
WHERE YEAR(data) BETWEEN 2015 AND 2023
GROUP BY meseanno UNION SELECT
DATE_FORMAT(data, \"13-%Y\") as meseanno
, SUM(totale) as totalemese
FROM `commesse`
WHERE YEAR(data) BETWEEN 2015 AND 2023
GROUP BY meseanno";

$result = $mysqli->query($query);
while($data = mysqli_fetch_assoc($result)){
    $d = explode('-', $data['meseanno']); // in $d[0] ho il mese, in $d[1] l'anno;
    $fatturati[$d[1]][$d[0]] = $data['totalemese'];
}

// CREO UN ARRAY DI MESI
$mesi = [1=>'Gennaio', 2=>'Febbraio', 3=>'Marzo', 4=>'Aprile', 5=>'Maggio', 6=>'Giugno', 7=>'Luglio', 8=>'Agosto', 9=>'Settembre', 10=>'Ottobre', 11=>'Novembre', 12=>'Dicembre', 13=>'Totale'];
?>

<!--GESTISCO IL CONTEGGIO DEGLI APPUNUTAMENTI-->

<?php
date_default_timezone_set('Europe/Rome');
$today = date("Y-m-d");

$sq1 = "SELECT * FROM appuntamenti WHERE data = '$today' AND tipo_pren = 'PRIVATO' ORDER BY id_app ASC";
$rs1 = $mysqli->query($sq1);
$cnt1 = mysqli_num_rows($rs1);

$sq2 = "SELECT * FROM appuntamenti WHERE data = '$today' AND tipo_pren = 'NOLEGGIO' ORDER BY id_app ASC";
$rs2 = $mysqli->query($sq2);
$cnt2 = mysqli_num_rows($rs2);

$sq3 = "SELECT * FROM appuntamenti WHERE data = '$today' AND tlav = 0 ORDER BY id_app ASC";
$rs3 = $mysqli->query($sq3);
$cnt3 = mysqli_num_rows($rs3);
?>


<!--APRO TUTTO IL DIV DEL MENU SUPERIORE-->

<div class = "container-menu-superiore">
	<div class ="row">

		<div class="col-sm-3">
			<div class="alert alert-success alert-dismissible" role="alert">
			Ciao <strong>Salzano Amedeo</strong> questa la tua agenda di oggi !
			</div>
		</div>

		<div class="col-sm-3">
		<h3><span class="badge badge-primary"><?= $cnt1 ?> app. privati</span></h3>
		</div>

		<div class="col-sm-3">
		<h3><span class="badge badge-success"><?= $cnt2 ?> app. noleggio</span></h3>
		</div>

		<div class="col-sm-3">
		<h3><span class="badge badge-danger">di cui <?= $cnt3 ?> app. senza tempi</span></h3>
		</div>

	</div>

	<div class ="row">

		<div class="col-sm-3">
			<a class="btn btn-outline-success" href="index.php?page=inserisci_appuntamento" role="button">Nuovo Appuntamento</a>
		</div>

		<div class="col-sm-3">
			<a class="btn btn-outline-success" href="index.php?page=ricerca_commessa" role="button">Ricerca Commessa</a>
		</div>
		
		<div class="col-sm-3">
			<a class="btn btn-outline-success" href="privacy/privacy.pdf" target="_blank" role="button">Stampa Privacy</a>
		</div>
		
		<div class="col-sm-3">
			<button onclick="window.location.reload();" class="btn btn-outline-warning">Aggiorna la pagina</button>
		</div>
	</div>
</div>

<!--CHIUDO TUTTO IL DIV DEL MENU SUPERIORE-->

<table class='table table-striped > fatturato'>
  <thead>
    <tr>
      <th class='intestazione_fatturato' scope='col'>Comparazione Annua<br>Fatturato Privati</th>      
      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2015
      </th>      
      
      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2016
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2017
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2018
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2019
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2020
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2021
      </th>

      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2022
      </th>
      <th class='intestazione_fatturato' scope='col'>
        Incasso<br>
        2023
      </th>
    </tr>
  </thead>

  <tbody>
  <?php
    $euro = "€";
    $anni = array_keys($fatturati);
    for($i=1; $i<=13;$i++){
        $tr = "<tr>";
        if ($i == 13) {
            $tr = '<tr style="color:yellow; background-color:black; font-weight: bold; text-align:left;">';
        }
        echo $tr.'<td>'.$mesi[$i].'</td>';
        foreach($anni as $anno)
        {
          echo '<td>'.$euro.' '.$fatturati[$anno][$i].'</td>';
        }
        echo "</tr>";
          }
  ?>
</tbody>
</table>