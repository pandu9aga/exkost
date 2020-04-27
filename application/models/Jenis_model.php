<?php
class Jenis_model extends CI_Model {
  function jenisBarang(){
    $this->db->select('*');
    $this->db->from('jenis_barang');
    $query = $this->db->get();
    return $query;
  }
  function jenisLimit($lim){
    $this->db->select('*');
    $this->db->from('jenis_barang');
    $this->db->limit($lim);
    $query = $this->db->get();
    return $query;
  }
  function tambahJenis($data){
    $this->db->insert('jenis_barang',$data);
  }
  function hapusJenis($data){
    $this->db->delete('jenis_barang');
    $this->db->where('id_jenis_barang',$data);
  }
  function editJenis($data,$idjenis){
    $this->db->update('jenis_barang',$data);
    $this->db->where('id_jenis_barang',$idjenis);
  }
  function idJenis($where){
    $this->db->select('*');
    $this->db->from('jenis_barang');
    $this->db->where('nama_jenis_barang',$where['nama_jenis_barang']);
    $query = $this->db->get();
    return $query;
  }
}
?>
