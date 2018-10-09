<!--HEADER  -->
<?php
require_once "core/init.php";

// Jika session belum ada,
if(!$perusahaan->isLogin())
{
  Session::flash('peringatan', 'Anda harus login');
   // redirect ke halaman register
  // header("Location: masuk.php");
  Redirect::to('masuk');
}

$loker_data = $loker->get_data(Input::get('idloker'));
// Jika loker tidak ada di database
if(!$loker_data)
{
  Session::flash('peringatan', "Hapus data lowongan ". Input::get('idloker'). " tidak ditemukan");

  Redirect::to('data_lowongan');
}

// Hanya perusahaan yang dapat menghapus lokernya sendiri
if($loker_data['idperusahaan']==$perusahaan_data['idperusahaan'])
{
  if($loker->hapus_loker($loker_data['idloker']))
  {
    Session::flash('sukses', "Hapus data lowongan ". Input::get('nama'). " telah dihapus");

    Redirect::to('data_lowongan');
  } else
  {
    Session::flash('peringatan', "Hapus data lowongan ". Input::get('idloker'). " gagal");

    Redirect::to('data_lowongan');
  }
}
else
{
  Session::flash('peringatan', "Tidak dapat menghapus loker perusahaan lain");

  Redirect::to('data_lowongan');
}
?>
