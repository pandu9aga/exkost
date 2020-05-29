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
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $this->db->where('status_lelang','berlangsung');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_data(){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('status_lelang','berlangsung');
    $query = $this->db->get()->num_rows();
    return $query;
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
    $this->db->where('status_lelang','berlangsung');
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
    $this->db->where('status_lelang','berlangsung');
    return $this->db->get()->num_rows();
  }
  function getFSK($number,$offset,$kategori,$min,$max,$sort,$where,$keyword){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where('status_lelang','berlangsung');
    $this->db->like('nama_barang',$keyword);
    $this->db->or_like('nama_jenis_barang',$keyword);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_FSK($kategori,$min,$max,$sort,$where,$keyword){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where('status_lelang','berlangsung');
    $this->db->like('nama_barang',$keyword);
    $this->db->or_like('nama_jenis_barang',$keyword);
    return $this->db->get()->num_rows();
  }
  function getmyAll($id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $this->db->where('barang.id_akun = ',$id);
    $query = $this->db->get();
    return $query;
  }
  function getmyPage($number,$offset,$id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_mydata($id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('barang.id_akun = ',$id);
    return $this->db->get()->num_rows();
  }
  function getmyFS($number,$offset,$kategori,$min,$max,$sort,$where,$id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_myFS($kategori,$min,$max,$sort,$where,$id){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    return $this->db->get()->num_rows();
  }
  function getFSlim($number,$offset,$kategori,$min,$max,$sort,$where,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_FSlim($kategori,$min,$max,$sort,$where,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    return $this->db->get()->num_rows();
  }
  function getmyAlllim($id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->join('akun','akun.id_akun = barang.id_akun');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->where($lim);
    $query = $this->db->get();
    return $query;
  }
  function getmyPagelim($number,$offset,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->where($lim);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_mydatalim($id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->where($lim);
    return $this->db->get()->num_rows();
  }
  function jumlah_mydatalim2($id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->where($lim);
    $this->db->where('barang.status_transfer in ("","kirim")');
    return $this->db->get()->num_rows();
  }
  function getmyPagelim2($number,$offset,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->where($lim);
    $this->db->where('barang.status_transfer in ("","kirim")');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_mydatalim3($id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('status_transfer="terima" or status_gagal="gagal"');
    $this->db->where('barang.id_akun = ',$id);
    return $this->db->get()->num_rows();
  }
  function getmyPagelim3($number,$offset,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by('barang.id_barang','DESC');
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('status_transfer="terima" or status_gagal="gagal"');
    $this->db->where('barang.id_akun = ',$id);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  //FS = Filter Sort;
  function getmyFSlim($number,$offset,$kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_myFSlim($kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    return $this->db->get()->num_rows();
  }
  function getmyFSlim2($number,$offset,$kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    $this->db->where('barang.status_transfer in ("","kirim")');
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_myFSlim2($kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    $this->db->where($lim);
    $this->db->where('barang.status_transfer in ("","kirim")');
    return $this->db->get()->num_rows();
  }
  function getmyFSlim3($number,$offset,$kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('barang.status_transfer="terima" or barang.status_gagal="gagal"');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    //$this->db->where($lim);
    $this->db->limit($number, $offset);
    $query = $this->db->get();
    return $query;
  }
  function jumlah_myFSlim3($kategori,$min,$max,$sort,$where,$id,$lim){
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('barang.status_transfer="terima" or barang.status_gagal="gagal"');
    $this->db->order_by($where,$sort);
    $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang');
    $this->db->join('jenis_barang','jenis_barang.id_jenis_barang = barang.id_jenis_barang');
    $this->db->where('barang.harga_barang >= ',$min);
    $this->db->where('barang.harga_barang <= ',$max);
    $this->db->where('barang.id_akun = ',$id);
    $val = implode(",", $kategori);
    $this->db->where('barang.id_jenis_barang in ('.$val.')');
    //$this->db->where($lim);
    return $this->db->get()->num_rows();
  }
  function chStat($id,$c){
    $this->db->where('id_barang',$id);
    $this->db->set($c);
    $this->db->update('barang');
  }
  function getThistrans($id){
    $this->db->select('*');
    $this->db->from('transfer');
    $this->db->where('id_barang',$id);
    $query = $this->db->get();
    return $query;
  }
}
?>
