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

if (Input::get('submit'))
{
  // 1. Memanggil obj validasi
  $validation = new Validation();

  if(password_verify(Input::get('password'), $perusahaan_data['password']))
  {
    // 2. Metode check
    $validation = $validation->check(array(
      'nama' => array(
        'required' => true,
        'min' => 3,
      ),
      'nama_pemilik' => array(
        'required' => true,
        'min' => 3,
      ),
      'password' => array(
        'required' => true,
        'min' => 3,
      ),
    ));

    if($validation->getPassed())
    {
      $perusahaan->update_perusahaan(array(
        'nama' => Input::get('nama'),
        'nama_pemilik' => Input::get('nama_pemilik'),
        'alamat' => Input::get('alamat'),
        'kota' => Input::get('kota'),
        'no_telp' => Input::get('no_telp'),
      ), $perusahaan_data['idperusahaan']);

      Session::flash('profil_baru', 'Data profil anda telah diperbarui');
      Redirect::to('profil');
    } else
    {
      $errors = $validation -> getErrors(); //harusnya cek error
    }
  }else
  {
    $errors[] = 'Password salah';
  }
}
// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke header
require_once "template/header.php"
?>

<!--.HEADER  -->
<main>
<!--KONTEN  -->
<div class="container">
  <div class="row">
    <div class="col l12 m12 s12">
      <div class="card-panel">
        <h3>Edit Profil <?php echo $perusahaan_data['nama'] ?> </h3>
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

        <form class="section" action="edit_profil.php" method="post">
          <div class="input-field">
            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" value="<?php echo $perusahaan_data['nama'] ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input id="nama_pemilik" name="nama_pemilik" type="text" value="<?php echo $perusahaan_data['nama_pemilik'] ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text" value="<?php echo $perusahaan_data['alamat'] ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="kota">Kota</label>
            <input id="kota" name="kota" type="text" value="<?php echo $perusahaan_data['kota'] ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?php echo $perusahaan_data['email'] ?>" readonly>
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="no_telp">Nomor Telepon</label>
            <input id="no_telp" name="no_telp" type="text" value="<?php echo $perusahaan_data['no_telp'] ?>">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="divider"></div>
          <h6 class="red-text">Konfirmasi Perubahan</h6>
          <div class="input-field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <button class="btn waves-effect waves-light" type="submit" >Simpan
            <i class="material-icons right">send</i>
          </button>
          <input type="hidden" name="submit" value="Simpan">
        </form>
      </div>
    </div>
  </div>
</div>
</main>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
