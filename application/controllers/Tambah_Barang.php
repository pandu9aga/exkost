<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_Barang extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
    $this->load->model('Topup_model');
    $this->load->model('Notif_model');
    $this->load->library('upload');
	}
	function index(){
    $this->Now->updateNow();
    $id_akun = $this->session->userdata('id_akun');
    $limbar = 6;
    $data['akun'] = $this->Akun_model->dataAkun($id_akun)->result();
    $data['jenis'] = $this->Jenis_model->jenisBarang()->result();
    $data['jenlimbar'] = $this->Jenis_model->jenisLimit($limbar)->result();
    $data['qtyritop'] = $this->Notif_model->getNotiftop($id_akun)->num_rows();
    $data['qtytopup'] = $this->Topup_model->jmlQtyBayar($id_akun);
		$this->template->tambahBarang('tambah_barang',$data);
	}
  function prosesUpload(){
    $this->Now->updateNow();
    $jenis = $this->input->post('jenis_barang');
    $nama = $this->input->post('nama_barang');
    $harga = $this->input->post('harga_barang');
    $waktu = $this->input->post('waktu_lelang');
    $catatan = $this->input->post('catatan');
    $idpl = $this->input->post('id_pelelang');
    $status = $this->input->post('status');
    //$gambar = $this->input->post('gambar');

    $where = array( 'nama_jenis_barang' => $jenis );
    $cekidjenis = $this->Jenis_model->idJenis($where)->result();
    foreach ($cekidjenis as $cekjenis) {
      $idjenis = $cekjenis->id_jenis_barang;
    }

    $data = array(
      'id_jenis_barang' => $idjenis,
      'nama_barang' => $nama,
      'harga_barang' => $harga,
      'waktu_lelang' => $waktu,
			'info_barang' => $catatan,
      'id_akun' => $idpl,
      'status_lelang' => $status
    );

    $this->Barang_model->uploadBarang($data,'barang');
    $getbarang = $this->Barang_model->getBarang($data)->result();
    foreach ($getbarang as $cekbarang) {
      $idbarang = $cekbarang->id_barang;
    }

    $config['upload_path'] = './assets/barang/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    $this->upload->initialize($config);
    if(!empty($_FILES['gambar']['name'])){

      if ($this->upload->do_upload('gambar')){
          $gbr = $this->upload->data();
          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']='./assets/barang/'.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 600;
          $config['height']= 400;
          $config['new_image']= './assets/barang/'.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gambar=$gbr['file_name'];

          $gbr = array(
            'id_barang' => $idbarang,
            'nama_gambar_barang' => $gambar
          );

          $this->Barang_model->uploadGambar($gbr);
      }

    }else{
        echo "Image yang diupload kosong";
    }
  }
}
