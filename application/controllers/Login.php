<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('cabecera');
		$this->load->helper(array('getmenu', 'string', 'html'));
		$this->load->library(array('form_validation', 'session'));
	}

	public function index() {
		$data['menu'] = main_menu();
		$data["mensaje"] = "";
		if ($this->session->userdata('rfc_usuario')){
			$this->load->view('subastas', $data);
		}else{
			$this->load->view('login', $data);
		}
	}

	public function validate() {
		//En caso de que no tenga error.
		$nombre = $this->input->post('usuario');
		$password = $this->input->post('contrasena');
		$this->session->set_userdata('rfc_usuario',$nombre);
	}

	public function login(){
		
		$data['menu'] = main_menu();
		

		if($this->session->userdata('id_sesion')){
			//$this->load->view('cabecera');
			$this->load->view('subastas', $data);
		} else{
			$curl = curl_init();
			$datos = $this->input->post();
			$nombre = $datos['usuario'];
			$password = $datos['contrasena'];
			$sessionID = random_string('alnum', 8);

			$request = '{
				"RFC_usuario": "'.$nombre.'",
				"password": "'.$password.'",
				"session_id" : "'.$sessionID.'"
			}';
			curl_setopt($curl, CURLOPT_URL, 'http://localhost:8080/login-usuario');
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
			$result = curl_exec($curl);
			$err = curl_error($curl);
	
			if($err) {
				print_r($err);
				$data['error'] = $err;
	
				//$this->load->view('cabecera');
				$this->load->view('login', $data);
			} else {
				$response = json_decode($result, true);
				if (!$response['login']){
					$mensaje = $response['mensaje'];
					$data['mensaje'] = $mensaje;
					//$this->load->view('cabecera');
					$this->load->view('login', $data);
				} else{
					$this->session->set_userdata('rfc_usuario',$nombre);
					$this->session->set_userdata('id_sesion',$sessionID);
					//$this->load->view('cabecera');
					$this->load->view('subastas', $data);
				}
			}
		}
	}

	public function logout(){
		$data['menu'] = main_menu();
		$data["mensaje"] = "";
		$this->load->library('session');
		$this->session->unset_userdata('rfc_usuario');
        $this->session->unset_userdata('id_sesion');
        $this->session->sess_destroy();

		//$this->load->view('cabecera');
		$this->load->view('login', $data);
	}
}
