<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_barang extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Barang_model');
		$this->load->model('Akun_model');
    $this->load->model('Tawaran_model');
  }
	function barang(){
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
    $high = $this->Tawaran_model->getHighest($id)->row();

    $response = array(
			'data' => $barang,
			'bid' => $bid,
      'high' => $high
		);
    echo json_encode($response);
  }
  function tawaran(){
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
          redirect(base_url('Barang/index/'.$id_barang)); //done
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
          redirect(base_url('Barang/index/'.$id_barang)); //done
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
          redirect(base_url('Barang/index/'.$id_barang)); //done
        }else { //jika tidak ada tawaran
          $data['change'] = $saldo-$jumlah; //kurangi saldo user
          $this->Akun_model->bid($data);
          $this->Tawaran_model->insertMybid($data);
          //echo "belum pernah nawar ga ada tawaran lain";
          redirect(base_url('Barang/index/'.$id_barang)); //done
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
            redirect(base_url('Barang/index/'.$id_barang)); //done
          }else { //saldo gak cukup
            $pesan = 'kurang';
            redirect(base_url('Barang/index/'.$id_barang.'/'.$pesan)); //done
          }
        }else { //bukan yang tertinggi
          $pesan = 'kurang';
          redirect(base_url('Barang/index/'.$id_barang.'/'.$pesan)); //done
        }
      }else {
        $pesan = 'kurang';
        redirect(base_url('Barang/index/'.$id_barang.'/'.$pesan)); //done
      }
    }
  }
}
