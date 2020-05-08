<?php
class Notif_model extends CI_Model {
  function getNotiftop($data){
    $this->db->select('*');
    $this->db->from('notif');
    $this->db->where('notif.id_akun',$data);
    $this->db->where('status_baca','belum');
    $this->db->join('akun','notif.id_akun = akun.id_akun');
    $this->db->join('topup','notif.id_topup = topup.id_topup');
    $query = $this->db->get();
    return $query;
  }
  function topupNotif($data){
    $this->db->set('id_topup',$data['id_topup']);
    $this->db->set('id_akun',$data['id_akun']);
    $this->db->insert('notif');
  }
  function changeNotif($data){
    $this->db->set('status_baca','sudah');
    $this->db->where('id_akun',$data);
    $this->db->where('status_baca','belum');
    $this->db->update('notif');
  }
}
