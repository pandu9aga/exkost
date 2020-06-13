<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_admin extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Admin_model');
		$this->load->model('Akun_model');
		$this->load->model('Jenis_model');
		$this->load->model('Topup_model');
		$this->load->model('Notif_model');
		$this->load->model('Transfer_model');
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
		$nama = $this->input->post('nama');
    $password = $this->input->post('password');

    $data = array(
      'nama_admin' => $nama,
			'pass_admin' => $password
    );

		$cekNama = $this->Admin_model->cekNama($data)->num_rows();
		if ($cekNama == 0) {
			$this->Admin_model->registerAdmin($data,'admin');
			$response = array(
        'status' => "success",
        'message' => "Registrasi berhasil"
      );
      echo json_encode($response);
		}
		else {
			$response = array(
        'status' => "fail",
        'message' => "Admin sudah ada"
      );
      echo json_encode($response);
		}
	}
  function update_profil(){
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
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $id = $this->input->post('id');

    $data = array(
      'nama_admin' => $nama,
      'pass_admin' => $password
    );
    $where = array( 'id_admin' => $id );
    $this->Admin_model->updateProfil($data,$where);

		$idakun = array('id_admin' => $id);
		$response = array(
      'data' => $idakun,
			'stat' => 'true'
    );
    echo json_encode($response);
  }
	function data_jenis(){
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
    $data = $this->Jenis_model->jenisBarang()->result();
		echo json_encode($data);
  }
	function get_jenis(){
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
		$id = $this->input->post('id_jenis');
		$data = $this->Jenis_model->getjenis($id)->row();
		echo json_encode($data);
	}
  function proses_cjenis(){
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
    $nama = $this->input->post('nama_jenis');

    $cek = $this->Jenis_model->idJenis2($nama)->num_rows();
    if ($cek==0) {
      $insertdata = array('nama_jenis_barang' => $nama );
      $this->Jenis_model->tambahJenis($insertdata);

			$id = $this->Jenis_model->idJenis2($nama)->row();

			$response = array(
				'pesan' => 'success',
				'data' => $id
	    );
	    echo json_encode($response);
    }
    else {
			$response = array(
				'pesan' => 'fail'
	    );
	    echo json_encode($response);
    }
  }
  function proses_ujenis(){
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
    $nama = $this->input->post('nama_jenis');
    $id = $this->input->post('id_jenis');

    $cek = $this->Jenis_model->getjenis($id)->num_rows();
    if ($cek!=0) {
      $updatedata = array('nama_jenis_barang' => $nama );
      $this->Jenis_model->editJenis($updatedata,$id);

			$response = array(
				'pesan' => 'true'
	    );
	    echo json_encode($response);
    }
  }
  function proses_djenis(){
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
		$id = $this->input->post('id_jenis');
    $cek = $this->Jenis_model->getjenis($id)->result();
    foreach ($cek as $key) {
      $nama = $key->nama_jenis_barang;
    }
    $this->Jenis_model->hapusJenis($id);
		$response = array(
			'pesan' => 'true'
		);
		echo json_encode($response);
  }
	function allTopup(){
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
		$keyword = $this->input->post('keyword');
		if ($keyword=='semua') {
			$topup = $this->Topup_model->getAll()->result_array();
			echo json_encode($topup);
		}else {
			$topup = $this->Topup_model->getAlltopuplim($keyword)->result_array();
			echo json_encode($topup);
		}
	}
	function changestatTop(){
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
		$idtopup = $this->input->post('id');
		$stat = $this->input->post('status');
		if ($stat=='sukses') {
			$get = $this->Topup_model->getTopup($idtopup)->result();
	    foreach ($get as $topup) {
	      $id_akun = $topup->id_akun;
	      $saldo = $topup->saldo_akun;
	      $nominal = $topup->nominal;
	    }
	    $topup = $saldo+$nominal;
	    $data = array(
	      'id_akun' => $id_akun,
	      'nominal' => $topup,
	      'status_topup' => 'sukses'
	    );
	    $data['id_topup'] = $idtopup;
	    $this->Akun_model->topupSaldo($data);
	    $this->Topup_model->changeTopup($data);
	    $this->Notif_model->topupNotif($data);
		}else {
			$get = $this->Topup_model->getTopup($idtopup)->result();
	    foreach ($get as $topup) {
	      $id_akun = $topup->id_akun;
	      $saldo = $topup->saldo_akun;
	      $nominal = $topup->nominal;
	    }
	    $data = array(
	      'id_akun' => $id_akun,
	      'nominal' => $saldo,
	      'status_topup' => 'gagal'
	    );
	    $data['id_topup'] = $idtopup;
	    $this->Topup_model->changeTopup($data);
	    $this->Notif_model->topupNotif($data);
		}
		$response = array(
			'stat' => 'sukses',
			'id' => $idtopup
		);
		echo json_encode($response);
	}
	function getTransLim(){
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
		$key = $this->input->post('key');
		$data = $this->Transfer_model->getAlltranslim($key)->result_array();
		echo json_encode($data);
	}
	function getTransLimId(){
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
		$data = $this->Transfer_model->getAlltranslimId($id)->row();
		$response = array('data' => $data );
		echo json_encode($response);
	}
	function upBuktiTrans(){
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
		$id = $this->input->post('idtrans');
    $ib = $this->input->post('idbar');

		if ($this->input->post('foto')!=null) {
			$foto = $this->input->post('foto');
			// convert the image data from base64
			$imgData = base64_decode($foto);
			// set the image paths
			$path = './assets/transfer/';
			$file = uniqid().'.png';
			$file_path = $path.$file;

			file_put_contents($file_path, $imgData);

			$data = array( 'bukti_transfer' => $file );
			$where = array( 'id_transfer' => $id );

			$this->Transfer_model->uploadTrans($data,$where);
			$this->Transfer_model->chBarang($ib);
			$config['source_image'] = './assets/transfer/'.$file;
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '50%';
			$config['width']= 900;
			$config['height']= 600;
			$config['new_image'] = './assets/transfer/'.$file;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}
		$response = array(
      'msg' => 'sukses'
    );
    echo json_encode($response);
	}
}
