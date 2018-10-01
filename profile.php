<!--HEADER  -->
<?php
require_once "core/init.php";

// Jika session belum ada,
if(!Session::isAktif('perusahaan')){
   // redirect ke halaman register
  header("Location: pendaftaran_perusahaan.php");
}

require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<h3>Hai <?php echo Session::getEmailSession('perusahaan') ?></h3>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
