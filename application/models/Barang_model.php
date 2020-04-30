<?php
class Barang_model extends CI_Model {
  function uploadBarang($data,$table){
    $this->db->insert($table,$data);
  }
  function getAll(){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $query = $this->db->get();
    return $query;
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
  function getPage($number,$offset){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_data(){
    return $this->db->get('barang')->num_rows();
  }
  function getFS($number,$offset,$kategori,$min,$max,$sort,$where){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_FS($kategori,$min,$max,$sort,$where){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    return $this->db->get()->num_rows();
  }
}
?>
