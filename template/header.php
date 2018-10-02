<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PPLK</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
  </head>
  <body>

<header>
  <h1>PPLK</h1>
  <h5>Platform Penyedia Lapangan Kerja</h5>
  <nav>
    <?php if(Session::isAktif('perusahaan')){ ?>
    <a href="profil.php">Profil</a>
    <a href="keluar.php">Keluar</a>
    <?php } else {?>
    <a href="masuk.php">Masuk</a>
    <a href="pendaftaran_pencaker.php">Pendaftaran Pencaker</a>
    <a href="pendaftaran_perusahaan.php">Pendaftaran Perusahaan</a>
    <?php } ?>
  </nav>
</header>
<hr>
  </body>
</html>
