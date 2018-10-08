<?php
session_start();

// metode untuk load classes
spl_autoload_register(function($class){
  require_once 'classes/'.$class.'.php';
});

$perusahaan = new Perusahaan();

// Jika session perusahaan aktif
if(Session::isOn('perusahaan'))
{
 $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan'));
 // die($perusahaan_data['idperusahaan']);
 // akses kelas lain setelah session aktif
 $loker = new Loker();
 $loker_table = $loker->get_table($perusahaan_data['idperusahaan']);

 $bidang_pekerjaan = new BidangPekerjaan();
 $bidang_pekerjaan_table = $bidang_pekerjaan->get_table();

 $tingkat_pendidikan = new TingkatPendidikan();
 $tingkat_pendidikan_table = $tingkat_pendidikan->get_table();
}
?>
