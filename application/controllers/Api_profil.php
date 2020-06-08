<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_profil extends CI_Controller {
	function __construct(){
    parent::__construct();
		$this->load->model('Akun_model');
  }
	function profil(){
    $id = $this->input->post('id');
    $data = $this->Akun_model->dataAkun($id)->row();
    $response = array(
      'data' => $data
    );
    echo json_encode($response);
  }
	function update_profil(){
		$nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $rekening = $this->input->post('norek');
    $telepon = $this->input->post('notelp');
    $password = $this->input->post('password');
    $id = $this->input->post('id');

    $data = array(
      'nama_akun' => $nama,
      'email_akun' => $email,
      'alamat_akun' => $alamat,
      'rekening_akun' => $rekening,
      'no_telp_akun' => $telepon,
      'pass_akun' => $password
    );
    $where = array( 'id_akun' => $id );
    $this->Akun_model->updateProfil($data,$where);

		$foto = $this->input->post('foto');
		// convert the image data from base64
    $imgData = base64_decode($foto);
    // set the image paths
    $path = './assets/profil/';
    $file = uniqid().'.png';
    $file_path = $path.$file;

		file_put_contents($file_path, $imgData);

		$data = array( 'pp_akun' => $file );
		$where = array( 'id_akun' => $id );
		$this->Akun_model->updateProfil($data,$where);
		$config['source_image'] = './assets/profil/'.$file;
		$config['create_thumb']= FALSE;
		$config['maintain_ratio']= FALSE;
		$config['quality']= '50%';
		$config['width']= 600;
		$config['height']= 600;
		$config['new_image'] = './assets/profil/'.$file;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();

		$idakun = array('id_akun' => $id);
		$response = array(
      'data' => $idakun,
			'stat' => 'true'
    );
    echo json_encode($response);
	}
}
