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

if(Session::isOn('profil_baru'))
{
  echo Session::flash('profil_baru');
}

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<main>
  <div class="container">
    <div class="row">
      <div class="col l12 m12 s12 ">
        <div class="card-panel">
          <h3>Profil <?php echo $perusahaan_data['nama'] ?></h3>
          <div class="divider"></div>
          <div class="section">
            <table class="highlight">
              <tbody>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['nama'] ?></td>
                </tr>
                <tr>
                  <td>Nama Pemilik</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['nama_pemilik'] ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['alamat'] ?></td>
                </tr>
                <tr>
                  <td>Kota</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['kota'] ?><br>
                    <a href="https://www.google.com/maps/search/<?php echo $perusahaan_data['alamat'].'+'.$perusahaan_data['kota'];?>" target="_blank">lihat lokasi</a>
                  </td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['email'] ?></td>
                </tr>
                <tr>
                  <td>Nomor Telepon</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['no_telp'] ?></td>
                </tr>
                <tr>
                  <td>Tanggal Bergabung</td>
                  <td>:</td>
                  <td><?php echo $perusahaan_data['tgl_daftar'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <a href="edit_profil.php">
            <button class="btn waves-effect waves-light" type="submit" >
              Edit Profil
              <i class="material-icons right">send</i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
