<head>
	<?= link_tag('public/css/login.css'); ?>
	<script type='text/javascript' src="<?= base_url()?>public/js/auth/login.js"></script>
</head>

<body class="text-center" style="background-color: #9CD9CE;">
<div class="container" style="margin-top: 4em;">
	<div class="row justify-content-center align-items-center">
		<div class="col-7 align-self-center">
			<h1 class="h3 mb-3 font-weight-normal">Bienvenido al Sistema de Acceso a Servicios Remotos de Persistencia (SASeRPe)</h1>
		</div>
	</div>
	<form method="POST" name="form_login" id="form_login" action="<?php echo base_url();?>login/login" class="form-signin">
		<div class="form-group"><svg class="bi bi-person-circle" width="72" height="72" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
				<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
			</svg></div>

		<?php if(!empty($mensaje)) {
			$alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
					.$mensaje
					.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
					.'<span aria-hidden="true">&times;</span></button>'
					.'</div>';
			echo $alert;
		}?>

		<div id="usuario">
			<label for="usuario" class="sr-only">Usuario</label>
			<input type="text" maxlength="10" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
		</div>

		<div class="form-group" id="contrasena">
			<label for="contrasena" class="sr-only">Contrase&ntilde;a</label>
			<input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contrase&ntilde;a" required>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesi&oacute;n</button>

		<!-- Button trigger modal -->
		<div style="margin-top: 1em;">¿No tienes una cuenta?
			<a href="<?= $menu['Registro']['url'] ?>" data-toggle="modal" data-target="#registerModal"><?= $menu['Registro']['title'] ?></a>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<p class="mt-5 mb-3 text-muted">&copy; 2020</p>
	</form>

	<script>
		$('.openBtn').on('click',function(){
			$('.modal-body').load('content.html',function(){
				$('#myModal').modal({show:true});
			});
		});
	</script>

</div>
</body>
