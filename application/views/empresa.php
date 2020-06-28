<script type='text/javascript' src="<?= base_url()?>public/js/auth/create.js"></script>
<?= link_tag('public/css/register.css'); ?>

<div class="container row" style="margin-top: 4em;">
	<div class="col">
		<h1 class="h3 mb-3 font-weight-normal text-center">Registra una empresa</h1><br>
		<form id="form_company">
			<div class="form-group row">
				<label class="control-label col-3">RFC:</label>
				<div class="col">
					<input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC" required minlength="10" maxlength="10" autofocus>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-6">
					<div class="row">
						<label class="control-label col">Acciones disponibles:</label>
						<div class="col">
							<input type="number" min="0" step="1" id="acciones" name="acciones" class="form-control" placeholder="Disponibles" required>
						</div>
					</div>
				</div>

				<div class="form-group col-6">
					<div class="row">
						<label class="control-label col">Total acciones:</label>
						<div class="col">
							<input type="number" min="0" step="1" id="accionesTotal" name="accionesTotal" class="form-control" placeholder="Total" required>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-3">Precio acciones:</label>
				<div class="col-9">
					<input type="number" min="0.0" step="0.01" value="0.00" id="precio" name="precio" class="form-control" placeholder="Precio acciones" required>
				</div>
			</div>

			<div>
				<button class="btn btn-primary" type="submit">Crear</button>
			</div>
		</form>
	</div>
</div>
</body>
