<?php
class Vue_model extends CI_Model {
  function insertData($data){
    $this->db->set('nama',$data['nama']);
    $this->db->insert('coba_vue');
  }
  function updateData($data){
    $this->db->where('id',$data['id']);
    $this->db->set('nama',$data['nama']);
    $this->db->update('coba_vue');
  }
  function deleteData($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('coba_vue');
  }
  function allAccount(){
    $this->db->select('*');
    $this->db->from('coba_vue');
    $query = $this->db->get();
    return $query;
  }
}
?>
