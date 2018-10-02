<?php
require_once "core/Init.php";

// Jika session sudah ada,
if(Session::isAktif('perusahaan')){
   // redirect ke halaman register
  header("Location: profil.php");
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
    'password' => array(
      'required' => true,
      'min' => 3,
    ),
  ));
// die("a". $validation->getPassed());
  // 3. lolos validasi
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
    ));


    // MENYIMPAN SESSION
    // Session::setNamaSession('variabel / key', value);
    Session::setEmailSession('perusahaan', Input::get('email'));
    //.MENYIMPAN SESSION

    // REDIRECT jika berhasil register langsung ke profil
    header('Location: profil.php');
    // .REDIRECT
  } else
  {
    $errors = $validation->getErrors();
  }
}


require_once "template/header.php";

 ?>
<div class="container">
  <div class="row">
    <div class="col m6 s12">
      <h3>Daftar Penyedia Lowongan Kerja disini</h3>
      <form class="" action="pendaftaran_perusahaan.php" method="post">
        <label>Nama: </label>
        <input type="text" name="nama" value=""><br>
        <label>Password: </label>
        <input type="password" name="password" value=""><br>
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
  </div>
</div>
<?php
  require_once"template/footer.php";
 ?>
