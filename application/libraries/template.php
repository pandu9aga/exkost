<?php
class template {
  protected $_ci;
  function __construct() {
    $this->_ci = &get_instance();
  }
  function home($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('home', $data);
  }
  function tambahBarang($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('tambah_barang', $data);
  }
}
?>
