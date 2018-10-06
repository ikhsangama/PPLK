<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PPLK</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style media="screen">
    </style>
  </head>
  <body>
    <nav>
        <div class="container nav-wrapper">
          <a href="#!" class="brand-logo">PPLK</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <?php if(Session::isOn('perusahaan')){?>
            <li><a href="edit_profil.php">Edit Profil</a></li>
            <li><a href="profil.php"><?php echo $perusahaan_data['nama'] ?></a></li>
            <li><a href="keluar.php">Keluar</a></li>
            <?php } else {?>
            <li><a href="masuk.php">Masuk</a></li>
            <li><a href="pendaftaran_pencaker.php">Pendaftaran Pencaker</a></li>
            <li><a href="pendaftaran_perusahaan.php">Pendaftaran Perusahaan</a></li>
            <?php } ?>
          </ul>
        </div>
      </nav>

      <ul class="sidenav" id="mobile-demo">
        <?php if(Session::isOn('perusahaan')){ ?>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="keluar.php">Keluar</a></li>
        <?php } else {?>
        <li><a href="masuk.php">Masuk</a></li>
        <li><a href="pendaftaran_pencaker.php">Pendaftaran Pencaker</a></li>
        <li><a href="pendaftaran_perusahaan.php">Pendaftaran Perusahaan</a></li>
        <?php } ?>
      </ul>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $('.sidenav').sidenav();
});
</script>
