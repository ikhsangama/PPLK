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

if(Input::get('submit'))
{
  // 1. Memanggil obj validasi
  $validation = new Validation();

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
}

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<div class="container">
  <h3>Form</h3>
  <h4>Tambah Data Lowongan</h4>
  <hr><hr><br>

  <div class="row container">
    <form class="col s12" action="tambah_data_lowongan.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input disabled id="nama_perusahaan" type="text" class="validate" value=<?php echo $perusahaan_data['nama'] ?>>
          <label for="nama_perusahaan">Nama Perusahaan</label>
        </div>

        <div class="input-field col s12">
          <input id="nama_lowongan"  class="validate" type="text" name="nama_lowongan">
          <label for="nama_lowongan">Nama Lowongan</label>
        </div>

        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Pilih</option>
          <?php while($row = mysqli_fetch_array($bidang_pekerjaan_table)){ ?>
            <option value="<?php echo $row['idbidang'] ?>"><?php echo $row['nama'] ?></option>
          <?php } ?>
          </select>
          <label>Bidang Pekerjaan</label>
        </div>

        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Pilih</option>
          <?php while($row = mysqli_fetch_array($tingkat_pendidikan_table)){ ?>
            <option value="<?php echo $row['idtingkat_pendidikan'] ?>">
              <?php echo $row['keterangan'] ?>
            </option>
          <?php } ?>
          </select>
          <label>Tingkat Pendidikan</label>
        </div>

        <div class="input-field col s12">
          <input id="tipe"  class="validate" type="text" name="tipe">
          <label for="tipe">Tipe</label>
        </div>

        <div class="input-field col s6">
          <input id="usia_min"  class="validate" type="number" name="usia_min" min="0" max="80">
          <label for="usia_min">Usia Min</label>
        </div>

        <div class="input-field col s6">
          <input id="usia_max"  class="validate" type="number" name="usia_max" min="0" max="80">
          <label for="usia_max">Usia Max</label>
        </div>

        <div class="input-field col s6">
          <input id="gaji_min"  class="validate" type="number" name="gaji_min" min="0" max="10000000" step="100000">
          <label for="gaji_min">Gaji Min</label>
        </div>

        <div class="input-field col s6">
          <input id="gaji_max"  class="validate" type="number" name="gaji_max" min="0" max="10000000" step="100000">
          <label for="gaji_max">Gaji Max</label>
        </div>

        <div class="input-field col s12">
          <input id="nama_cp"  class="validate" type="text" name="nama_cp">
          <label for="nama_cp">Kontak Nama</label>
        </div>

        <div class="input-field col s6">
          <input id="email_cp"  class="validate" type="email" name="email_cp">
          <label for="email_cp">Kontak Email</label>
        </div>

        <div class="input-field col s6">
          <input id="no_telp_cp"  class="validate" type="text" name="no_telp_cp">
          <label for="no_telp_cp">Kontak Telp</label>
        </div>

        <div class="input-field col s6">
          <input id="tgl_expired"  class="datepicker" type="text" name="tgl_expired">
          <label for="tgl_expired">Akhir Lowongan</label>
        </div>

        <div class="input-field col s12">
          <textarea id="deskripsi_loker" class="materialize-textarea"></textarea>
          <label for="deskripsi_loker">Deskripsi Lowongan</label>
        </div>

      </div>
      <br>
      <button class="btn waves-effect waves-light" type="submit" name="action"> Tambah Lowongan Kerja
        <i class="material-icons right">send</i>
      </button>
      <hr>
    </form>
  </div>

</div>

<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
