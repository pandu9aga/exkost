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
}
?>
