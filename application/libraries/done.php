<?php
class Done{
  function selesai($data){
    $selesai = [];
    foreach ($data['now'] as $key) {
      $now = $key->now;
    }
    foreach ($data['all'] as $value) {
      if ($value->waktu_lelang<=$now) {
        $selesai[] = $value->id_barang;
      }
    }
    if ($selesai!=NULL) {
      return $selesai;
    }
  }
}
?>
