<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
<?= link_tag('public/css/register.css'); ?>

<div class="container" style="margin-top: 3em;">
	<h1 class="h3 font-weight-normal text-center">Registra una empresa</h1><br>
	<form id="form_company">
		<div class="form-group">
			<label class="control-label">RFC:</label>
			<input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC" required minlength="10" maxlength="10" autofocus>
		</div>

		<div class="form-group row" style="margin-bottom: -1px;">
			<div class="form-group col-6">
				<label class="control-label">Acciones disponibles:</label>
				<input type="number" min="0" step="1" id="acciones" name="acciones" class="form-control" placeholder="Disponibles" required>
			</div>

			<div class="form-group col-6">
				<label class="control-label">Total acciones:</label>
				<input type="number" min="0" step="1" id="accionesTotal" name="accionesTotal" class="form-control" placeholder="Total" required>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label">Precio acciones:</label>
			<input type="number" min="0.0" step="0.01" value="0.00" id="precio" name="precio" class="form-control" placeholder="Precio acciones" required>
		</div>

		<div>
			<button class="btn btn-primary" type="submit">Crear</button>
		</div>
		<div>
			<a class="btn btn-secondary" href="http://localhost/saserpe-client/" ">Regresar</a>
		</div>
	</form>
</div>
