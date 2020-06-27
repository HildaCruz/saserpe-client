<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('getmenu', 'auth/login_rules'));
		$this->load->library(array('form_validation'));
	}

	public function index() {
		$data['menu'] = main_menu();
		$this->load->view('cabecera');
		$this->load->view('login', $data);
	}

	public function validate() {
		//En caso de que no tenga error.
		$nombre = $this->input->post('usuario');
		$password = $this->input->post('contrasena');
	}
}
