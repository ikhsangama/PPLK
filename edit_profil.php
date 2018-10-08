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
  <h2>Edit Profil <?php echo $perusahaan_data['nama'] ?> </h2>
  <hr><hr><br>

  <form class="" action="edit_profil.php" method="post">

    <h5>Ubah Data</h5>
    <label>Nama: </label>
    <input type="text" name="nama" value=<?php echo $perusahaan_data['nama'] ?>><br>
    <label>Nama Pemilik: </label>
    <input type="text" name="nama_pemilik" value=<?php echo $perusahaan_data['nama_pemilik'] ?>><br>
    <label>Alamat: </label>
    <input type="text" name="alamat" value=<?php echo $perusahaan_data['alamat'] ?>><br>
    <label>Kota: </label>
    <input type="text" name="kota" value=<?php echo $perusahaan_data['kota'] ?>><br>
    <label>Email: </label>
    <input type="text" name="kota" value=<?php echo $perusahaan_data['email'] ?> disabled><br>
    <label>No Telp: </label>
    <input type="text" name="no_telp" value=<?php echo $perusahaan_data['no_telp'] ?>><br>

    <h6>Konfirmasi Perubahan: </h6>
    <input type="password" name="password" value="" placeholder="password"><br>

    <input type="submit" name="submit" value="Simpan">

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
</main>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
