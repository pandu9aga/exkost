<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {
  function __construct(){
		parent::__construct();

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
	}
  public function Bantuan(){
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
    if($this->session->userdata('status') == "login"){
			$id_akun = $this->session->userdata('id_akun');
      $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
      $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
      $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
		}

    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['barang'] = $this->Barang_model->getAll()->result();
    $this->load->view('bantuan',$data);
  }
}
