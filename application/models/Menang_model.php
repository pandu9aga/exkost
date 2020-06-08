<?php
class Menang_model extends CI_Model {
  function cekWin($id){
    $this->db->select('*');
    $this->db->from('pemenang');
    $this->db->join('tawaran','pemenang.id_tawaran = tawaran.id_tawaran');
    $val = implode(",", $id);
    $this->db->where('pemenang.id_tawaran in ('.$val.')');
    $query = $this->db->get();
    return $query;
  }
  function getPgwin($number,$offset,$id){
    $this->db->select('*');
    $this->db->from('barang');
    $val = implode(",", $id);
    $this->db->where('id_tawaran in ('.$val.')');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function getWaitsend($akun){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang','selesai');
    $query = $this->db->get();//->num_rows();
    return $query;
  }
  function getInsend($akun){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang','kirim');
    $query = $this->db->get();//->num_rows();
    return $query;
  }
  function getSelesai($akun){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('tawaran','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang','terima');
    $query = $this->db->get();//->num_rows();
    return $query;
  }
  function getHighws($data){
    $this->db->select_max('jumlah_tawaran');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_barang',$data);
    $query = $this->db->get();
    return $query;
  }
  function getGagal($akun){
    $this->db->select('*');
    $this->db->from('tawaran');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_akun',$akun);
    $this->db->where('barang.status_lelang != "berlangsung"');
    $query = $this->db->get();//->num_rows();
    return $query;
  }
  function dataWinner($id){
    $this->db->select('*');
    $this->db->from('pemenang');
    $this->db->join('tawaran','tawaran.id_tawaran = pemenang.id_tawaran');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function thewinner($id){
    $this->db->select('*');
    $this->db->from('akun');
    $this->db->where('id_akun',$id);
    $query = $this->db->get();
    return $query;
  }
}
