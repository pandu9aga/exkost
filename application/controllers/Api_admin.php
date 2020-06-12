<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_admin extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Admin_model');
		$this->load->model('Akun_model');
  }
	function login(){
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
		$data['nama_admin'] = $this->input->post('username');
    $data['pass_admin'] = $this->input->post('password');
		$cek = $this->Admin_model->loginAdmin($data)->num_rows();
		if ($cek!=0) {
			$akun = $this->Admin_model->loginAdmin($data)->row();
			$response = array(
				'status' => "true",
				'message' => "Login Sukses",
				'data' => $akun
			);
			echo json_encode($response);
		}else {
			$response = array(
				'status' => "false",
				'message' => "Akun tidak ditemukan"
			);
			echo json_encode($response);
		}
	}
	function akun(){
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
		$data = $this->input->post('id');
		$akun = $this->Admin_model->dataAdmin($data)->row();
		$response = array(
			'data' => $akun
		);
		echo json_encode($response);
	}
	function register(){
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
		$data['nama_admin'] = $this->input->post('nama');
    $data['pass_admin'] = $this->input->post('password');

    $regis = $this->Admin_model->registerAdmin($data,'admin');
    if ($regis!=0) {
      $response = array(
        'status' => "success",
        'message' => "Registrasi berhasil"
      );
      echo json_encode($response);
    }else {
      $response = array(
        'status' => "fail",
        'message' => "Registrasi gagal"
      );
      echo json_encode($response);
    }
	}
  function update_profil(){
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $id = $this->input->post('id');

    $data = array(
      'nama_admin' => $nama,
      'pass_admin' => $password
    );
    $where = array( 'id_admin' => $id );
    $this->Akun_model->updateProfil($data,$where);

		$idakun = array('id_admin' => $id);
		$response = array(
      'data' => $idakun,
			'stat' => 'true'
    );
    echo json_encode($response);
  }
}
