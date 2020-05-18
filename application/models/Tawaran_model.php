<?php
class Tawaran_model extends CI_Model {
  function getMybid($id,$akun){
    $this->db->select('*');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_barang',$id);
    $this->db->where('tawaran.id_akun',$akun);
    $query = $this->db->get();
    return $query;
  }
  function getBid($id){
    $this->db->select('*');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function getHighest($id){
    $this->db->select_max('jumlah_tawaran');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    $this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function insertMybid($data){
    $this->db->set('jumlah_tawaran',$data['jumlah_tawaran']);
    $this->db->set('id_akun',$data['id_akun']);
    $this->db->set('id_barang',$data['id_barang']);
    $this->db->insert('tawaran');
  }
  function updateMybid($data){
    $this->db->where('id_akun',$data['id_akun']);
    $this->db->where('id_barang',$data['id_barang']);
    $this->db->set('jumlah_tawaran',$data['jumlah_tawaran']);
    $this->db->update('tawaran');
  }
  function getonBid($bid,$id){
    $this->db->select('*');
    $this->db->from('tawaran');
    $this->db->join('akun','tawaran.id_akun = akun.id_akun');
    //$this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('jumlah_tawaran',$bid);
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
}
