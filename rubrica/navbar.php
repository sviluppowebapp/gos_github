<?php	
echo "<nav class='navbar navbar-default'>";
  echo "<div class='container-fluid'>";
	echo "<div class='navbar-header'>";
	  echo "<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>";
		echo "<span class='sr-only'>Toggle navigation</span>";
		echo "<span class='icon-bar'></span>";
		echo "<span class='icon-bar'></span>";
		echo "<span class='icon-bar'></span>";
	  echo "</button>";
	  echo "<a class='navbar-brand' href='index.php'><i class='fa fa-home text-success' aria-hidden='true'> Torna alla home contatti</i></a>";
	echo "</div>";
	echo "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
	  echo "<ul class='nav navbar-nav'>";
		echo "<li><a href='http://192.168.10.30/gos/index.php?page=home' target='_new'><i class='fa fa-window-restore' aria-hidden='true'></i> Torna al gestionale</a></li>";
		/*echo "<li><a href='http://fontawesome.io/' target='_new'><i class='fa fa-area-chart text-success' aria-hidden='true'></i> Fontawesome</a></li>";*/
		/*echo "<li><a href='https://www.apachefriends.org/it/index.html' target='_new'><i class='fa fa-calendar-check-o text-danger' aria-hidden='true'></i> Xampp</a></li>";*/
		/*echo "<li><a href='http://www.fpdf.org/' target='_new'><i class='fa fa-file-pdf-o text-info' aria-hidden='true'></i> FPDF</a></li>";*/
		echo "</ul>";
	   echo "<ul class='nav navbar-nav navbar-right'>";		
		echo "<li><a href='#' target='_new' title='About author'><img src='img/dx_image.png' width></a></li>";
	   echo "</ul>";
	echo "</div><!-- /.navbar-collapse -->";
  echo "</div><!-- /.container-fluid -->";
echo "</nav>";
?>
