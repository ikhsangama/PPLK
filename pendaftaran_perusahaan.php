<?php
require_once "core/Init.php";

// Jika session sudah ada,
if($perusahaan->isLogin()){
   // redirect ke halaman register
  // header("Location: profil.php");
  Redirect::to('profil');
}

//VALIDASI
//setelah load folder classes namun sebelum render tampilan header
// if(isset($_POST['submit'])){
//   echo "tombol submit sudah ditekan";
// }
$errors = array();


if (Input::get('submit'))
{
  // 1. Memanggil obj validasi
  $validation = new Validation();
  // 2. Metode check
  $validation = $validation->check(array(
    'nama' => array(
      'required' => true,
      'min'=> 3,
      'max'=>15,
    ),
    'email' => array(
      'required' => true,
      'min'=> 3,

    ),
    'password' => array(
      'required' => true,
      'min' => 3,
    ),
    'password_verify' => array(
      'required' => true,
      'match' => 'password',
    ),
  ));
// die("a". $validation->getPassed());
// Cek apakah nama sudah terdaftar
  if($perusahaan->check_email(Input::get('email')))
  {
    $errors[]="Email sudah terdaftar";
  }else // 3. lolos validasi
  {
    if($validation -> getPassed())
    {
      $perusahaan->register_perusahaan(array(
        //'kolom' => nilai
        'nama' => Input::get('nama'),
        'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
        'nama_pemilik' => Input::get('nama_pemilik'),
        'alamat' => Input::get('alamat'),
        'kota' => Input::get('kota'),
        'email' => Input::get('email'),
        'no_telp' => Input::get('no_telp'),
        'tgl_daftar'=> date("Y-m-d")
      ));

      // MENYIMPAN SESSION
      // Menampilkan pesan flash pertama kali mendaftar
      Session::flash('profil_baru', 'Selamat! Akun perusahaan anda telah berhasil didaftarkan.');
      // Session::setNamaSession('variabel / key', value);
      Session::setSession('perusahaan', Input::get('email'));
      //.MENYIMPAN SESSION

      // REDIRECT jika berhasil register langsung ke profil
      // header('Location: profil.php');
      Redirect::to('profil');
      // .REDIRECT
    } else
    {
      $errors = $validation->getErrors();
    }
  }
}


require_once "template/header.php";

 ?>
<main>
<div class="container">
  <div class="row">
    <div class="col l12 m12 s12">
      <div class="card-panel">
      <h3>Daftar Penyedia Lowongan Kerja disini</h3>
      <div class="divider"></div>
      <!--MENAMPILKAN ERROR  -->
      <?php if(!empty($errors)) { ?>
        <div id="errors">
          <?php foreach($errors as $error){ ?>
            <li><?php echo $error ?></li>
          <?php } ?>
        </div>
      <?php } ?>
      <!--.MENAMPILKAN ERROR  -->
      <div class="divider"></div>

      <br>
      <form class="section" action="pendaftaran_perusahaan.php" method="post">
        <div class="input-field">
            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" value="<?php echo Input::get('nama') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="password_verify">Konfirmasi Password</label>
            <input id="password_verify" name="password_verify" type="password">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input id="nama_pemilik" name="nama_pemilik" type="text" value="<?php echo Input::get('nama_pemilik') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text" value="<?php echo Input::get('alamat') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="kota">Kota</label>
            <input id="kota" name="kota" type="text" value="<?php echo Input::get('kota') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?php echo Input::get('email') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <div class="input-field">
            <label for="no_telp">Nomor Telepom</label>
            <input id="no_telp" name="no_telp" type="text" value="<?php echo Input::get('no_telp') ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
        </div>
        <button class="btn waves-effect waves-light" type="submit" >Daftar Sekarang
            <i class="material-icons right">send</i>
        </button>
        <input type="hidden" name="submit" value="Daftar Sekarang">

      </form>
      </div>
    </div>
  </div>
</div>
</main>
<?php
  require_once"template/footer.php";
 ?>
