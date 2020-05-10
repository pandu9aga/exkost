<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tawaran extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
    $this->load->model('Barang_model');
	}
  function tawar(){
    $this->Now->updateNow();
    $jumlah = $this->input->post('jumlah');
    $id_akun = $this->input->post('id_akun');
    $id_barang = $this->input->post('id_barang');

    $data = array(
      'id_barang' => $id_barang,
      'id_akun' => $id_akun,
      'jumlah_tawaran' => $jumlah
    );

    $cekmybid = $this->Tawaran_model->getMybid($id_barang,$id_akun)->num_rows();
    if ($cekmybid!=0) {
      $this->Tawaran_model->updateMybid($data)->result();
      redirect(base_url('Barang/index/'.$id_barang));
    }else {
      $this->Tawaran_model->insertMybid($data)->result();
      redirect(base_url('Barang/index/'.$id_barang));
    }
  }
}
