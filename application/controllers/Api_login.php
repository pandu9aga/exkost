<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_login extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Vue_model');
		$this->load->model('Akun_model');
  }
	function index(){
    $this->load->view('viewvue.php');
  }
  function data_api(){
    $query = $this->Vue_model->allAccount()->result();
    //echo json_encode($query);
		//$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if ($query!=0) {
			$akun = $this->Vue_model->allAccount()->result();
			$response = array(
				'status' => 'true',
				'message' => 'Login Sukses',
				'data' => $akun
			);
			echo json_encode($response);
		}
  }
	function login(){
		$data['email_akun'] = $this->input->post('email');
    $data['pass_akun'] = $this->input->post('password');
		$cek = $this->Akun_model->loginAkun($data)->num_rows();
		if ($cek!=0) {
			$akun = $this->Akun_model->loginAkun($data)->row();
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
		$data = $this->input->post('id');
		$akun = $this->Akun_model->dataAkun($data)->row();
		$response = array(
			'data' => $akun
		);
		echo json_encode($response);
	}
	function register(){
		$data['nama_akun'] = $this->input->post('nama');
    $data['alamat_akun'] = $this->input->post('alamat');
		$data['no_telp_akun'] = $this->input->post('notelp');
    $data['rekening_akun'] = $this->input->post('norek');
		$data['email_akun'] = $this->input->post('email');
    $data['pass_akun'] = $this->input->post('password');

		$cekemail = $this->Akun_model->cekEmail($data)->num_rows();
		if ($cekemail==0) {
			$regis = $this->Akun_model->registerAkun1($data,'akun');
			if ($regis!=0) {
				$response = array(
					'status' => "success",
					'message' => "Registrasi berhasil"
				);
				echo json_encode($response);
			}else {
				$response = array(
					'status' => "fail",
					'message' => "Registrasi gagal"
				);
				echo json_encode($response);
			}
		}else {
			$response = array(
				'status' => "fail",
				'message' => "Email telah terdaftar"
			);
			echo json_encode($response);
		}
	}
	public function Api(){
    $data = $this->Mahasiswa_model->getAll();
    echo json_encode($data->result_array());
  }
  public function ApiInsert(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $nama = $this->input->post('nama');
    $grup = $this->input->post('grup');

    $data = array(
      'username' => $username,
      'password' => $password,
      'nama' => $nama,
      'grup' => $grup
    );
    $this->Mahasiswa_model->input_data($data,'tm_user');
    echo json_encode($array);
  }
  public function ApiDelete(){
    if ($this->input->post('username')) {
      $where = array('username' => $this->input->post('username'));
      if ($this->Mahasiswa_model->hapus_data($where,'tm_user')) {
        $array = array('success' => true);
      } else {
        $array = array('error' => true);
      }
      echo json_encode($array);
    }
  }
  public function ApiUpdate(){
    if ($this->input->post('username')) {
      $where = array('username' => $this->input->post('username'));
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $nama = $this->input->post('nama');
      $grup = $this->input->post('grup');
      if ($grup=="admin") {
        $idgrup = "1";
      }elseif ($grup=="user") {
        $idgrup = "2";
      }else {
        $array = array('error' => true);
      }
      $data = array(
        'username' => $username,
        'password' => $password,
        'nama' => $nama,
        'grup' => $idgrup
      );
      if ($this->Mahasiswa_model->update_data($where,$data,'tm_user')) {
        $array = array('success' => true);
      } else {
        $array = array('error' => true);
      }
      echo json_encode($array);
    }
  }
}
