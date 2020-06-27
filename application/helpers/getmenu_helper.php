<?php

function main_menu(){

	return array(
		'Login' => array(
			'title' => 'Iniciar Sesion',
			'url' => base_url(),
		),

		'Registro' => array(
			'title' => 'Registrate',
			'url' => base_url('/registro'),
		)
	);
}

