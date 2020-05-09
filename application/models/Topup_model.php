<?php
class Topup_model extends CI_Model {
  function tambahTopup($data,$table){
    $this->db->insert($table,$data);
  }
  function updateTopup($data,$where){
    $this->db->where($where);
    $this->db->update('topup',$data);
  }
  function deleteTopup($data){
    $this->db->where('id_topup',$data);
    $this->db->delete('topup');
  }
  function getTopup($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_topup',$data);
    $this->db->join('akun','topup.id_akun = akun.id_akun');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $query = $this->db->get();
    return $query;
  }
  function getidTopup($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('topup.id_akun',$data['id_akun']);
    $this->db->where('waktu_topup',$data['waktu_topup']);
    $this->db->join('akun','topup.id_akun = akun.id_akun');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
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
    //$this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
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
    $this->db->order_by('id_topup','ASC');
    $this->db->join('akun','akun.id_akun = topup.id_akun');
    $this->db->join('bank_admin','bank_admin.id_bank_admin = topup.id_bank_admin');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jmlMyriwayat($data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->where('status_topup in ("sukses","gagal")');
    //$this->db->where('status_topup','menunggu');
    $this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $query = $this->db->get()->num_rows();
    return $query;
  }
  function getPgriwayat($number,$offset,$data){
    $this->db->select('*');
    $this->db->from('topup');
    $this->db->where('id_akun',$data);
    $this->db->where('status_topup in ("sukses","gagal")');
    //$this->db->where('status_topup','menunggu');
    //$this->db->join('bank_admin','topup.id_bank_admin = bank_admin.id_bank_admin');
    $this->db->order_by('topup.id_topup','DESC');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function changeTopup($data){
    $this->db->where('id_topup',$data['id_topup']);
    $this->db->set('status_topup',$data['status_topup']);
    $this->db->update('topup');
  }
}
?>
