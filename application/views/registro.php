<head>
	<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
</head>

<body>
<div class="container" style="margin-top: 4em;">
	<div class="row justify-content-center align-items-center">
		<div class="col-12 align-self-center"> <!--col de 7-->
			<h1 class="h3 mb-3 font-weight-normal text-center">Crea tu cuenta</h1><br>
			<form id="form_registro">
				<div class="form-group row">
					<label class="control-label col-3">RFC:</label>
					<div class="col-9">
						<input type="text" maxlength="10" id="usuario" name="usuario" class="form-control" placeholder="RFC" required autofocus>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Nombre:</label>
					<div class="col-9">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-6">
						<div class="row">
							<label class="control-label col-3">Password:</label>
							<div class="col-9">
								<input type="password" id="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
							</div>
						</div>
					</div>

					<div class="form-group col-6">
						<div class="row">
							<label class="control-label col-3">Confirmar:</label>
							<div class="col-9">
								<input type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirmar contrase&ntilde;a" required>
							</div>
						</div>
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
