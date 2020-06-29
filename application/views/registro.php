<head>
	<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
	<?= link_tag('/public/css/register.css'); ?>

</head>

<body>
<div class="container row" style="margin-top: 3em;">
	<div class="col">
		<h1 class="h3 mb-3 font-weight-normal text-center">Crea tu cuenta</h1>
		<form>
			<div class="form-group row">
				<label class="control-label">RFC:</label>
				<input type="text" maxlength="13" id="usuario" name="usuario" class="form-control" placeholder="RFC" required autofocus>
			</div>

			<div class="form-group row">
				<label for="nombre" class="control-label">Nombre:</label>
				<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
			</div>

			<div class="form-group row">
				<div class="form-group col-6 pl-0">
					<label for="password" class="control-label">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
				</div>

				<div class="form-group col-6 pr-0">
					<label for="confirm" class="control-label">Confirmar:</label>
					<input type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirmar contrase&ntilde;a" required>
				</div>
			</div>
			<div>
				<a class="btn btn-secondary" href="http://localhost/saserpe-client/" ">Regresar</a>
				<button class="btn btn-primary" type="submit">Crear</button>
			</div>
		</form>
	</div>
</div>
</body>
