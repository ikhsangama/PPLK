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

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<div class="container">
  <h3>Data Lowongan
    <a class="waves-effect waves-light btn-small blue" href="tambah_data_lowongan.php">
      <i class="material-icons left">
        add
      </i>
      Tambah
    </a>
  </h3>

  <!-- NOTIFIKASI -->
  <hr>
  <?php if(Session::isOn('data_lowongan_baru'))
  {
    echo Session::flash('data_lowongan_baru');
  } elseif (Session::isOn('peringatan'))
  {
    echo Session::flash('peringatan');
  }
  ?>
  <hr><br>
<!-- .NOTIFIKASI -->

  <table class="responsive-table">
    <thead>
      <tr>
          <th>Nama Lowongan</th>
          <th>Dibuat</th>
          <th>Diperbarui</th>
          <th>Batas Akhir</th>
          <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php while($row = mysqli_fetch_array($loker_table)){ ?>
      <tr>
        <td>
          <?php echo $row['nama'] ?>
        </td>
        <td>
          <?php echo $row['tgl_insert'] ?>
        </td>
        <td>
          <?php echo $row['tgl_update'] ?>
        </td>
        <td>
          <?php echo $row['tgl_expired'] ?>
        </td>
        <td>
          <a class="waves-effect waves-light btn-small green" href="detail_data_lowongan.php?idloker=<?php echo $row['idloker'] ?>">
            <i class="material-icons left">
              visibility
            </i>
            Detail
          </a>
        </td>
      </tr>
      <?php } ?>

    </tbody>
  </table>

</div>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
