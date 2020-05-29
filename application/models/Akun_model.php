<?php
class Akun_model extends CI_Model {
  function loginAkun($data){
    $this->db->select('*');
    $this->db->from('akun');
    $this->db->where('email_akun',$data['email_akun']);
    $this->db->where('pass_akun',$data['pass_akun']);
    $query = $this->db->get();
    return $query;
  }
  function cekEmail($data){
    $this->db->select('*');
    $this->db->from('akun');
    $this->db->where('email_akun',$data['email_akun']);
    $query = $this->db->get();
    return $query;
  }
  function registerAkun($data,$table){
    $this->db->set('nama_akun',$data['nama_akun']);
    $this->db->set('alamat_akun',$data['alamat_akun']);
    $this->db->set('no_telp_akun',$data['no_telp_akun']);
    $this->db->set('email_akun',$data['email_akun']);
    $this->db->set('pass_akun',$data['pass_akun']);
    $this->db->set('rekening_akun',$data['rekening_akun']);
    $this->db->insert($table);
  }
  function dataAkun($id_akun){
    $this->db->select('*');
    $this->db->from('akun');
    $this->db->where('id_akun',$id_akun);
    $query = $this->db->get();
    return $query;
  }
  function updateProfil($data,$where){
    $this->db->where($where);
    $this->db->update('akun',$data);
  }
  function topupSaldo($data){
    $this->db->set('saldo_akun',$data['nominal']);
    $this->db->where('id_akun',$data['id_akun']);
    $this->db->update('akun');
  }
  function bid($data){
    $this->db->set('saldo_akun',$data['change']);
    $this->db->where('id_akun',$data['id_akun']);
    $this->db->update('akun');
  }
  function losBid($id,$saldo){
    $this->db->set('saldo_akun',$saldo);
    $this->db->where('id_akun',$id);
    $this->db->update('akun');
  }
  function allAccount(){
    $this->db->select('*');
    $this->db->from('akun');
    $query = $this->db->get();
    return $query;
  }
}
?>
