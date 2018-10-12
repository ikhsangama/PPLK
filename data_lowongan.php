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
<main>
<div class="container">
  <div class="card-panel">
    <div class="row">
      <div class="col l7">
        <h3>Data Lowongan</h3>
      </div>
      <div class="col l5">
        <div class=" right-align" style="padding-bottom:15px">
          <a class="waves-effect waves-light btn-small blue" href="tambah_data_lowongan.php">
            <i class="material-icons left">
              add
            </i>
            Tambah
          </a>
        </div>
        <div class="right-align">
          <div class="switch rigth-align">
            <label>
              Off
              <input id="filter" type="checkbox">
              <span class="lever"></span>
              On
            </label>
            <div class="">
              <label>Tampilkan Seluruh Lowongan</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Switch -->

    <!-- NOTIFIKASI -->

    <?php if(Session::isOn('sukses'))
    {
      echo Session::flash('sukses');
    } elseif (Session::isOn('peringatan'))
    {
      echo Session::flash('peringatan');
    }
    ?>
    <div class="divider"></div>
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
        <tr class="<?php echo ($row['idperusahaan'] == $perusahaan_data['idperusahaan'] ? 'mine' : 'not');?>">
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
              <!-- DELETE MODAL TRIGGER -->
              <a class="btn-floating btn-small red tooltipped modal-trigger" data-tooltip="hapus" href="#modal<?php echo $row['idloker'] ?>">
                <i class="material-icons left">delete</i>
              </a>
              <!-- DELETE MODAL STRUCTURE -->
              <div id="modal<?php echo $row['idloker'] ?>" class="modal red lighten-5">
                <div class="modal-content">
                  <h5>Hapus Data Lowongan Kerja?</h5>
                  <hr>
                  <p>Lowongan kerja <b><?php echo $row['nama'] ?></b> akan dihapus</p>
                  <p>Tidak dapat mengembalikan lowongan kerja yang telah dihapus</p>
                </div>
                <div class="modal-footer">
                  <a href="hapus_data_lowongan.php?idloker=<?php echo $row['idloker'] ?>" class="modal-close waves-effect waves-green btn-flat">Setuju</a>
                  <a href="#!" class="modal-close waves-effect waves-red btn-flat">Batal</a>
                </div>
              </div>
              <!-- .DELETE -->
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
<script type="text/javascript">
$(document).ready(function(){
  $('tr.not').hide();
  $('#filter').click(function() {
    $("tr.not").toggle(this.checked);
  });
});

</script>
</main>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
