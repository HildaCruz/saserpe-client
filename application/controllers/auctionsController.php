<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class AuctionsController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
    }
    public function index() {
        //$this->load->library('session');

        //$data = array();
        
        $data["string"] = "hola";
        $this->load->view('auctions', $data);
    }

    public function api(){

    }
}
