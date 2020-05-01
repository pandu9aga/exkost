<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lelang extends CI_Controller {
  function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url('Main/login'));
		}

    $this->load->model('Akun_model');
    $this->load->model('Jenis_model');
    $this->load->model('Barang_model');
	}
	function index(){
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

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydata($id_akun);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/index/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 1;
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
    $data['barang'] = $this->Barang_model->getmyPage($config['per_page'],$page,$id_akun)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelang('lelang',$data);
	}
  function hasil(){
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
    $jumlah_data = $this->Barang_model->jumlah_myFS($kategori,$min,$max,$sort,$where,$id_akun);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 1;
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
    $data['barang'] = $this->Barang_model->getmyFS($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelang('lelang',$data);
	}
  function barang($id){
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
    $data['id_barang'] = $id;
    $data['barang'] = $this->Barang_model->getAll()->result();
		$this->template->lelangku('lelangku',$data);
	}
  function selesai(){
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

    $this->load->database();
    $jumlah_data = $this->Barang_model->jumlah_mydata($id_akun);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/selesai/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 1;
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
    $data['barang'] = $this->Barang_model->getmyPage($config['per_page'],$page,$id_akun)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $this->template->lelangs('lelang_selesai',$data);
	}
  function selesai_hasil(){
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
    $jumlah_data = $this->Barang_model->jumlah_myFS($kategori,$min,$max,$sort,$where,$id_akun);
    $this->load->library('pagination');
    $config['base_url'] = base_url().'index.php/lelang/selesai_hasil/';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 1;
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
    $data['barang'] = $this->Barang_model->getmyFS($config['per_page'],$page,$kategori,$min,$max,$sort,$where,$id_akun)->result();
    $data['myjenis'] = $this->Jenis_model->jenismyBarang($id_akun)->result();
    $data['passort'] = $this->input->post('sort');
    $data['paskategori'] = $check;
    $data['pasmin'] = $min;
    $data['pasmax'] = $max;
    $this->template->lelangs('lelang_selesai',$data);
	}
}
