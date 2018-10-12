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

$apply_loker_data = $apply_loker->get_data(Input::get('idapply'));
// Jika tidak dapat data
if(!$apply_loker_data)
{
  Session::flash('peringatan', 'Data tidak ditemukan');
   // redirect ke halaman register
  // header("Location: masuk.php");
  Redirect::to('data_lowongan');
}
$pencaker_data = $pencaker->get_data($apply_loker_data['idpencaker']);
$loker_data = $loker->get_data($apply_loker_data['idloker']);

// Tidak dapat melihat detail profil lamaran loker perusahaan lain
// Hanya perusahaan yang membuat loker yang dapat mengubah status apply_loker pencaker
if($loker_data['idperusahaan']!=$perusahaan_data['idperusahaan'])
{
  Session::flash('peringatan', 'Otentifikasi perusahaan berbeda');

  Redirect::to('data_lowongan');
}

if(Input::get('status'))
{
  // die(Input::get('status'));
  if(Input::get('status')=="panggilan")
  {
    $status = "Panggilan Tes";
  } elseif (Input::get('status')=="terima")
  {
    $status = "Diterima";
  } else
  {
    $status = "Ditolak";
  }
  $apply_loker->update_apply_loker(array(
    'status' => $status,
  ),Input::get('idapply'));

  Session::flash('sukses', 'Status pencari kerja telah diperbarui');
  header('Location: detail_apply_loker.php?idapply='.$apply_loker_data['idapply']);
}

//Riwayat Pendidikan
$riwayatpendidikan = new RiwayatPendidikan();
$riwayatpendidikan_table = $riwayatpendidikan->get_table('idpencaker', $apply_loker_data['idpencaker']);
// Riwayat Pekerjaan
$riwayatpekerjaan = new RiwayatPekerjaan();
$riwayatpekerjaan_table = $riwayatpekerjaan->get_table('idpencaker', $apply_loker_data['idpencaker']);

// $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan')); dipindah ke init
require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<main>
<div class="container">
  <div class="card-panel">
    <h3>Detail Lamaran: <?php echo $pencaker_data['nama'] ?></h3>

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
    <div class="row">
      <!-- Status Loker -->
      <div class="col s4">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <h6>Loker</h6>
            <hr>
            <span class="card-title"><?php echo $loker_data['nama'] ?></span>
            <h6>Melamar pada: <?php echo $apply_loker_data['tgl_apply'] ?></h6>
            <blockquote>
              <?php echo $loker_data['deskripsi_loker'] ?>
            </blockquote>
          </div>
          <div class="card-action">
            <?php if ($apply_loker_data['status']=="Proses Seleksi"){ ?>
            <h6 class="white-text">Status: Proses Seleksi</h6>
            <hr>
            <p class="white-text">Lanjutkan Status:</p>
              <a href="detail_apply_loker.php?idapply=<?php echo $apply_loker_data['idapply'] ?>&status=panggilan">Panggilan Tes</a>
              <a href="detail_apply_loker.php?idapply=<?php echo $apply_loker_data['idapply'] ?>&status=tolak">Ditolak</a>
            <?php } elseif ($apply_loker_data['status']=="Panggilan Tes") {?>
            <h6 class="white-text">Status: Panggilan Tes</h6>
            <hr>
            <p class="white-text">Lanjutkan Status:</p>
              <a href="detail_apply_loker.php?idapply=<?php echo $apply_loker_data['idapply'] ?>&status=terima">Diterima</a>
              <a href="detail_apply_loker.php?idapply=<?php echo $apply_loker_data['idapply'] ?>&status=tolak">Ditolak</a>
            <?php } elseif ($apply_loker_data['status']=="Diterima") { ?>
              <h6 class="white-text">Status: Telah Diterima</h6>
            <?php } elseif ($apply_loker_data['status']=="Ditolak") { ?>
              <h6 class="white-text">Status: Telah Ditolak</h6>
              <hr class="red">
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- .Status Loker -->
      <!-- Detail Profil -->
      <div class="col s8">
        <ul class="collapsible popout">
          <li class="active">
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Biodata</div>
            <div class="collapsible-body">
              <img class="materialboxed" width="200" src="<?php echo $pencaker_data['foto'] ?>">
              <table>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['nama'] ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                  <td>Tempat, Tanggal Lahir</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['tempat_lahir'] ?>, <?php echo $pencaker_data['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['alamat'] ?></td>
                </tr>
                <tr>
                  <td>Kota</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['kota'] ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['email'] ?></td>
                </tr>
                <tr>
                  <td>No Telp</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['no_telp'] ?></td>
                </tr>
                <tr>
                  <td>Tanggal Daftar</td>
                  <td>:</td>
                  <td><?php echo $pencaker_data['tgl_daftar'] ?></td>
                </tr>
              </table>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Riwayat Pendidikan</div>
            <div class="collapsible-body">
              <?php while($row = mysqli_fetch_array($riwayatpendidikan_table)){ ?>
                <h5><?php echo $tingkat_pendidikan->get_data($row['idtingkat_pendidikan'])['keterangan'] ?>
                  <?php echo $row['jurusan'] ?></h5>
                <h6><?php echo $row['bln_masuk'] ?> <?php echo $row['thn_masuk'] ?> -
                  <?php echo $row['bln_lulus'] ?> <?php echo $row['thn_lulus'] ?></h6>
                <span>IPK <?php echo $row['grade'] ?></span>
              <div class="divider"></div>
            <?php } ?>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Riwayat Pekerjaan</div>
            <div class="collapsible-body">
              <?php while($row = mysqli_fetch_array($riwayatpekerjaan_table)){ ?>
                <h5><?php echo $bidang_pekerjaan->get_data($row['idbidang'])['nama'] ?> -
                  <?php echo $row['perusahaan'] ?></h5>
                <h6><?php echo $row['kota'] ?>, <?php echo $row['bln_masuk'] ?> <?php echo $row['thn_masuk'] ?> -
                  <?php echo $row['bln_lulus'] ?> <?php echo $row['thn_lulus'] ?></h6>
                <blockquote> <?php echo $row['deskripsi_pekerjaan'] ?></blockquote>
              <div class="divider"></div>
              <?php } ?>
            </div>
          </li>
        </ul>
      </div>
      <!-- .Detail Profil -->
    </div>
  </div>
</div>
</main>
<!--.KONTEN  -->

<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
