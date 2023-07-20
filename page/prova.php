<?php
$anno   = date("Y",strtotime("+4 days"));
$mese   = date("m",strtotime("+4 days"))-1;
$giorno = date("j",strtotime("+4 days"));
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function(){

(+new Date(<?php echo $anno;?>, <?php echo $mese;?>, <?php echo $giorno;?>));

/* JS PER CALENDARIO DATA PICKER */

    $(function(){
        $( "#datepicker" ).datepicker();
        $.datepicker.setDefaults( $.datepicker.regional[ "it" ] );
    });

    $(function(){
        $( "#datepicker1" ).datepicker();
        $.datepicker1.setDefaults( $.datepicker.regional[ "it" ] );
    });
});
</script>

</head>
<body>
<form class="form" name="inscomm" method="post" id="modulo" action="index.php?page=salva_commessa" enctype="multipart/form-data">
  <div class="form-container">
    <div class="card-commesse">
      <div class="card-header">Anagrafica Cliente
      </div>
      <div class="card-block">
        <div class="row">
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
              <input type="text" class="form-control" id="datepicker" placeholder="Data Commessa" name="data" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon"><i class="far fa-calendar-alt" aria-hidden="true"></i></span>
              <input type="text" class="form-control" id="datepicker1" placeholder="Scadenza Revisione" name="dtscrev" autocomplete="off">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

</body>
</html>

