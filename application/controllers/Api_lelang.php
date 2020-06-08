<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_lelang extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
		$this->load->model('Menang_model');
  }
	function berlangsung(){
    $id = $this->input->post('id');
		$keyword = $this->input->post('keyword');
		if ($keyword=='semua') {
			$keyword = '';
		}
    $lelang = $this->Barang_model->getlelBerlangsung($id,$keyword)->result_array();
    echo json_encode($lelang);
  }
  function kirim(){
    $id = $this->input->post('id');
		$keyword = $this->input->post('keyword');
		if ($keyword=='semua') {
			$lelang = $this->Barang_model->getlelKirim($id)->result_array();
		}else {
			$lelang = $this->Barang_model->getlelKirim2($id,$keyword)->result_array();
		}
    echo json_encode($lelang);
  }
  function selesai(){
    $id = $this->input->post('id');
		$keyword = $this->input->post('keyword');
		if ($keyword=='semua') {
			$lelang = $this->Barang_model->getlelSelesai($id)->result_array();
		}else if($keyword=='tunggu'){
			$lelang = $this->Barang_model->getlelSelesai1($id)->result_array();
		}else if($keyword=='konfirm'){
			$lelang = $this->Barang_model->getlelSelesai2($id)->result_array();
		}else if($keyword=='selesai'){
			$lelang = $this->Barang_model->getlelSelesai3($id)->result_array();
		}else if($keyword=='gagal'){
			$lelang = $this->Barang_model->getlelSelesai4($id)->result_array();
		}

    echo json_encode($lelang);
  }
  function barang(){
    $id = $this->input->post('id');

    $data = array(
      'barang.id_barang' => $id
    );
		$barang = $this->Barang_model->getBarang1($data)->row();
    $high = $this->Tawaran_model->getHighest($id)->result();
		foreach ($high as $key) {
			if ($key->jumlah_tawaran!=null) {
				$high = $this->Tawaran_model->getHighest($id)->row();
			}else {
				$high = array('jumlah_tawaran' => '0');
			}
		}

    $response = array(
			'data' => $barang,
      'high' => $high
		);
    echo json_encode($response);
  }
	function view_send(){
		$id = $this->input->post('id');
		$data = array(
      'barang.id_barang' => $id
    );
		$barang = $this->Barang_model->getBarang1($data)->row();
		$bid = $this->Menang_model->dataWinner($id)->row();
		$menang = $this->Menang_model->dataWinner($id)->result();
		foreach ($menang as $key) {
			$akun = $key->id_akun;
		}
    $winner = $this->Menang_model->thewinner($akun)->row();
		$response = array(
			'data' => $barang,
			'bid' => $bid,
      'winner' => $winner
		);
    echo json_encode($response);
	}
	function to_send(){
		$id = $this->input->post('id');
		$change = array('status_lelang' => 'kirim' );
    $this->Barang_model->chStat($id,$change);
		$thisId = array('id_barang' => $id);
		$response = array('data' => $thisId);
    echo json_encode($response);
	}
	function view_trans(){
		$id = $this->input->post('id');
		$barang = $this->Barang_model->getBarangTrans($id)->row();
		$bid = $this->Menang_model->dataWinner($id)->row();
		$response = array(
			'data' => $barang,
			'bid' => $bid
		);
    echo json_encode($response);
	}
	function proses_konfirm(){
		$id = $this->input->post('id');
		$change = array('status_transfer' => 'terima' );
    $this->Barang_model->chStat($id,$change);
		$thisId = array('id_barang' => $id);
		$response = array('data' => $thisId);
    echo json_encode($response);
	}
}
