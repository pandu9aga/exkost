<?php
class Barang_model extends CI_Model {
  function uploadBarang($data,$table){
    $this->db->insert($table,$data);
  }
  function getBarang($data){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where($data);
    $query = $this->db->get();
    return $query;
  }
  function uploadGambar($gbr){
    $this->db->insert('gambar_barang',$gbr);
  }
}
?>
