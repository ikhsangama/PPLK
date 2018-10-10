<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PPLK</title>

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <script src="assets/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/tema.css" rel="stylesheet">
  </head>
  <body class="indigo lighten-5">
    <header>
      <nav class="serious-error">
          <div class="container nav-wrapper ">
            <a href="#!" class="brand-logo">PPLK</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <?php if(Session::isOn('perusahaan')){?>
              <li><a href="data_lowongan.php">Data Lowongan</a></li>
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><?php echo $perusahaan_data['nama'] ?><i class="material-icons right">arrow_drop_down</i></a></li>
              <!-- .Dropdown Trigger-->
              <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="profil.php">Profil</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="edit_profil.php">Edit Profil</a></li>
                <li><a href="ganti_password.php">Ganti password</a></li>
                <li><a href="keluar.php">Keluar</a></li>
              </ul>
              <!-- .Dropdown Structure -->
              <?php } else {?>
              <li><a href="pendaftaran_pencaker.php">Pendaftaran Pencaker</a></li>
              <li><a href="pendaftaran_perusahaan.php">Pendaftaran Perusahaan</a></li>
              <li><a href="masuk.php">Masuk</a></li>
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
    </header>
<script type="text/javascript">
$(document).ready(function(){
  $('.sidenav').sidenav();
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    coverTrigger: false,
  });

});
$(document).on('click','#alert_close',function(){
  $( "#alert_panel" ).fadeOut( "slow", function() {
  });
});
</script>
