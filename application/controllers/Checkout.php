<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
    $this->load->model('Bankadmin_model');
	}
  function index($nominal){
    $this->Now->updateNow();
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
    if ($nominal>=1) {
      if ($nominal>6) {
        redirect(base_url('Topup'));
      }
      $data['nominal'] = $nominal;
      $data['bankadmin'] = $this->Bankadmin_model->bankAdmin()->result();
  		$this->template->checkout('checkout',$data);
    }else {
      redirect(base_url('Topup'));
    }
	}
  function prosesCheckout(){
    $this->Now->updateNow();
    $nama = $this->input->post('nama_pembayar');
    $rekening = $this->input->post('rek_admin');
    $nominal = $this->input->post('nominal');
    $id = $this->input->post('idakun');

    $getnow = $this->Now->getNow()->result();
    foreach ($getnow as $dn) {
      $now = $dn->now;
    }

    $data = array(
      'nama_rekening' => $nama,
      'id_bank_admin' => $rekening,
      'nominal' => $nominal,
      'id_akun' => $id,
      'waktu_topup' => $now
    );

    $this->Topup_model->tambahTopup($data,'topup');
    $gettopup = $this->Topup_model->getTopup($data)->result();
    foreach ($gettopup as $cektopup) {
      $idtopup = $cektopup->id_topup;
    }
    redirect(base_url('Pembayaran/pembayaran/'.$idtopup));
  }
}
