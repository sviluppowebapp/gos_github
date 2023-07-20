<form class="form" method="post" id="modulo" action="index.php?page=salva_noleggio" enctype="multipart/form-data">
	<div class="form-container">
		<div class="card-commesse">
		  <div class="card-header"><h3><center>CARICA CLIENTE NOLEGGIO</center></h3></div>
			<div class="card-block">

				<div class="row">
					<div class="col-md-4">
						  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="" placeholder="Data Inizio Noleggio" name="data_inizio" value="01/01/2015" readonly="readonly">
						  </div>
					</div>

					<div class="col-md-4">
						  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
							<input type="text" class="form-control" id="datepicker2" placeholder="Data Fine Noleggio" name="data_fine" required="required">
						  </div>
					</div>	
				</div>	
				
				<hr>

				<div class="row">
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" class="form-control" aria-hidden="true" name="cliente" maxlength="30" required="required" placeholder="Cliente-Società">
						  </div>
					</div>

					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="veicolo" placeholder="Veicolo" required="required">
						  </div>
					</div>
					
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="targa" placeholder="Targa" required="required">
						  </div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-4">
						<label class="sr-only" for="stato_pren">Gestore</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
								<select class="form-control" select name="gestore" id="gestore" required="required" >
									<?php
										$sq1 = "SELECT * FROM gestore ORDER BY gestore ASC";
										$rs1 = $mysqli->query($sq1);
										echo "<option value=''>Società Noleggio...</option>";
										while ($row = $rs1->fetch_array(MYSQLI_ASSOC)) {
										$gestore = mysqli_real_escape_string($mysqli, strtoupper($row['gestore']));
										echo "<option value='$gestore'>$gestore</option>";
										}
									?>
									</select>
							</div>

					</div>
					
					<div class="col-md-4">
						  <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
						  </div>
					</div>

					<div class="col-md-4">
						<label class="sr-only" for="email">Email</label>
							<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" placeholder="Email" >
							</div>
					</div>

				</div>

				<hr>

				<div class="row">
					<div class="col-12">
						<div class="form-group has-danger">
							<label for="note">Note</label>
							<textarea class="form-control" name= "note" id="note" rows="5" maxlength="90" placeholder="Max 90 caratteri"></textarea>
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" name="submit" class="btn btn-success right" onclick="return confirm('Confermi di voler caricare il cliente ?')">Registra Cliente</button>
				</div>

			</div>
		</div><!--Close Div card-commesse-->
	</div><!--Close Div Container-->
</form>
