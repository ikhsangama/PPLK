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

//harus ada input dengan nama submit, kalo enggak ke skip proses validasinya
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
    <!--.MENAMPILKAN ERROR  -->

  </div>
</div>

  <div class="row">
    <div class="col l10 m10 s12 offset-l1 offset-m1">
      <div class="card az-depth-4">
        <div class="card-content">
        <h3>Daftar Penyedia Lowongan Kerja disini</h3>
        <div class="divider"></div>

        <form class="section" action="pendaftaran_perusahaan.php" method="post" id="formDaftarPerusahaan">

          <div class="input-field">
            <label for="nama">Nama*</label>
            <input id="nama" name="nama" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="password">Password*</label>
            <input id="password" name="password" type="password">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input id="nama_pemilik" name="nama_pemilik" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="kota">Kota</label>
            <input id="kota" name="kota" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <div class="input-field">
            <label for="no_telp">Nomer Telepon</label>
            <input id="no_telp" name="no_telp" type="text">
            <span class="helper-text main" data-error="" data-success=""></span>
          </div>
          <input type="hidden" name="submit" value="kekirimgan">
          <button class="btn waves-effect waves-light" type="submit" >Submit
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
</main>
<script>
//VALIDASI FORM CLIENT SIDE
//Menggunakan jqueryvalidation
//settingan untuk peletakan error ada di file assets/js/validation.js
$("#formDaftarPerusahaan").validate({
  rules: {
      nama: {
          required: true,
      },
      email: {
          required: true,
          email:true,

      },
      password: {
        required: true,
        minlength: 5
      }
},
messages: {
  nama:{
      required: "Masukan Nama",

  },
  email:{
      required: "Masukan Email",
      email: "Format email salah"
  },
  password:{
      required: "Masukan Password",
      minlength: "Minimal 5 karakter"
  }
},
});
</script>
<?php
  require_once"template/footer.php";
 ?>
