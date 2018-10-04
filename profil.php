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

if(Session::isOn('daftar_baru'))
{
  echo Session::flash('daftar_baru');
}

$perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan'));
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<h3>Hai <?php echo $perusahaan_data['nama'] ?></h3>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
