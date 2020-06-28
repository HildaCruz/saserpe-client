<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>public/js/auctions.js"></script>
<nav class="navbar navbar-dark bg-dark">
	<a class="navbar-brand" href="#">
		<img src="../public/img/icono.svg" width="35" height="35" class="d-inline-block align-top" alt="">
		SASERPE
	</a>
	<form class="form-inline my-2 my-lg-0">
		<img src="../public/img/user.svg" width="35" height="35" class="align-top" alt="">
		<label class="mr-sm-2" style="color: #FFFFFF">&nbsp;&nbsp;<b>RFC:</b>&nbsp; <?=$this->session->userdata('rfc_usuario');?></label>
		<button id="btn_logout" type="button" class="btn btn-outline-danger my-2 my-sm-0" onclick="logout()">Cerrar sesi&oacute;n</button>
	</form>
</nav>
