<!--HEADER  -->
<?php
require_once "core/init.php";

// Jika session belum ada,
if(!Session::isOn('perusahaan'))
{
  Session::flash('peringatan', 'Anda harus login');
   // redirect ke halaman register
  header("Location: masuk.php");
}

if(Session::isOn('daftar_baru'))
{
  echo Session::flash('daftar_baru');
}
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<h3>Hai <?php echo Session::getSession('perusahaan') ?></h3>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
