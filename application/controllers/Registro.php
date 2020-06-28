<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->view('cabecera');
		$this->load->helper(array('html'));
	}

	public function index() {
		$this->load->view('registro');
	}

	public function registerCompany() {
		$this->load->view('empresa');
	}
}
