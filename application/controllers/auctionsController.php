<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class AuctionsController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        //$data = array();
        $data["string"] = "k";
        $this->load->view('auctions', $data);
    }

    public function api(){

    }
}
