<?php
class Bankadmin_model extends CI_Model {
  function bankAdmin(){
    $this->db->select('*');
    $this->db->from('bank_admin');
    $query = $this->db->get();
    return $query;
  }
  function selectBank($rek){
    $this->db->select('*');
    $this->db->from('bank_admin');
    $this->db->where('id_bank_admin',$rek);
    $query = $this->db->get();
    return $query;
  }
  function nameBank($rek){
    $this->db->select('*');
    $this->db->from('bank_admin');
    $this->db->where('nama_bank_admin',$rek);
    $query = $this->db->get();
    return $query;
  }
}
?>
