<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_login extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Vue_model');
  }
	function index(){
    $this->load->view('viewvue.php');
  }
  function data_api(){
    $query = $this->Vue_model->allAccount()->result();
    echo json_encode($query);
  }
}
