<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lelang extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
    $this->load->model('Tawaran_model');
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'berlangsung' );

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydatalim($id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/index/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyPagelim($config['per_page'],$page,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelang('lelang',$data);
	}
  function hasil(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    if ($this->input->post('checkall')) {
      foreach ($data['jenis'] as $all) {
        $kategori[] = $all->id_jenis_barang;
        $check = 'checkall';
      }
    }else {
      if ($this->input->post('kategori')) {
        $inkate = $this->input->post('kategori');
        for ($i=0; $i < sizeof($inkate); $i++)
        {
           $kategori[] = $inkate[$i];
           $check[] = $inkate[$i];
        }
      }else {
        foreach ($data['jenis'] as $all) {
          $kategori[] = $all->id_jenis_barang;
          $check = 'checkall';
        }
      }
    }

    $min = $this->input->post('min');
    $max = $this->input->post('max');

    if ($this->input->post('sort')=="0") {
      $sort = 'Desc';
      $where = 'barang.id_barang';
    }elseif ($this->input->post('sort')=="1") {
      $sort = 'Asc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="2") {
      $sort = 'Desc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="3") {
      $sort = 'Asc';
      $where = 'barang.waktu_lelang';
    }elseif ($this->input->post('sort')=="4") {
      $sort = 'Desc';
      $where = 'barang.waktu_lelang';
    }

    $lim = array('status_lelang' => 'berlangsung' );

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_myFSlim($kategori,$min,$max,$sort,$where,$id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $f = 'form_fs';
    $config['num_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['num_tag_close'] = '</a></li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['prev_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['next_tag_close'] = '</a></li>';
    $config['last_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['last_tag_open'] = '</a><li>';
    $config['first_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['first_tag_open'] = '</a><li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyFSlim($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelang('lelang',$data);
	}
  function barang($id){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
    $data['id_barang'] = $id;
    $data['barang'] = $this->Barang_model->getAll()->result();
    $cekalltawaran = $this->Tawaran_model->getBid($id)->result();
    if ($cekalltawaran!=NULL) {
      $data['bid'] = $cekalltawaran;
      $hbid = $this->Tawaran_model->getHighest($id)->result();
      foreach ($hbid as $h) {
        $hb = $h->jumlah_tawaran;
      }
      $data['hbid'] = $this->Tawaran_model->getonBid($hb,$id)->result();
    }
    $data['totbid'] = $this->Tawaran_model->getBid($id)->num_rows();
		$this->template->lelangku('lelangku',$data);
	}
  function selesai(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_gagal' => 'gagal','status_transfer' => 'terima' );

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydatalim3($id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/selesai/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyPagelim3($config['per_page'],$page,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelangs('lelang_selesai',$data);
	}
  function selesai_hasil(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_gagal' => 'gagal','status_transfer' => 'terima' );

    if ($this->input->post('checkall')) {
      foreach ($data['jenis'] as $all) {
        $kategori[] = $all->id_jenis_barang;
        $check = 'checkall';
      }
    }else {
      if ($this->input->post('kategori')) {
        $inkate = $this->input->post('kategori');
        for ($i=0; $i < sizeof($inkate); $i++)
        {
           $kategori[] = $inkate[$i];
           $check[] = $inkate[$i];
        }
      }else {
        foreach ($data['jenis'] as $all) {
          $kategori[] = $all->id_jenis_barang;
          $check = 'checkall';
        }
      }
    }

    $min = $this->input->post('min');
    $max = $this->input->post('max');

    if ($this->input->post('sort')=="0") {
      $sort = 'Desc';
      $where = 'barang.id_barang';
    }elseif ($this->input->post('sort')=="1") {
      $sort = 'Asc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="2") {
      $sort = 'Desc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="3") {
      $sort = 'Asc';
      $where = 'barang.waktu_lelang';
    }elseif ($this->input->post('sort')=="4") {
      $sort = 'Desc';
      $where = 'barang.waktu_lelang';
    }

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_myFSlim3($kategori,$min,$max,$sort,$where,$id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/selesai_hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $f = 'form_fs';
    $config['num_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['num_tag_close'] = '</a></li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['prev_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['next_tag_close'] = '</a></li>';
    $config['last_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['last_tag_open'] = '</a><li>';
    $config['first_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['first_tag_open'] = '</a><li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyFSlim3($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelangs('lelang_selesai',$data);
	}

  function kirim(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'selesai','status_gagal' => '');

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydatalim($id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/kirim/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyPagelim($config['per_page'],$page,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelangk('lelang_kirim',$data);
	}
  function kirim_hasil(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'selesai','status_gagal' => '');

    if ($this->input->post('checkall')) {
      foreach ($data['jenis'] as $all) {
        $kategori[] = $all->id_jenis_barang;
        $check = 'checkall';
      }
    }else {
      if ($this->input->post('kategori')) {
        $inkate = $this->input->post('kategori');
        for ($i=0; $i < sizeof($inkate); $i++)
        {
           $kategori[] = $inkate[$i];
           $check[] = $inkate[$i];
        }
      }else {
        foreach ($data['jenis'] as $all) {
          $kategori[] = $all->id_jenis_barang;
          $check = 'checkall';
        }
      }
    }

    $min = $this->input->post('min');
    $max = $this->input->post('max');

    if ($this->input->post('sort')=="0") {
      $sort = 'Desc';
      $where = 'barang.id_barang';
    }elseif ($this->input->post('sort')=="1") {
      $sort = 'Asc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="2") {
      $sort = 'Desc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="3") {
      $sort = 'Asc';
      $where = 'barang.waktu_lelang';
    }elseif ($this->input->post('sort')=="4") {
      $sort = 'Desc';
      $where = 'barang.waktu_lelang';
    }

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_myFSlim($kategori,$min,$max,$sort,$where,$id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/kirim_hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $f = 'form_fs';
    $config['num_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['num_tag_close'] = '</a></li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['prev_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['next_tag_close'] = '</a></li>';
    $config['last_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['last_tag_open'] = '</a><li>';
    $config['first_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['first_tag_open'] = '</a><li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyFSlim($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelangk('lelang_kirim',$data);
	}
  function proses_kirim($id){
    $change = array('status_lelang' => 'kirim' );
    $this->Barang_model->chStat($id,$change);
    redirect('lelang/barang/'.$id);
  }
  function dikirim(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'kirim' );

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydatalim($id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/dikirim/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyPagelim($config['per_page'],$page,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelangdk('lelang_dikirim',$data);
	}
  function dikirim_hasil(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'kirim' );

    if ($this->input->post('checkall')) {
      foreach ($data['jenis'] as $all) {
        $kategori[] = $all->id_jenis_barang;
        $check = 'checkall';
      }
    }else {
      if ($this->input->post('kategori')) {
        $inkate = $this->input->post('kategori');
        for ($i=0; $i < sizeof($inkate); $i++)
        {
           $kategori[] = $inkate[$i];
           $check[] = $inkate[$i];
        }
      }else {
        foreach ($data['jenis'] as $all) {
          $kategori[] = $all->id_jenis_barang;
          $check = 'checkall';
        }
      }
    }

    $min = $this->input->post('min');
    $max = $this->input->post('max');

    if ($this->input->post('sort')=="0") {
      $sort = 'Desc';
      $where = 'barang.id_barang';
    }elseif ($this->input->post('sort')=="1") {
      $sort = 'Asc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="2") {
      $sort = 'Desc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="3") {
      $sort = 'Asc';
      $where = 'barang.waktu_lelang';
    }elseif ($this->input->post('sort')=="4") {
      $sort = 'Desc';
      $where = 'barang.waktu_lelang';
    }

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_myFSlim($kategori,$min,$max,$sort,$where,$id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/dikirim_hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $f = 'form_fs';
    $config['num_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['num_tag_close'] = '</a></li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['prev_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['next_tag_close'] = '</a></li>';
    $config['last_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['last_tag_open'] = '</a><li>';
    $config['first_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['first_tag_open'] = '</a><li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyFSlim($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelangdk('lelang_dikirim',$data);
	}
  function konfirm_transfer(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'terima');

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydatalim2($id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/konfirm_transfer/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_open'] = '<li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyPagelim2($config['per_page'],$page,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelangkt('lelang_konfirmtrans',$data);
	}
  function konfirm_transfer_hasil(){
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
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $limcol = 3;
    $limnew = 4;
    $limtop = 4;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['jenlimcol'] = $this->Jenis_model->jenisLimit($limcol)->result();
    $data['jenlimnew'] = $this->Jenis_model->jenisLimit($limnew)->result();
    $data['jenlimtop'] = $this->Jenis_model->jenisLimit($limtop)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $lim = array('status_lelang' => 'terima');

    if ($this->input->post('checkall')) {
      foreach ($data['jenis'] as $all) {
        $kategori[] = $all->id_jenis_barang;
        $check = 'checkall';
      }
    }else {
      if ($this->input->post('kategori')) {
        $inkate = $this->input->post('kategori');
        for ($i=0; $i < sizeof($inkate); $i++)
        {
           $kategori[] = $inkate[$i];
           $check[] = $inkate[$i];
        }
      }else {
        foreach ($data['jenis'] as $all) {
          $kategori[] = $all->id_jenis_barang;
          $check = 'checkall';
        }
      }
    }

    $min = $this->input->post('min');
    $max = $this->input->post('max');

    if ($this->input->post('sort')=="0") {
      $sort = 'Desc';
      $where = 'barang.id_barang';
    }elseif ($this->input->post('sort')=="1") {
      $sort = 'Asc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="2") {
      $sort = 'Desc';
      $where = 'barang.harga_barang';
    }elseif ($this->input->post('sort')=="3") {
      $sort = 'Asc';
      $where = 'barang.waktu_lelang';
    }elseif ($this->input->post('sort')=="4") {
      $sort = 'Desc';
      $where = 'barang.waktu_lelang';
    }

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_myFSlim2($kategori,$min,$max,$sort,$where,$id_akun,$lim);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/konfirm_transfer_hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 15;
    $config['uri_segment'] = 3;
    //$config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    //$config['page_query_string'] = TRUE;
    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
    $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
    $config['full_tag_open'] = '<ul class="store-pagination">';
    $config['full_tag_close'] = '</ul>';
    $f = 'form_fs';
    $config['num_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['num_tag_close'] = '</a></li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['prev_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['next_tag_close'] = '</a></li>';
    $config['last_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['last_tag_open'] = '</a><li>';
    $config['first_tag_open'] = '<li><a href="#" onclick="document.forms["form_fs"].submit(); return false;">';
    $config['first_tag_open'] = '</a><li>';
    $this->pagination->initialize($config);
    //$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    if ($this->uri->segment('3')<1) {
      $page = 0 * $config['per_page'];
    }elseif ($this->uri->segment('3')>=1) {
      $page = ($this->uri->segment('3') - 1) * $config['per_page'];
    }else {
      $page = 0 * $config['per_page'];
    }
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links();
    $data['barang'] = $this->Barang_model->getmyFSlim2($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun,$lim)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelangkt('lelang_konfirmtrans',$data);
	}
  function proses_konfirmtrans($id){
    $change = array('status_transfer' => 'terima' );
    $this->Barang_model->chStat($id,$change);
    redirect('lelang/barang/'.$id);
  }
}
