<?php
class Done_model extends CI_Model {
  function allLelang(){
    $this->db->select('*');
    $this->db->from('barang');
    //$this->db->join('tawaran','barang.id_barang = tawaran.id_barang');
    $this->db->where('status_lelang','berlangsung');
    $query = $this->db->get();
    return $query;
  }
  function changeStat($id){
    $val = implode(",", $id);
    $this->db->where('id_barang in ('.$val.')');
    $this->db->set('status_lelang','selesai');
    $this->db->update('barang');
  }
  function changeStatl($id){
    $this->db->where('id_barang',$id);
    $this->db->set('status_gagal','gagal');
    $this->db->update('barang');
  }
  function listTawaran($id){
    $this->db->select('*');
    $this->db->from('tawaran');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function winnerBid($id){
    $this->db->select_max('jumlah_tawaran');
    $this->db->from('tawaran');
    $this->db->where('tawaran.id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function winnerData($bid,$id){
    $this->db->select('*');
    $this->db->from('tawaran');
    //$this->db->join('akun','tawaran.id_akun = akun.id_akun');
    //$this->db->join('barang','tawaran.id_barang = barang.id_barang');
    $this->db->where('jumlah_tawaran',$bid);
    $this->db->where('id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
  function insertWinner($data){
    $this->db->set('id_tawaran',$data);
    $this->db->insert('pemenang');
  }
}
