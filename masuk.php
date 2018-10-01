<?php
require_once "core/Init.php";
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
    'email' => array(
      'required' => true,
    ),
    'password' => array(
      'required' => true,
    ),
  ));
// die("a". $validation->getPassed());
  // 3. lolos validasi
  if($validation -> getPassed())
  {
    if($perusahaan->login_perusahaan(Input::get('email'), Input::get('password')))
    {
      // MENYIMPAN SESSION
      // Session::setNamaSession('variabel / key', value);
      Session::setEmailSession('perusahaan', Input::get('email'));
      //.MENYIMPAN SESSION

      // REDIRECT jika berhasil register langsung ke profil
      header('Location: profile.php');
      // .REDIRECT
    } else
    {
      $errors[] = "Login Gagal";
    }
  } else
  {
    $errors = $validation->getErrors();
  }
}


require_once "template/header.php";

 ?>

<h2>Daftar Penyedia Lowongan Kerja disini</h2>
<form class="" action="masuk.php" method="post">
  <label>Email: </label>
  <input type="text" name="email" value=""><br>
  <label>Password: </label>
  <input type="password" name="password" value=""><br>

  <input type="submit" name="submit" value="Masuk Sekarang">
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

<?php
  require_once"template/footer.php";
 ?>
