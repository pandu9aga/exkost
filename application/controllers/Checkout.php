<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
    $this->load->model('Bankadmin_model');
	}
  function index($nominal){
    $this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
    if ($nominal>=1) {
      if ($nominal>6) {
        redirect(base_url('topup'));
      }
      $data['nominal'] = $nominal;
      $data['bankadmin'] = $this->Bankadmin_model->bankAdmin()->result();
  		$this->template->checkout('checkout',$data);
    }else {
      redirect(base_url('topup'));
    }
	}
  function prosesCheckout(){
    $this->Now->updateNow();
    $done['now'] = $this->Now->getNow()->result();
    $done['all'] = $this->Done_model->allLelang()->result();
    $selesai = $this->done->selesai($done);
    if ($selesai!=NULL) {
      foreach ($selesai as $value) {
        $ids[] = $value;
      }
      $this->Done_model->changeStat($ids);
      foreach ($ids as $thisid) {
        $win = $this->Done_model->listTawaran($thisid)->num_rows();
        if ($win!=0) {
          $wins = $this->Done_model->winnerBid($thisid)->result();
          foreach ($wins as $datawin) {
            $jumbid = $datawin->jumlah_tawaran;
          }
          $winner = $this->Done_model->winnerData($jumbid,$thisid)->result();
          foreach ($winner as $w) {
            $this->Done_model->insertWinner($w->id_tawaran);
          }
        }else {
          $this->Done_model->changeStatl($thisid);
        }
      }
    }
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
    $gettopup = $this->Topup_model->getidTopup($data)->result();
    foreach ($gettopup as $cektopup) {
      $idtopup = $cektopup->id_topup;
    }
    redirect(base_url('pembayaran/detail_pembayaran/'.$idtopup));
  }
}
