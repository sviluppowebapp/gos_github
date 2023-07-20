<?php
	include "db_connection.php";
?>
<html>
<head>
<?php
	include "header.php";
?>
<script type="text/javascript">
<?php
	if(isset($_GET['id'])){
		echo "var id_contact = ".$_GET['id'].";";
	} else {
		echo "var id_contact = '';";
	}
?>
function aggiornadati() {	  
		$.ajax({
		  type: "POST",
		  url: "script/contact_load.php",
		  async:false,
		  data: {id_contact:id_contact},
		  dataType: "html",
		  success: function(msg)
		  {
			$("#tabella").html(msg);
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		}  
		});
					
  };
function new_contact(){
	document.getElementById('elenco').className='hidden';
	document.getElementById('new_contact').className='col-md-6 col-md-offset-3 show';	
 }
 function back(){
	document.getElementById('elenco').className='col-md-12';
	document.getElementById('new_contact').className='hidden';
 }
 function save_contact(){	
	var cognome = document.getElementById('cognome').value;
	var nome = document.getElementById('nome').value;
	var telefono = document.getElementById('telefono').value;
	var email = document.getElementById('email').value;
						$.ajax({
						  type: "POST",
						  url: "script/contact_add.php",
						  async:false,
						  data: {cognome:cognome,nome:nome,telefono:telefono,email:email},
						  dataType: "html",
						  success: function(msg)
						  {
							document.getElementById('new_contact').className='hidden';
							document.getElementById('elenco').className='col-md-12 show';
							id_contact = msg;
							aggiornadati();
						  },
						  error: function(XMLHttpRequest, textStatus, errorThrown) { 
							alert("Status: " + textStatus); alert("Error: " + errorThrown); 
						}  
						});
 }
 function update(iditem) {
			  var cognome_mod = document.getElementById('cognome_mod'+ iditem).value;
			  var nome_mod = document.getElementById('nome_mod' + iditem).value;
			  var telefono_mod = document.getElementById('telefono_mod' + iditem).value;
			  var email_mod = document.getElementById('email_mod' + iditem).value;
			  
				$.ajax({
				  type: "POST",
				  url: "script/contact_update.php",
				  
				  async:false,
				  
				  data: {iditem:iditem,cognome_mod:cognome_mod,nome_mod:nome_mod,telefono_mod:telefono_mod,email_mod:email_mod},
				  dataType: "html",
				  success: function(msg)
				  {
					id_contact = iditem;
					setTimeout(function () {
							aggiornadati();
						}, 500);
				  },
				  error: function(XMLHttpRequest, textStatus, errorThrown) { 
					alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				}  
				});
  };
  function delete_item(id){
	  id_contact = id;
	  if(confirm("Confermi Eliminazione?")){
		  $.ajax({
				  type: "POST",
				  url: "script/contact_delete.php",
				  async:false,
				  data: {id_contact:id_contact},
				  dataType: "html",
				  success: function(msg)
				  {
					id_contact = "";
					aggiornadati();
				  },
				  error: function(XMLHttpRequest, textStatus, errorThrown) { 
					alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				}  
		  });
	  }
  }
  function vcard(id){
	window.open("fpdf/pdf_vcard.php?id=" + id,'_blank');
}
  function pdf_book(){
	window.open("fpdf/pdf_book.php",'_blank');
}
function cerca(){
	  id_contact = "";
	  document.getElementById('row_elenco').className='row show';
	  var testo = document.getElementById('testo_da_cercare').value;
	  
	  if(testo){
				$.ajax({
				  type: "POST",
				  url: "script/contact_load_search.php",
				  async:false,
				  data: {testo:testo},
				  dataType: "html",
				  success: function(msg)
				  {
					$("#tabella").html(msg);
				  },
				  error: function(XMLHttpRequest, textStatus, errorThrown) { 
					alert("Status: " + textStatus); alert("Error: " + errorThrown); 
				}  
				});
	  } else {
		  aggiornadati();
	  }
  }
</script>
<script type="text/javascript">
	$(document).ready(function() {
		aggiornadati();
		document.getElementById('testo_da_cercare').focus();
	});
</script>
</head>
<body>
<div class="container-fluid" style="margin-top: 20px;">
<?php
	include "navbar.php";
?>
</div>
<div class="container-fluid">
<div class='row'>
		<div class='col-xs-12 col-md-3'>
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<h1><i class='fa fa-address-book text-primary' aria-hidden='true'></i> Contatti</h1>
			</div>
			<div class='panel-body'>
				<div class='input-group input-group-sm'>
				  <input type='text' class='form-control' id='testo_da_cercare' placeholder='Cerca'>
				  <span class='input-group-btn'>
					  <button class='btn btn-primary' onclick='cerca()' id='btn_cerca'><span class='glyphicon glyphicon-search'></span></button>
					  <button class='btn btn-success' type='button' onclick='new_contact()' title='Nuovo'><i class='fa fa-user-plus' aria-hidden='true'></i></button>
					  <button class='btn btn-primary' type='button' onclick='pdf_book()' title='Book'><i class='fa fa-address-book' aria-hidden='true'></i></button>
					  <a class='btn btn-success' href='script/contacts_excel.php' target='_new' title='Esporta in excel'><i class='fa fa-file-excel-o' aria-hidden='true'></i></a>
					</span>
				</div>						
			</div>
		</div>
		</div>
	</div>
	<div class="row" id='row_elenco'>
		<div class='col-md-12' id="elenco">
			<span id="tabella">....</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 hidden" id='new_contact'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
					<div class='row'>
					<div class="col-md-6">
						<h2>Contatto</h2>
					</div>
					<div class="col-md-6">
						<button class='btn btn-primary pull-right' onclick='back()' title='Close'><i class="fa fa-times-circle" aria-hidden="true"></i></button>
					</div>
					</div>
				</div>
				<div class='panel-body'>
					<div class="col-md-12">
						<div class='form-group form-group-sm'>
						<label>Cognome</label>
							<input type='text' class='form-control' id='cognome'>
						</div>
						<div class='form-group form-group-sm'>
						<label>Nome</label>
							<input type='text' class='form-control' id='nome'>
						</div>
						<div class='form-group form-group-sm'>
						<label>Telefono</label>
							<input type='text' class='form-control' id='telefono'>
						</div>
						<div class='form-group form-group-sm'>
						<label>Email</label>
							<input type='email' class='form-control' id='email'>
						</div>
						<button type='button' class='btn btn-success btn-lg' onclick="save_contact()" title='Save'>Salva</button>
					</div>	
				</div>
				
		</div>
		</div>
	</div>
</div>
</body>
</html>