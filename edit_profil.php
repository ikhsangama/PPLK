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
  if(Input::get('password_baru') ||Input::get('password_lama') || Input::get('password_verify'))
  {
    // 1. Memanggil obj validasi
    $validation = new Validation();
    // 2. Metode check
    $validation = $validation->check(array(
      'password_lama' => array(
        'required' => true,
      ),
      'password_baru' => array(
        'required' => true,
        'min' => 3,
      ),
      'password_verify' => array(
        'required' => true,
        'match' => 'password_baru',
      ),
    ));

    if($validation->getPassed())
    {
      if(password_verify(Input::get('password_lama'), $perusahaan_data['password']))
      {
        $perusahaan->update_perusahaan(array(
          'password' => password_hash(Input::get('password_baru'), PASSWORD_DEFAULT)
        ), $perusahaan_data['idperusahaan']);

        Session::flash('profil_baru', 'Data profil anda telah diperbarui');
        Redirect::to('profil');
      } else
      {
        $errors[] = 'Password lama anda salah';
      }
    } else
    {
      $errors = $validation -> getErrors(); //harusnya cek error
    }
  }
}
// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke header
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<div class="container">
  <h2>Edit Profil <?php echo $perusahaan_data['nama'] ?> </h2>
  <hr><hr><br>

  <form class="" action="edit_profil.php" method="post">

    <h5>Ubah Password</h5>
    <label>Password Lama: </label>
    <input type="password" name="password_lama" value=""><br>
    <label>Password Baru: </label>
    <input type="password" name="password_baru" value=""><br>
    <label>Ulangi Password: </label>
    <input type="password" name="password_verify" value=""><br>

    <h5>Ubah Data</h5>
    <label>Nama: </label>
    <input type="text" name="nama" value=""><br>
    <label>Nama Pemilik: </label>
    <input type="text" name="nama_pemilik" value=""><br>
    <label>Alamat: </label>
    <input type="text" name="alamat" value=""><br>
    <label>Kota: </label>
    <input type="text" name="kota" value=""><br>
    <label>Email: </label>
    <input type="text" name="email" value=""><br>
    <label>No Telp: </label>
    <input type="text" name="no_telp" value=""><br>

    <input type="submit" name="submit" value="Daftar Sekarang">

    <!--MENAMPILKAN ERROR  -->
    <?php if(!empty($errors)) { ?>
      <div id="errors">
        <?php foreach($errors as $error){ ?>
          <li><?php echo $error ?></li>
        <?php } ?>
      </div>
    <?php } ?>
    <!--.MENAMPILKAN ERROR  -->

  </form>
</div>

<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
