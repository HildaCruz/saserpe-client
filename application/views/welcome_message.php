<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es  ">
<head>
	<meta charset="utf-8">
	<title>SASERPE</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>

<div class="container">
	<h1>Bienvenido al Sistema de Acceso a Servicios Remotos de Persistencia (SASeRPe)</h1>

    <div id="body">
        <input placeholder="correo">
        <input type="password" placeholder="contraseña">
        <button>Login</button>
    </div>
    <button>Sign up</button>
</div>
<div class="container">
	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>