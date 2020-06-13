<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct(){
		parent::__construct();

    $this->load->model('Admin_model');
    $this->load->model('Akun_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
    $this->load->model('Bankadmin_model');
    $this->load->model('Transfer_model');
    $this->load->model('Jenis_model');
    $this->load->library('upload');
	}
  public function login()
	{
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
		$this->load->view('admin/login');
	}
	public function prosesLogin(){
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

		$cek = $this->Admin_model->loginAdmin($data)->num_rows();
		if($cek > 0){
			$dataadmin = $this->Admin_model->loginAdmin($data)->result();
			foreach ($dataadmin as $admin) {
				$id_admin = $admin->id_admin;
			}
			$data_session = array(
				'id_admin' => $id_admin,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('admin/topup_user'));
		}
		else{
			$data['login'] = "salah";
			$this->load->view('admin/login',$data);
		}
	}
	function logout(){
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
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
	public function register()
	{
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
		$this->load->view('admin/register');
	}
	public function prosesRegister(){
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
			$data['regisSukses'] = "ya";
		  $this->Admin_model->registerAdmin($data,'admin');
		  $this->load->view('admin/login',$data);
		}
		else {
			$data['cekNama'] = "ada";
			$this->load->view('admin/register',$data);
		}
  }
  function topup_user(){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $jumlah_data = $this->Topup_model->getAll()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/admin/topup_user/';
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
    $data['topup'] = $this->Topup_model->getPgall($config['per_page'],$page)->result();

    $data['admin'] = $this->Admin_model->dataAdmin($id_admin)->result();

    $this->load->view('admin/topup_user',$data);
  }
  function proses_topup($idtopup){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

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

    redirect(base_url('admin/topup_user'));
  }
  function batal_topup($idtopup){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

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

    redirect(base_url('Admin/topup_user'));
  }
  function transfer_pelelang(){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $jumlah_data = $this->Transfer_model->getAlltrans()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/admin/transfer_pelelang/';
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
    $data['transfer'] = $this->Transfer_model->getPgalltrans($config['per_page'],$page)->result();

    $data['admin'] = $this->Admin_model->dataAdmin($id_admin)->result();

    $this->load->view('admin/transfer_pelelang',$data);
  }
  function detail_transfer($id){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $data['admin'] = $this->Admin_model->dataAdmin($id_admin)->result();

    $data['trans'] = $this->Transfer_model->getTrans($id)->result();
    $this->load->view('admin/detail_transfer',$data);
  }
  function proses_transfer(){
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $id = $this->input->post('idtrans');
    $ib = $this->input->post('idbar');

    $config['upload_path'] = './assets/transfer/'; //path folder
    $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    $this->upload->initialize($config);
    if(!empty($_FILES['bukti']['name'])){
      if ($this->upload->do_upload('bukti')){
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/transfer/'.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 900;
          $config['height']= 600;
          $config['new_image']= './assets/transfer/'.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gambar=$gbr['file_name'];

          $data = array( 'bukti_transfer' => $gambar );
          $where = array( 'id_transfer' => $id );

          $this->Transfer_model->uploadTrans($data,$where);

          $this->Transfer_model->chBarang($ib);
      }
    }
    redirect(base_url('admin/detail_transfer/'.$id));
  }
  function edit_jenis(){
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

    if ($this->uri->segment('3')=='ada') {
      $data['msg'] = $this->uri->segment('3');
      $data['nj'] = $this->uri->segment('4');
    }elseif ($this->uri->segment('3')=='sukses') {
      $data['msg'] = $this->uri->segment('3');
      $data['nj'] = $this->uri->segment('4');
    }elseif ($this->uri->segment('3')=='suksesu') {
      $data['msg'] = $this->uri->segment('3');
      $data['nj'] = $this->uri->segment('4');
    }elseif ($this->uri->segment('3')=='suksesd') {
      $data['msg'] = $this->uri->segment('3');
      $data['nj'] = $this->uri->segment('4');
    }

    if($this->session->userdata('status') != "login"){
		redirect(base_url('Admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $data['admin'] = $this->Admin_model->dataAdmin($id_admin)->result();

    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $this->load->view('admin/edit_jenis',$data);
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

      $msg = "sukses";
      redirect(base_url('admin/edit_jenis/'.$msg.'/'.$nama));
    }
    else {
      $msg = "ada";
      redirect(base_url('admin/edit_jenis/'.$msg.'/'.$nama));
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

      $msg = "suksesu";
      redirect(base_url('admin/edit_jenis/'.$msg.'/'.$nama));
    }
  }
  function proses_djenis($id){
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

    $cek = $this->Jenis_model->getjenis($id)->result();
    foreach ($cek as $key) {
      $nama = $key->nama_jenis_barang;
    }
    $this->Jenis_model->hapusJenis($id);
    $msg = "suksesd";
    redirect(base_url('admin/edit_jenis/'.$msg.'/'.$nama));
  }
  function coba(){
    $this->load->view('bantuan');
  }
}
