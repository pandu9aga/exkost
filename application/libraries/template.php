<?php
class Template {
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
  function profil($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('profil', $data);
  }
  function topup($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('topup', $data);
  }
  function checkout($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('checkout', $data);
  }
  function pembayarann($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('pembayaran', $data);
  }
  function lpembayaran($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('list_pembayaran', $data);
  }
  function cari($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('cari', $data);
  }
  function barang($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('barang', $data);
  }
  function lelang($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelang', $data);
  }
  function lelangku($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelangku', $data);
  }
  function lelangs($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelang_selesai', $data);
  }
  function lelangk($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelang_kirim', $data);
  }
  function lelangdk($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelang_dikirim', $data);
  }
  function lelangkt($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('lelang_konfirmtrans', $data);
  }
  function rtopup($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('riwayat_topup', $data);
  }
  function driwayat($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('detail_riwayat', $data);
  }
  function cberlangsung($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('cart_berlangsung', $data);
  }
  function menangws($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('m_waitsend', $data);
  }
  function menangis($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('m_insend', $data);
  }
  function menangse($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('m_selesai', $data);
  }
  function gagal($template = NULL, $data = NULL) {
      $data['head'] = $this->_ci->load->view('template/head', $data, TRUE);
      $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
      $data['navigation'] = $this->_ci->load->view('template/navigation', $data, TRUE);
      $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
      $data['js'] = $this->_ci->load->view('template/js', $data, TRUE);
      $this->_ci->load->view('gagal', $data);
  }
}
?>
