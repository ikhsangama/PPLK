<?php
require_once "core/Init.php";

// Jika session sudah ada,
if($perusahaan->islogin())
{
   // redirect ke halaman register
  // header("Location: profil.php");
  Redirect::to("profil");
}

if(Session::isOn('peringatan'))
{
  echo Session::flash('peringatan');
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
    if($perusahaan->check_email(Input::get('email')))
    {
      if($perusahaan->login_perusahaan(Input::get('email'), Input::get('password')))
      {
        // MENYIMPAN SESSION
        // Session::setNamaSession('variabel / key', value);
        Session::setSession('perusahaan', Input::get('email'));
        //.MENYIMPAN SESSION

        // REDIRECT jika berhasil register langsung ke profil
        // header('Location: profil.php');
        Redirect::to('profil');
        // .REDIRECT
      } else
      {
        $errors[] = "Login Gagal";
      }
    } else
    {
      $errors[] = "Email belum terdaftar";
    }
  } else
  {
    $errors = $validation->getErrors();
  }
}


require_once "template/header.php";
 ?>
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
    <div class="col l10 m12 s12 offset-l1">
      <div class="card-panel">
        <h3>Masuk Penyedia Lowongan Kerja</h3>
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

        <form class="section" action="masuk.php" method="post">
          <div class="input-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>

          <div class="input-field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <button class="btn waves-effect waves-light" type="submit" >Masuk
            <i class="material-icons right">send</i>
          </button>
          <input type="hidden" name="submit" value="Masuk Sekarang">
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
</div>

</main>
<?php
  require_once"template/footer.php";
 ?>
