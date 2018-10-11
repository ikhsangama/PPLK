
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
$errors = array();
if (Input::get('submit')){
  // 1. Memanggil obj validasi
  $validation = new Validation();
  // 2. Metode check
  $validation = $validation->check(array(
    'password' => array(
      'required' => true,
    ),
    'password_new' => array(
      'required' => true,
      'min' => 3,
    ),
    'password_new_verify' => array(
      'required' => true,
      'match' => 'password',
    ),
  ));
  if (password_verify(Input::get('password'),$perusahaan_data['password'])) {
    // code...
    if($validation -> getPassed())
    {
        $perusahaan->update_perusahaan(array(
        'password' => Input::get('password_new'),
      ), $perusahaan_data['idperusahaan']);
      Session::flash('ganti_password', 'Password Berhasil Diganti.');
    } else
    {
      $errors = $validation->getErrors();
    }
  }else {
    // code...
    $errors[]='password lama Salah.';
  }
}
// die("a". $validation->getPassed());
// Cek apakah nama sudah terdaftar
// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->
<main>
  <div class="container">
    <div class="row">
      <div class="col l12 m12 s12">
        <?php if (!empty($errors)) {?>
          <div class="card-panel red lighten-4" id="alert_panel">
            <i class="material-icons right" id="alert_close" style="cursor:pointer">close</i>
            <b>PERINGATAN : </b> Cek Kembali Form Yang Di Masukan
          </div>
        <?php }?>
      </div>
    </div>
    <div class="row">
      <div class="col l12 m12 s12">
        <div class="card-panel">
          <h3>Ganti Password</h3>
          <div class="divider"></div>
          <div class="section">
            <form class="" action="ganti_password.php" method="post">
              <div class="input-field">
                  <label for="password">Password Lama</label>
                  <input id="password" name="password" type="password">
                  <span class="helper-text main" data-error="" data-success=""></span>
              </div>
              <div class="input-field">
                  <label for="password_new">Password Baru</label>
                  <input id="password_new" name="password_new" type="password">
                  <span class="helper-text main" data-error="" data-success=""></span>
              </div>
              <div class="input-field">
                  <label for="password_new_verify">Konfirmasi Password Baru</label>
                  <input id="password_new_verify" name="password_new_verify" type="password">
                  <span class="helper-text main" data-error="" data-success=""></span>
              </div>
              <div class="right-align">
                <button type="submit" value="tambah_data_lowongan" name="tambah_data_lowongan" class="btn" > Tambah Lowongan Kerja
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
