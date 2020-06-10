<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_topup extends CI_Controller {
	function __construct(){
    parent::__construct();
		$this->load->model('Akun_model');
		$this->load->model('Transfer_model');
    $this->load->model('Bankadmin_model');
    $this->load->Model('Topup_model');
  }
	function bank_admin(){
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
    $bank = $this->Bankadmin_model->bankAdmin()->result_array();
		echo json_encode($bank);
  }
  function get_idbank(){
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
    $bank = $this->input->post('bank');
    $exbank = explode(' ',$bank);
    $thebank = $exbank[0];
    $array = array('bank' => $thebank);
    echo json_encode($array);
  }
  function checkout(){
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
    $bank = $this->input->post('rek_admin');
    $nominal = $this->input->post('nominal');
    $id = $this->input->post('id');
    $exbank = explode(' ',$bank);
    $rekening = $exbank[0];

    $getnow = $this->Now->getNow()->result();
    foreach ($getnow as $dn) {
      $now = $dn->now;
    }

    $getbank =$this->Bankadmin_model->nameBank($rekening)->result();
    foreach ($getbank as $value) {
      $idbank = $value->id_bank_admin;
    }

    $data = array(
      'nama_rekening' => $nama,
      'id_bank_admin' => $idbank,
      'nominal' => $nominal,
      'id_akun' => $id,
      'waktu_topup' => $now
    );

    $this->Topup_model->tambahTopup($data,'topup');
    $gettopup = $this->Topup_model->getidTopup($data)->result();
    foreach ($gettopup as $cektopup) {
      $idtopup = $cektopup->id_topup;
    }

    $response = array(
			'stat' => 'sukses',
			'id' => $idtopup
		);
    echo json_encode($response);
  }
	function detailTopup(){
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
		$data = $this->Topup_model->getTopup($id)->row();
		$response = array('data' => $data );
		echo json_encode($response);
	}
	function hapus_topup(){
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
		$this->Topup_model->deleteTopup($id);
		$response = array('stat' => 'sukses' );
		echo json_encode($response);
	}
	function allmyTopup(){
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
		$keyword = $this->input->post('keyword');
		if ($keyword=='semua') {
			$topup = $this->Topup_model->getMytopup($id)->result_array();
			echo json_encode($topup);
		}else {
			$topup = $this->Topup_model->getMytopuplim($id,$keyword)->result_array();
			echo json_encode($topup);
		}

	}
	function uploadBukti(){
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
    $stat = $this->input->post('status');

		$config['upload_path'] = './assets/barang/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

		$foto = $this->input->post('foto');
		// convert the image data from base64
    $imgData = base64_decode($foto);
    // set the image paths
    $path = './assets/topup/';
    $file = uniqid().'.png';
    $file_path = $path.$file;

		file_put_contents($file_path, $imgData);

		$data = array(
			'bukti_transfer' => $file,
			'status_topup' => $stat
		);
		$where = array( 'id_topup' => $id );

		$this->Topup_model->updateTopup($data,$where);

		$config['source_image'] = './assets/topup/'.$file;
		$config['create_thumb']= FALSE;
		$config['maintain_ratio']= FALSE;
		$config['quality']= '50%';
		$config['width']= 900;
		$config['height']= 600;
		$config['new_image'] = './assets/topup/'.$file;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		$response = array(
			'stat' => 'sukses',
			'id' => $id
		);
		echo json_encode($response);
	}
}
