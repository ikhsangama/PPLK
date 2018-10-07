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
        Session::setEmailSession('perusahaan', Input::get('email'));
        //.MENYIMPAN SESSION

        // REDIRECT jika berhasil register langsung ke profil
        header('Location: profil.php');
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

 <script type="text/javascript">
 //MENGEMBALIKAN ERROR DARI SERVER
 //Mengambil error report dari class validation
 //Lalu meletakan error report pada tiap input yang salah
 var error=<?php echo json_encode($errors); ?>;
 console.log(error);
 $(document).on('ready',function(){
   $.each(error, function( index, value ) {
     var $element=$('input[name="'+index+'"]');
     var errmain=$element.siblings('span.main').data("error");
     if (errmain) {
       $('<span class="helper-text sec" data-error="'+value+'" data-success=""></span>').insertAfter($element);
       console.log(index+' main ada');
     }else {
       $element.siblings('span.main').attr("data-error",value);
       console.log('kosong');
     }
     $element.addClass('invalid');
    // $('input[name="'+index+'"]').addClass('invalid');
    // console.log(index);
    // $('<span class="helper-text sec" data-error="'+value+'" data-success=""></span>').insertAfter('input[name="'+index+'"]');
   });
  });
 </script>

 <!-- SCRIPT FORM VALIDATION-->
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
 <script type="text/javascript" src="assets/js/validation.js"></script>
 <!-- .SCRIPT FORM VALIDATION-->

<main>
<div class="container">
  <div class="row">
  <div class="section">

    <!--MENAMPILKAN PERINGATAN ERROR DIATAS FORM UTAMA  -->
    <div class="col l10 m10 s12 offset-l1 offset-m1">
    <?php if(!empty($errors)) { ?>
        <div class="card-panel red lighten-4" id="alert_panel">
          <i class="material-icons right" id="alert_close" style="cursor:pointer">close</i>
          <b>PERINGATAN : </b> Cek Kembali Form Yang Di Masukan
        </div>
    <?php } ?>
  </div>
    <!--.MENAMPILKAN PERINGATAN ERROR DIATAS FORM UTAMA  -->

  </div>
</div>
  <div class="row">
    <div class="col l10 m10 s12 offset-l1 offset-m1">
      <div class="card-panel az-depth-4">
      <h3>Masuk Penyedia Lowongan Kerja disini</h3>
      <div class="divider"></div>
        <form id="formMasuk" class="section" action="masuk.php" method="post">
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
          <input type="hidden" name="submit" value="kekirimgan">
          <button class="btn waves-effect waves-light" type="submit" >Masuk Sekarang
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

<script>
//VALIDASI FORM CLIENT SIDE
//Menggunakan jqueryvalidation
//settingan untuk peletakan error ada di file assets/js/validation.js
$("#formMasuk").validate({
  rules: {
      email: {
          required: true,
          email:true,

      },
      password: {
        required: true,
      }
},
messages: {
  email:{
      required: "Masukan Email",
      email: "Format email salah"
  },
  password:{
      required: "Masukan Password",
  }
},
});
</script>

<?php
  require_once"template/footer.php";
 ?>
