<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_cart extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
    $this->load->model('Cart_model');
		$this->load->model('Akun_model');
		$this->load->model('Tawaran_model');
  }
	function cart(){
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
			$barang = $this->Cart_model->getMyCart($id)->result();
      foreach ($barang as $data) {
        $high = $this->Cart_model->getHighb($data->id_barang)->result();
    		foreach ($high as $key) {
    			if ($key->jumlah_tawaran!=null) {
    				$no = $this->Cart_model->getHighb($data->id_barang)->result();
            foreach ($no as $value) {
              $nom = $value->jumlah_tawaran;
            }
    			}else {
    				$nom = '0';
    			}
    		}
        $data->high = $nom;
      }
      $response = $barang;
	    echo json_encode($response);
    }
  }
	function delcart(){
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
		$akun = $this->input->post('id_akun');
		$id = $this->input->post('id');
		$this->Tawaran_model->delBid($akun,$id);
		$thisId = array('id_barang' => $id);
		$response = array('data' => $thisId);
		echo json_encode($response);
	}
}
