<?php
session_start();
include('inc/db.php');

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != 'admin') {
echo '<script language=javascript>document.location.href="logout.php"</script>';
die;
}
 
if (!isset($_GET['page'])) {
echo '<script language=javascript>document.location.href="logout.php"</script>';

}else{

/* RECUPERO LA VARIABILE GET PAGINA */
$page = addslashes($_GET['page']);

}

?>

<!doctype html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gestionale Officina">
    <meta name="author" content="Elisabetta Del Giglio">

    <title>Gestione Officina V. 2.0.2</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" />	

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/table.css" rel="stylesheet" media="screen" />
    <link href="css/home.css" rel="stylesheet" media="screen" />
    <link href="css/form.css" rel="stylesheet" media="screen" />
    <link href="css/font-awesome.min.css" rel="stylesheet" media="screen" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--INIZIO SCRIPT-->
    <script type="text/javascript" src="js/somma.js"></script>
    <script type="text/javascript" src="js/datapicker.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-i18n.js"></script>
    <!--FINE SCRIPT-->

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="inc/jquery.ui.datepicker-it.js"></script>
    <script type="text/javascript" src="js/qcTimepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

<script type="text/javascript">
   $(function() {
   var date = $('#datepicker').datepicker({ dateFormat: 'dd/mm/yy' }).val();
   var date = $('#datepicker1').datepicker({ dateFormat: 'dd/mm/yy' }).val();
   var date = $('#datepicker2').datepicker({ dateFormat: 'dd/mm/yy' }).val();
   });
</script>

<script type="text/javascript">
   $(document).ready(function() {
   $('.timepicker').qcTimepicker();
   });
</script>
</head>

<body>

    <!-- Page Content -->
    
	<div class="container white">
		<div class="header">
			<div class="logo"><a href="index.php?page=home">Gestione Officina V. 2.0.2</a></div>
		</div>

        <div class="row">

        <?php require("page/$page.php"); ?>

        </div>

        <hr>

			
				<div class="footer">
					<div class="footer-text">Officina &nbsp;|&nbsp; E-mail: info@mail.com &nbsp;|&nbsp; P.iva 01234567890 <br />
					Gestione Officina V. 2.0.2 - Copyright &copy; <?= date('Y'); ?> - All rights reserved.
					</div>
				</div>
			
	</div>
	

	
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
