<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
    $this->load->model('Tawaran_model');
	}
  function index($id){
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
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
    $data['id_barang'] = $id;

    $cektawaran = $this->Tawaran_model->getHighest($id)->result();
    if ($cektawaran!=NULL) {
      $data['tawaran'] = $cektawaran;
    }

    $cekmybid = $this->Tawaran_model->getMybid($id,$id_akun)->num_rows();
    if ($cekmybid!=0) {
      $data['mybid'] = $this->Tawaran_model->getMybid($id,$id_akun)->result();
    }

    $cekalltawaran = $this->Tawaran_model->getBid($id)->result();
    if ($cekalltawaran!=NULL) {
      $data['bid'] = $cekalltawaran;
    }
    $data['totbid'] = $this->Tawaran_model->getBid($id)->num_rows();

    $data['barang'] = $this->Barang_model->getAll()->result();

		$this->template->barang('barang',$data);
	}
}
