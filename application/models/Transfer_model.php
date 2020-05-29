<?php
class Transfer_model extends CI_Model {
  function getAlltrans(){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('status_lelang','terima');
    $this->db->join('transfer','transfer.id_barang = barang.id_barang');
    //$this->db->join('akun','akun.id_akun = barang.id_akun');
    //$this->db->where('barang.status_transfer in ("","kirim")');
    return $this->db->get();
  }
  function getPgalltrans($number,$offset){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('status_lelang','terima');
    $this->db->join('transfer','transfer.id_barang = barang.id_barang');
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function getHighfortrans($id){
    $this->db->select('*');
    $this->db->from('pemenang');
    $this->db->join('tawaran','tawaran.id_tawaran = pemenang.id_tawaran');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function insTrans($id){
    $this->db->set('id_barang',$id);
    $this->db->insert('transfer');
  }
  function getTrans($id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('id_transfer',$id);
    $this->db->join('transfer','transfer.id_barang = barang.id_barang');
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $query = $this->db->get();
    return $query;
  }
  function uploadTrans($data,$where){
    $this->db->where($where);
    $this->db->update('transfer',$data);
  }
  function chBarang($id){
    $this->db->set('status_transfer','kirim');
    $this->db->where('id_barang',$id);
    $this->db->update('barang');
  }
}
