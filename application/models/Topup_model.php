<?php
class Topup_model extends CI_Model {
  function tambahTopup($data,$table){
    $this->db->insert($table,$data);
  }
  function updateTopup($data,$where){
    $this->db->where($where);
    $this->db->update('topup',$data);
  }
  function getTopup($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_topup',$data);
    $query = $this->db->get();
    return $query;
  }
  function getMytopup($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $query = $this->db->get();
    return $query;
  }
  function jmlQtyBayar($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->where('status_topup','belum');
    $query = $this->db->get()->num_rows();
    return $query;
  }
  function jmlMybayar($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->where('status_topup in ("belum","menunggu")');
    //$this->db->where('status_topup','menunggu');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $query = $this->db->get()->num_rows();
    return $query;
  }
  function getPgbayar($number,$offset,$data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->where('status_topup in ("belum","menunggu")');
    //$this->db->where('status_topup','menunggu');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function getAll(){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->join('akun','topup.id_akun = akun.id_akun');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $query = $this->db->get();
    return $query;
  }
  function getPgall($number,$offset){
    $this->db->select('*');
    $this->db->from('topup');
    //$this->db->where('status_topup','menunggu');
    $this->db->join('akun','topup.id_akun = akun.id_akun');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
}
?>
