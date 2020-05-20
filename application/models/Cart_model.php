<?php
class Cart_model extends CI_Model {
  function getCartb($akun){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang','berlangsung');
    $query = $this->db->get()->num_rows();
    return $query;
  }
  function getPgcartb($number,$offset,$akun){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang','berlangsung');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function getHighb($data){
    $this->db->select_max('jumlah_tawaran');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_barang',$data);
    $query = $this->db->get();
    return $query;
  }
}
