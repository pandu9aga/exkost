<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
	}
  function index($id){
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['id_barang'] = $id;
    $data['barang'] = $this->Barang_model->getAll()->result();
		$this->template->barang('barang',$data);
	}
}
