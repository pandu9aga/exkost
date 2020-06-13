<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
    $this->load->model('Bankadmin_model');
    $this->load->model('Notif_model');
    $this->load->library('upload');
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
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $jumlah_data = $this->Topup_model->jmlMybayar($id_akun);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/pembayaran/index/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 5;
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
    $data['topup'] = $this->Topup_model->getPgbayar($config['per_page'],$page,$id_akun)->result();

    //$data['topup'] = $this->Topup_model->getMytopup($id_akun)->result();
    $this->template->lpembayaran('list_pembayaran',$data);
  }
  function detail_pembayaran($idtopup){
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
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);

    $data['topup'] = $this->Topup_model->getTopup($idtopup)->result();
    foreach ($data['topup'] as $topup) {
      $id_bank = $topup->id_bank_admin;
    }
    $data['bankadmin'] = $this->Bankadmin_model->selectBank($id_bank)->result();
    $this->template->pembayarann('pembayaran',$data);
  }
  function prosesPembayaran(){
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

    $config['upload_path'] = './assets/topup/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    $this->upload->initialize($config);
    if(!empty($_FILES['gambar']['name'])){

      if ($this->upload->do_upload('gambar')){
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/topup/'.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 900;
          $config['height']= 600;
          $config['new_image']= './assets/topup/'.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gambar=$gbr['file_name'];

          $data = array(
            'bukti_transfer' => $gambar,
            'status_topup' => $stat
          );
          $where = array( 'id_topup' => $id );

          $this->Topup_model->updateTopup($data,$where);
      }
    }
    redirect(base_url('pembayaran/detail_pembayaran/'.$id));
  }
  function hapus($idtopup){
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
    $this->Topup_model->deleteTopup($idtopup);
    redirect(base_url('pembayaran/index/'));
  }
}
