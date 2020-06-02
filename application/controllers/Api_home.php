<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_home extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
  }
	function home(){
    //$id = $this->input->post('id');
    //$barang = $this->Barang_model->getNotmy($id)->result();
		$barang = $this->Barang_model->getAllberlangsung()->result_array();
    echo json_encode($barang);
  }
}
