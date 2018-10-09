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

$loker_data = $loker->get_data(Input::get('idloker'));
// Jika loker tidak ada di database
if(!$loker_data)
{
  Session::flash('peringatan', "Detail data lowongan ". Input::get('idloker'). " tidak ditemukan");

  Redirect::to('data_lowongan');
}

$bidang_pekerjaan_data = $bidang_pekerjaan->get_data($loker_data['idbidang']);
$tingkat_pendidikan_data = $tingkat_pendidikan->get_data($loker_data['idtingkat_pendidikan']);
// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<div class="container">
  <div class="card-panel">
    <h3>Detail Data Lowongan
      <?php if($loker_data['idperusahaan']==$perusahaan_data['idperusahaan']){ ?>
      <a class="waves-effect waves-light btn-small green" href="edit_data_lowongan.php?idloker=<?php echo $loker_data['idloker'] ?>">
        <i class="material-icons left">
          edit
        </i>
        Edit
      </a>

      <a class="waves-effect waves-light btn-small red" href="hapus_data_lowongan.php?idloker=<?php echo $loker_data['idloker'] ?>">
        <i class="material-icons left">
          clear
        </i>
        Hapus
      </a>
      <?php } ?>
    </h3>

    <hr>
        <!-- NOTIFIKASI -->
        <?php if(Session::isOn('detail_data_lowongan'))
        {
          echo Session::flash('detail_data_lowongan');
        }
        ?>
        <!-- .NOTIFIKASI -->

    <hr><br>

    <div class="row">
      <!-- DETAIL PERUSAHAAN -->
      <div class="col s4">
        <h4><?php echo $perusahaan_data['nama'] ?></h4>
        <table class="table-responsive">
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
            <td><?php echo $perusahaan_data['kota'] ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $perusahaan_data['email'] ?></td>
          </tr>
          <tr>
            <td>No Telp</td>
            <td>:</td>
            <td><?php echo $perusahaan_data['no_telp'] ?></td>
          </tr>
          <tr>
            <td>Tanggal Bergabung</td>
            <td>:</td>
            <td><?php echo $perusahaan_data['tgl_daftar'] ?></td>
          </tr>
        </table>
      </div>
      <!-- .DETAIL PERUSAHAAN -->

      <!-- DETAIL LOWONGAN -->
      <div class="card-panel col s8">

        <h4><?php echo $loker_data['nama'] ?></h4>
        <hr>
        <table class="table-responsive">
          <tr>
            <td><b>Bidang</b></td>
            <td><b>:</b></td>
            <td><?php echo $bidang_pekerjaan_data['nama'] ?></td>
          </tr>
          <tr>
            <td><b>Tingkat Pendidikan</b></td>
            <td><b>:</b></td>
            <td><?php echo $tingkat_pendidikan_data['keterangan'] ?></td>
          </tr>
          <tr>
            <td><b>Tipe</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['tipe'] ?></td>
          </tr>
          <tr>
            <td><b>Range Usia</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['usia_min'] ?> s/d <?php echo $loker_data['usia_max'] ?> tahun</td>
          </tr>
          <tr>
            <td><b>Range Gaji</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['gaji_min'] ?> s/d <?php echo $loker_data['gaji_max'] ?> IDR</td>
          </tr>
          <tr>
            <td><b>Kontak Nama</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['nama_cp'] ?></td>
          </tr>
          <tr>
            <td><b>Kontak Email</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['email_cp'] ?></td>
          </tr>
          <tr>
            <td><b>Kontak Telp</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['no_telp_cp'] ?></td>
          </tr>
          <tr>
            <td><b>Tanggal Dibuat</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['tgl_insert'] ?></td>
          </tr>
          <tr>
            <td><b>Tanggal Diperbarui</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['tgl_update'] ?></td>
          </tr>
          <tr>
            <td><b>Tanggal Berakhir</b></td>
            <td><b>:</b></td>
            <td><?php echo $loker_data['tgl_expired'] ?></td>
          </tr>
        </table>

        <h5 class="red-text">Deskripsi</h5>
        <blockquote>
          <?php echo $loker_data['deskripsi_loker'] ?>
        </blockquote>
      </div>
      <!-- .DETAIL LOWONGAN -->
    </div>
  </div>
</div>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
