<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_barang extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
		$this->load->model('Transfer_model');
		$this->load->model('Jenis_model');
  }
	function barang(){
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
    $akun = $this->input->post('akun');

    $data = array(
      'barang.id_barang' => $id
    );
		$barang = $this->Barang_model->getBarang1($data)->row();
    $bid = $this->Tawaran_model->getMybid($id,$akun)->row();
    if ($bid==null) {
      $bid = array('jumlah_tawaran' => '0');
    }
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
			'bid' => $bid,
      'high' => $high
		);
    echo json_encode($response);
  }
	function terima(){
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
		$id = $this->input->post('id_barang');
    $change = array('status_lelang' => 'terima' );
    $this->Barang_model->chStat($id,$change);
    $this->Transfer_model->insTrans($id);
		$response = array('pesan' => 'selesai');
		echo json_encode($response);
  }
  function tawaran(){
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
    $jumlah = $this->input->post('jumlah');
    $id_akun = $this->input->post('id_akun');
    $id_barang = $this->input->post('id_barang');

    $data = array(
      'id_barang' => $id_barang,
      'id_akun' => $id_akun,
      'jumlah_tawaran' => $jumlah
    );

    $ceksaldo = $this->Akun_model->dataAkun($id_akun)->result();
    foreach ($ceksaldo as $key) {
      $saldo = $key->saldo_akun;
    }

    $bidmax = $this->Tawaran_model->getHighest($id_barang)->result();
    if ($bidmax!=NULL) {
      foreach ($bidmax as $val) {
        $thebid = $val->jumlah_tawaran;
      }
      $getdatahigh = $this->Tawaran_model->getonBid($thebid,$id_barang)->result();
      foreach ($getdatahigh as $value) {
        $akunhigh = $value->id_akun;
        $bidhigh = $value->jumlah_tawaran;
      }
    }

    if ($saldo>=$jumlah) { //jika saldo lebih besar
      $cekmybid = $this->Tawaran_model->getMybid($id_barang,$id_akun)->num_rows();
      if ($cekmybid!=0) { //jika pernah nawar
        if ($id_akun==$akunhigh) { //jika posisi masih tertinggi
          $selisih = $jumlah-$thebid; //mengurangi saldo selisih dengan tawaran sebelumnya
          $data['change'] = $saldo-$selisih; //kurangi saldo
          $this->Akun_model->bid($data);
          $this->Tawaran_model->updateMybid($data);
          //echo "pernah nawar dan tertinggi";
          //echo $akunhigh." ".$saldo." ".$bidhigh;
					$response = array('pesan' => 'sukses');
					echo json_encode($response); //done
        }else { //jika tidak tertinggi
          if ($bidmax!=NULL) {
            $getakun = $this->Akun_model->dataAkun($akunhigh)->result(); //ambil data saldo penawar tertinggi
            foreach ($getakun as $key) {
              $saldoenemy = $key->saldo_akun;
            }
          }
          $plussaldo = $saldoenemy+$bidhigh; //kembalikan saldo sebanyak tawarannya
          $this->Akun_model->losBid($akunhigh,$plussaldo);
          $data['change'] = $saldo-$jumlah; //kurangi saldo user
          $this->Akun_model->bid($data);
          $this->Tawaran_model->updateMybid($data);
          //echo "pernah nawar ga tertinggi";
          //echo $akunhigh." ".$saldo." ".$bidhigh;
					$response = array('pesan' => 'sukses');
					echo json_encode($response); //done
        }
      }else { //jika belum pernah nawar
        $cekbid = $this->Tawaran_model->getBid($id_barang)->num_rows();
        if ($cekbid!=0) { //jika ada tawaran lain
          $getakun = $this->Akun_model->dataAkun($akunhigh)->result(); //ambil data saldo penawar tertinggi
          foreach ($getakun as $key) {
            $saldoenemy = $key->saldo_akun;
          }
          $plussaldo = $saldoenemy+$bidhigh; //kembalikan saldo sebanyak tawarannya
          $this->Akun_model->losBid($akunhigh,$plussaldo);
          $data['change'] = $saldo-$jumlah; //kurangi saldo user
          $this->Akun_model->bid($data);
          $this->Tawaran_model->insertMybid($data);
          //echo "belum pernah nawar tapi ada tawaran yg lain";
					$response = array('pesan' => 'sukses');
					echo json_encode($response); //done
        }else { //jika tidak ada tawaran
          $data['change'] = $saldo-$jumlah; //kurangi saldo user
          $this->Akun_model->bid($data);
          $this->Tawaran_model->insertMybid($data);
          //echo "belum pernah nawar ga ada tawaran lain";
					$response = array('pesan' => 'sukses');
					echo json_encode($response); //done
        }
      }
    }else { //jika saldo lebih kecil
      if ($bidmax!=NULL) {
        if ($id_akun==$akunhigh) { //jika user di posisi tawaran tertinggi
          $selisih = $jumlah-$bidhigh; //mengurangi saldo selisih dengan tawaran sebelumnya
          if ($saldo>=$selisih) { //jika saldo cukup
            $data['change'] = $saldo-$selisih; //kurangi saldo
            $this->Akun_model->bid($data);
            $this->Tawaran_model->updateMybid($data);
            //echo "saldo cukup untuk selisih";
						$response = array('pesan' => 'sukses');
            echo json_encode($response); //done
          }else { //saldo gak cukup
            $response = array('pesan' => 'kurang');
            echo json_encode($response); //done
          }
        }else { //bukan yang tertinggi
					$response = array('pesan' => 'kurang');
					echo json_encode($response); //done
        }
      }else {
				$response = array('pesan' => 'kurang');
				echo json_encode($response); //done
      }
    }
  }
	function jenis(){
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
		$jenis = $this->Jenis_model->jenisBarang()->result_array();
		//$response = array('data' => $jenis);
		echo json_encode($jenis);
	}
	function tambahbarang(){
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
		$jenis = $this->input->post('jenis_barang');
    $nama = $this->input->post('nama_barang');
    $harga = $this->input->post('harga_barang');
    $tanggal = $this->input->post('tanggal_lelang');
		$jam = $this->input->post('jam_lelang');
    $catatan = $this->input->post('catatan');
    $idpl = $this->input->post('id_pelelang');
    $status = $this->input->post('status');
    //$gambar = $this->input->post('gambar');

		$waktu = $tanggal." ".$jam;

    $where = array( 'nama_jenis_barang' => $jenis );
    $cekidjenis = $this->Jenis_model->idJenis($where)->result();
    foreach ($cekidjenis as $cekjenis) {
      $idjenis = $cekjenis->id_jenis_barang;
    }

    $data = array(
      'id_jenis_barang' => $idjenis,
      'nama_barang' => $nama,
      'harga_barang' => $harga,
      'waktu_lelang' => $waktu,
			'info_barang' => $catatan,
      'id_akun' => $idpl,
      'status_lelang' => $status
    );

    $this->Barang_model->uploadBarang($data,'barang');
    $getbarang = $this->Barang_model->getBarang($data)->result();
    foreach ($getbarang as $cekbarang) {
      $idbarang = $cekbarang->id_barang;
    }

    $config['upload_path'] = './assets/barang/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

		$foto = $this->input->post('foto');
		// convert the image data from base64
    $imgData = base64_decode($foto);
    // set the image paths
    $path = './assets/barang/';
    $file = uniqid().'.png';
    $file_path = $path.$file;

		file_put_contents($file_path, $imgData);

		$gbr = array(
			'id_barang' => $idbarang,
			'nama_gambar_barang' => $file
		);
		$this->Barang_model->uploadGambar($gbr);

		$config['source_image'] = './assets/barang/'.$file;
		$config['create_thumb']= FALSE;
		$config['maintain_ratio']= FALSE;
		$config['quality']= '50%';
		$config['width']= 600;
		$config['height']= 400;
		$config['new_image'] = './assets/barang/'.$file;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		$response = array(
			'stat' => 'true',
			'id_barang' => $idbarang
    );
    echo json_encode($response);
	}
}
