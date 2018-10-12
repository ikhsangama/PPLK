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

if(Input::get('tambah_data_lowongan'))
{
  // 1. Memanggil obj validasi
  $validation = new Validation();

  // 2. Metode check
  $validation = $validation->check(array(
    'nama' => array(
      'required' => true,
      'min' => 3,
    ),
    'idbidang' => array(
      'required' => true,
    ),
    'idtingkat_pendidikan' => array(
      'required' => true,
    ),
    'usia_min' => array(
      'less_than' => 'usia_max',
    ),
    'usia_max' => array(
      'more_than' => 'usia_min',
    ),
    'gaji_min' => array(
      'less_than' => 'gaji_max',
    ),
    'gaji_max' => array(
      'more_than' => 'gaji_min',
    ),
    'tgl_expired' => array(
      'required' => true,
    ),
  ));

  // die("d");
  if($validation->getPassed())
  {

    $loker->create_loker(array(
      //'kolom' => nilai
      'idperusahaan' => $perusahaan_data['idperusahaan'],
      'nama' => Input::get('nama'),
      'idbidang' => intval(Input::get('idbidang')),
      'idtingkat_pendidikan' => intval(Input::get('idtingkat_pendidikan')),
      'tipe' => Input::get('tipe'),
      'usia_min' => Input::get('usia_min'),
      'usia_max' => Input::get('usia_max'),
      'gaji_min' => Input::get('gaji_min'),
      'gaji_max' => Input::get('gaji_max'),
      'nama_cp' => Input::get('nama_cp'),
      'email_cp' => Input::get('email_cp'),
      'no_telp_cp' => Input::get('no_telp_cp'),
      'tgl_insert' => date("Y-m-d"),
      'tgl_update' => date("Y-m-d"),
      'tgl_expired' => Input::get('tgl_expired'),
      'deskripsi_loker' => Input::get('deskripsi_loker'),
    ));

    // MENYIMPAN SESSION
    // Menampilkan pesan flash pertama kali mendaftar
    Session::flash('sukses', 'Loker perusahaan anda telah berhasil didaftarkan.');

    //.MENYIMPAN SESSION

    // REDIRECT jika berhasil register langsung ke profil
    // header('Location: profil.php');
    Redirect::to('data_lowongan');
    // .REDIRECT
  } else
  {
    $errors = $validation->getErrors();
  }
}

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<main>
<div class="container">
  <div class="row">
    <div class="col l12 m12 s12">
      <div class="card-panel">
        <h4>Tambah Data Lowongan</h4>

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

        <!-- javascript validator-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="assets/js/validation.js"></script>
        <script src="assets/js/formhelper.js"></script>
        <!-- .javascript validator-->

        <form class="section" id="formTambahLowongan" action="tambah_data_lowongan.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <label for="nama_perusahaan">Nama Perusahaan</label>
              <input id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?php echo $perusahaan_data['nama'] ?>" readonly>
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="nama">Nama Lowongan</label>
              <input id="nama" name="nama" type="text" value="<?php echo Input::get('nama') ?>" autofocus>
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <select name="idbidang" id="idbidang" required>
                <option value="" disabled selected>Pilih</option>
              <?php while($row = mysqli_fetch_array($bidang_pekerjaan_table)){ ?>
                <option value=<?php echo $row['idbidang'] ?>><?php echo $row['nama'] ?></option>
              <?php } ?>
              </select>
              <label>Bidang Pekerjaan</label>
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
            <div class="input-field col s6">
              <select name="idtingkat_pendidikan" id="idtingkat_pendidikan" required>
                <option value="" disabled selected>Pilih</option>
              <?php while($row = mysqli_fetch_array($tingkat_pendidikan_table)){ ?>
                <option value=<?php echo $row['idtingkat_pendidikan'] ?>><?php echo $row['keterangan'] ?></option>
              <?php } ?>
              </select>
              <label>Tingkat Pendidikan</label>
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="tipe">Tipe</label>
              <input id="tipe" name="tipe" type="text" value="<?php echo Input::get('tipe') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <label for="usia_min">Usia Min</label>
              <input id="usia_min" name="usia_min" type="number" class="validate" type="number"  min="0" max="80" value="<?php echo Input::get('usia_min') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
            <div class="input-field col s6">
              <label for="usia_max">Usia Maximum</label>
              <input id="usia_max" name="usia_max" type="number" class="validate" type="number"  min="0" max="80" value="<?php echo Input::get('usia_max') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col l6">
              <label for="gaji_min">Gaji Minimum</label>
              <input id="gaji_min" name="gaji_min" type="number" class="validate" type="number"  min="0" max="100000000" step="100000" value="<?php echo Input::get('gaji_min') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
            <div class="input-field col l6">
              <label for="gaji_max">Gaji Maksimum</label>
              <input id="gaji_max" name="gaji_max" type="number" class="validate" type="number"  min="0" max="100000000" step="100000" value="<?php echo Input::get('gaji_max') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <label for="nama_cp">Kontak Nama</label>
              <input id="nama_cp" name="nama_cp" type="text" value="<?php echo Input::get('nama_cp') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <label for="email_cp">Kontak Email</label>
              <input id="email_cp" name="email_cp" type="email" value="<?php echo Input::get('email_cp') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
            <div class="input-field col s6">
              <label for="no_telp_cp">Kontak Telepon</label>
              <input id="no_telp_cp" name="no_telp_cp" type="text"  value="<?php echo Input::get('no_telp_cp') ?>">
              <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <label for="tgl_expired">Tanggal Kadaluarsa</label>
                <input id="tgl_expired" name="tgl_expired" type="text" class="datepicker"  value="<?php echo Input::get('tgl_expired') ?>">
                <span class="helper-text main" data-error="" data-success=""></span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                <label for="deskripsi_loker">Deskripsi Lowongan</label>
                <textarea id="deskripsi_loker" name="deskripsi_loker" class="materialize-textarea"> <?php echo Input::get('email_cp') ?></textarea>
                <span class="helper-text main" data-error="" data-success=""></span>
            </div>
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
</main>
<!--.KONTEN  -->
<script>
  M.AutoInit();
  var error=<?php echo json_encode($errors);?>;
  $(document).ready(function(){
    var today = new Date();
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      minDate: today
    });
    $('select').formSelect();
    $('#formTambahLowongan').validate();
    setHelper(error);
  });
</script>
<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
