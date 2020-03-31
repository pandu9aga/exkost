<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Akun_model');
  }
	public function index()
	{
		$this->load->view('main_view');
	}
  public function main_menu()
  {
    $this->load->view('main_menu');
  }
	public function login()
	{
		$this->load->view('login');
	}
	public function prosesLogin(){
		$email = $this->input->post('email');
    $password = $this->input->post('password');

		$data = array(
      'email_akun' => $email,
			'pass_akun' => $password
    );

		$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if($cek > 0){
			$dataakun = $this->Akun_model->loginAkun($data)->result();
			foreach ($dataakun as $akun) {
				$id_akun = $akun->id_akun;
			}
			$data_session = array(
				'id_akun' => $id_akun,
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('Home'));
		}
		else{
			$data['login'] = "salah";
			$this->load->view('login',$data);
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Main'));
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function prosesRegister(){
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $notelepon = $this->input->post('notelepon');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $data = array(
      'nama_akun' => $nama,
      'alamat_akun' => $alamat,
      'no_telp_akun' => $notelepon,
      'email_akun' => $email,
			'pass_akun' => $password
    );

		$cekEmail = $this->Akun_model->cekEmail($data)->result();
		if ($cekEmail == "") {
			$data['regisSukses'] = "ya";
		  $this->Akun_model->registerAkun($data,'akun');
		  $this->load->view('login',$data);
		}
		else {
			$data['cekEmail'] = "ada";
			$this->load->view('register',$data);
		}
  }
}
