<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PPLK</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <script src="assets/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style media="screen">
      body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
          }
      main {
          flex: 1 0 auto;
          }
    </style>
  </head>

<body>
  <header>
    <!-- NAVBAR UTAMA-->
    <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo" style="padding-left: 20px">PPLK</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <?php if(Session::isOn('perusahaan')){?>
            <li><a href="data_lowongan.php">Data Lowongan</a></li>
            <li><a href="edit_profil.php">Edit Profil</a></li>
            <li><a href="profil.php"><?php echo $perusahaan_data['nama'] ?></a></li>
            <li><a href="keluar.php">Keluar</a></li>
            <?php } else {?>
            <li><a href="pendaftaran_pencaker.php">Pendaftaran Pencaker</a></li>
            <li><a href="pendaftaran_perusahaan.php">Pendaftaran Perusahaan</a></li>
            <li><a href="masuk.php">Masuk</a></li>
            <?php } ?>
          </ul>
        </div>
    </nav>
    <!-- .NAVBAR UTAMA-->

    <!-- SIDENAV VERSI MOBILE-->
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
    <!-- .SIDENAV VERSI MOBILE-->
  </header>

<script type="text/javascript">
//SCRIPT UNTUK SIDENAV VERSI MOBILE
$(document).ready(function(){
  $('.sidenav').sidenav();
});
//SCRIPT UNTUK MENGHILANGKAN PANEL NOTIFIKASI
$(document).on('click','#alert_close',function(){
  $( "#alert_panel" ).fadeOut( "slow", function() {
  });
});


//TESTING ZONE
//$(document).on('click','header',function(){
//  $("span").attr('data-error','hahahaha<br>hahahahah');
//  $("input").addClass('invalid');
//  $('<span class="helper-text sec" data-error="aaaa" data-success="">aaaa</span>').insertAfter("input");
//  $('<span class="helper-text sec" data-error="aaaa" data-success="">aaaa</span>').insertAfter("input");
//  alert('haha');
//});
</script>
