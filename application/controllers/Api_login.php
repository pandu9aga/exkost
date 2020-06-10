<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_login extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Vue_model');
		$this->load->model('Akun_model');
  }
	function index(){
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
    $this->load->view('viewvue.php');
  }
  function data_api(){
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
    $query = $this->Vue_model->allAccount()->result();
    //echo json_encode($query);
		//$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if ($query!=0) {
			$akun = $this->Vue_model->allAccount()->result();
			$response = array(
				'status' => 'true',
				'message' => 'Login Sukses',
				'data' => $akun
			);
			echo json_encode($response);
		}
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
		$data['email_akun'] = $this->input->post('email');
    $data['pass_akun'] = $this->input->post('password');
		$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if ($cek!=0) {
			$akun = $this->Akun_model->loginAkun($data)->row();
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
		$akun = $this->Akun_model->dataAkun($data)->row();
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
		$data['nama_akun'] = $this->input->post('nama');
    $data['alamat_akun'] = $this->input->post('alamat');
		$data['no_telp_akun'] = $this->input->post('notelp');
    $data['rekening_akun'] = $this->input->post('norek');
		$data['email_akun'] = $this->input->post('email');
    $data['pass_akun'] = $this->input->post('password');

		$cekemail = $this->Akun_model->cekEmail($data)->num_rows();
		if ($cekemail==0) {
			$regis = $this->Akun_model->registerAkun1($data,'akun');
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
		}else {
			$response = array(
				'status' => "fail",
				'message' => "Email telah terdaftar"
			);
			echo json_encode($response);
		}
	}
}
