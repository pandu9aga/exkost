<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
	}
  function index(){
    $this->Now->updateNow();
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
		$this->template->topup('topup',$data);
	}
}
