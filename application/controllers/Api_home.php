<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_home extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
  }
	function home(){
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
    $id = $this->input->post('id');
    if ($id!=null) {
			$barang = $this->Barang_model->getNotmy($id)->result_array();
			//$barang = $this->Barang_model->getAllberlangsung()->result_array();
	    echo json_encode($barang);
    }
  }
}
