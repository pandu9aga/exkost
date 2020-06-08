<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_cari extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
		$this->load->model('Transfer_model');
  }
  function cari(){
    $id = $this->input->post('id');
    $keyword = $this->input->post('keyword');
    $barang = $this->Barang_model->getCari($id,$keyword)->result_array();
    echo json_encode($barang);
  }
}
