<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tawaran extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
    $this->load->model('Barang_model');
	}
  function tawar(){
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
          redirect(base_url('barang/index/'.$id_barang)); //done
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
          redirect(base_url('barang/index/'.$id_barang)); //done
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
          redirect(base_url('barang/index/'.$id_barang)); //done
        }else { //jika tidak ada tawaran
          $data['change'] = $saldo-$jumlah; //kurangi saldo user
          $this->Akun_model->bid($data);
          $this->Tawaran_model->insertMybid($data);
          //echo "belum pernah nawar ga ada tawaran lain";
          redirect(base_url('barang/index/'.$id_barang)); //done
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
            redirect(base_url('barang/index/'.$id_barang)); //done
          }else { //saldo gak cukup
            $pesan = 'kurang';
            redirect(base_url('barang/index/'.$id_barang.'/'.$pesan)); //done
          }
        }else { //bukan yang tertinggi
          $pesan = 'kurang';
          redirect(base_url('barang/index/'.$id_barang.'/'.$pesan)); //done
        }
      }else {
        $pesan = 'kurang';
        redirect(base_url('barang/index/'.$id_barang.'/'.$pesan)); //done
      }
    }
  }
}
