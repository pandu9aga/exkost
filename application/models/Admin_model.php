<?php
class Admin_model extends CI_Model {
  function loginAdmin($data){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('nama_admin',$data['nama_admin']);
    $this->db->where('pass_admin',$data['pass_admin']);
    $query = $this->db->get();
    return $query;
  }
  function cekNama($data){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('nama_admin',$data['nama_admin']);
    $query = $this->db->get();
    return $query;
  }
  function registerAdmin($data,$table){
    $this->db->set('nama_admin',$data['nama_admin']);
    $this->db->set('pass_admin',$data['pass_admin']);
    $this->db->insert($table);
  }
  function dataAdmin($id_admin){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('id_admin',$id_admin);
    $query = $this->db->get();
    return $query;
  }
  function updateProfil($data,$where){
    $this->db->where($where);
    $this->db->update('admin',$data);
  }
}
?>
