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
	}
  public function login()
	{
		$this->Now->updateNow();
		$this->load->view('admin/login');
	}
	public function prosesLogin(){
		$this->Now->updateNow();
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
			redirect(base_url('Admin/topup_user'));
		}
		else{
			$data['login'] = "salah";
			$this->load->view('admin/login',$data);
		}
	}
	function logout(){
		$this->Now->updateNow();
		$this->session->sess_destroy();
		redirect(base_url('Admin/login'));
	}
	public function register()
	{
		$this->Now->updateNow();
		$this->load->view('Admin/register');
	}
	public function prosesRegister(){
		$this->Now->updateNow();
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

    if($this->session->userdata('status') != "login"){
		redirect(base_url('Admin/login'));
		}

    $id_admin = $this->session->userdata('id_admin');

    $jumlah_data = $this->Topup_model->getAll()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/Admin/topup_user/';
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

    redirect(base_url('Admin/topup_user'));
  }
  function batal_topup($idtopup){
    $this->Now->updateNow();

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
}
