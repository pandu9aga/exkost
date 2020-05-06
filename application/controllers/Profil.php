<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
    $this->load->library('upload');
	}
  function index(){
    $this->Now->updateNow();
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
		$this->template->profil('profil',$data);
	}
  function uploadProfil(){
    $this->Now->updateNow();
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $rekening = $this->input->post('rekening');
    $telepon = $this->input->post('telepon');
    $catatan = $this->input->post('catatan');
    $password = $this->input->post('password');
    $id = $this->input->post('id');

    $data = array(
      'nama_akun' => $nama,
      'email_akun' => $email,
      'alamat_akun' => $alamat,
      'rekening_akun' => $rekening,
      'no_telp_akun' => $telepon,
      'catatan_akun' => $catatan,
      'pass_akun' => $password
    );
    $where = array( 'id_akun' => $id );

    $this->Akun_model->updateProfil($data,$where);
    redirect(base_url('Profil'));
  }
  function uploadPP(){
    $this->Now->updateNow();
    $id = $this->input->post('id');

    $config['upload_path'] = './assets/profil/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    $this->upload->initialize($config);
    if(!empty($_FILES['file_gambar']['name'])){

      if ($this->upload->do_upload('file_gambar')){
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/profil/'.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 600;
          $config['height']= 600;
          $config['new_image']= './assets/profil/'.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gambar=$gbr['file_name'];

          $data = array( 'pp_akun' => $gambar );
          $where = array( 'id_akun' => $id );

          $this->Akun_model->updateProfil($data,$where);
      }
    }
    redirect(base_url('Profil'));
  }
}
