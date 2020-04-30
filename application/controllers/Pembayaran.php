<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Topup_model');
    $this->load->model('Bankadmin_model');
    $this->load->library('upload');
	}
  function index($idtopup){
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();

    $data['topup'] = $this->Topup_model->getTopup($idtopup)->result();
    foreach ($data['topup'] as $topup) {
      $id_bank = $topup->id_bank_admin;
    }
    $data['bankadmin'] = $this->Bankadmin_model->selectBank($id_bank)->result();
    $this->template->pembayaran('pembayaran',$data);
  }
  function prosesPembayaran(){
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
    redirect(base_url('Pembayaran/index/'.$id));
  }
}
