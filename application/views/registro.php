<head>
	<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
	<?= link_tag('/public/css/register.css'); ?>

</head>

<body>
<div class="container row" style="margin-top: 3em;">
	<div class="col">
		<h1 class="h3 mb-3 font-weight-normal text-center">Crea tu cuenta</h1>
		<form id="form_registro">
			<div class="form-group row">
				<label class="control-label col-2">RFC:</label>
				<div class="col">
					<input type="text" id="usuario" name="usuario" class="form-control" placeholder="RFC" required minlength="10" maxlength="10" autofocus>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-2">Nombre:</label>
				<div class="col">
					<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-6">
					<div class="row">
						<label class="control-label col-3">Password:</label>
						<div class="col">
							<input type="password" id="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
						</div>
					</div>
				</div>

				<div class="form-group col-6">
					<div class="row">
						<label class="control-label col-3">Confirmar:</label>
						<div class="col">
							<input type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirmar" required>
						</div>
					</div>
				</div>
			</div>
			<div>
				<button class="btn btn-primary" type="submit">Crear</button>
			</div>
		</form>
	</div>
</div>
</body>
