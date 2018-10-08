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

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<div class="container">
  <h2>Data Lowongan
    <a class="waves-effect waves-light btn-small red" href="tambah_data_lowongan.php">
      <i class="material-icons left">
        add
      </i>
      Tambah
    </a>
  </h2>

  <hr>
  <?php if(Session::isOn('data_lowongan_baru'))
  {
    echo Session::flash('data_lowongan_baru');
  }
  ?>
  <hr><br>


</div>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
