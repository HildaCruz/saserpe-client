<head>
	<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
</head>

<body>
<div class="container" style="margin-top: 4em;">
	<div class="row justify-content-center align-items-center">
		<div class="col-12 align-self-center"> <!--col de 7-->
			<h1 class="h3 mb-3 font-weight-normal text-center">Registra una empresa</h1><br>
			<form id="form_company">
				<div class="form-group row">
					<label class="control-label col-3">RFC:</label>
					<div class="col-9">
						<input type="text" maxlength="10" id="rfc" name="rfc" class="form-control" placeholder="RFC" required autofocus>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-6">
						<div class="row">
							<label class="control-label col-8">Acciones disponibles:</label>
							<div class="col-4">
								<input type="number" id="acciones" name="acciones" class="form-control" placeholder="Disponibles" required>
							</div>
						</div>
					</div>

					<div class="form-group col-6">
						<div class="row">
							<label class="control-label col-8">Total acciones:</label>
							<div class="col-4">
								<input type="number" id="accionesTotal" name="accionesTotal" class="form-control" placeholder="Total" required>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Precio acciones:</label>
					<div class="col-9">
						<input type="number" step="0.01" id="precio" name="precio" class="form-control" placeholder="Precio acciones" required>
					</div>
				</div>

				<div>
					<button class="btn btn-sm btn-primary btn-block" style="width:100px;" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
