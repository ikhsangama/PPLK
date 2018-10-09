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
  <div class="card-panel">
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
    <?php if(Session::isOn('sukses'))
    {
      echo Session::flash('sukses');
    } elseif (Session::isOn('peringatan'))
    {
      echo Session::flash('peringatan');
    }
    ?>
    <hr><br>
  <!-- .NOTIFIKASI -->

    <table class="responsive-table striped">
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
            <a class="btn-floating btn-small tooltipped" data-tooltip="detail" href="detail_data_lowongan.php?idloker=<?php echo $row['idloker'] ?>"><i class="material-icons left">visibility</i>
            </a>
            <?php if($row['idperusahaan'] == $perusahaan_data['idperusahaan']){?>
              <a class="btn-floating btn-small green tooltipped" data-tooltip="edit" href="edit_data_lowongan.php?idloker=<?php echo $row['idloker'] ?>">
                <i class="material-icons left">edit</i>
              </a>
              <a class="btn-floating btn-small red tooltipped" data-tooltip="hapus" href="hapus_data_lowongan.php?idloker=<?php echo $row['idloker'] ?>">
                <i class="material-icons left">delete</i>
              </a>
            <?php }else { ?>
              <a class="btn-floating btn-small green tooltipped disabled">
                <i class="material-icons left">edit</i>
              </a>
              <a class="btn-floating btn-small red tooltipped disabled">
                <i class="material-icons left">delete</i>
              </a>
            <?php } ?>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
</div>

<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
