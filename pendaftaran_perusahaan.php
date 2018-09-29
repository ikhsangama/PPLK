<?php
require_once "core/Init.php";
//VALIDASI
//setelah load folder classes namun sebelum render tampilan header
// if(isset($_POST['submit'])){
//   echo "tombol submit sudah ditekan";
// }
if (Input::get('submit'))
{
  // 1. Memanggil obj validasi
  $validation = new Validation();
  // 2. Metode check
  $validation = $validation->check(array(
    'nama' => array(
      'required' => true,
      'min'=> 3,
      'max'=>50,
    ),
    'password' => array(
      'required' => true,
      'min' => 3,
    )
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
  } else
  {
    print_r($validation->getErrors());
  }
}


require_once "template/header.php";

 ?>

<h2>Daftar Penyedia Lowongan Kerja disini</h2>
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


</form>

<?php
  require_once"template/footer.php";
 ?>
