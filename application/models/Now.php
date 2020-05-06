<?php
class Now extends CI_Model {
  function insertNow(){
    $this->db->set('id_now','1');
    $this->db->set('now','NOW()', FALSE);
    $this->db->insert('now');
  }
  function updateNow(){
    $this->db->where('id_now','1');
    $this->db->set('now','NOW()', FALSE);
    $this->db->update('now');
  }
  function getNow(){
    $this->db->select('*');
    $this->db->from('now');
    $this->db->where('id_now','1');
    $query = $this->db->get();
    return $query;
  }
}
