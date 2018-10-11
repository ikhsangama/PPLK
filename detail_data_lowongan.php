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

$apply_loker_table = $apply_loker->get_table_applyloker_pencaker('idloker', Input::get('idloker'));
// while($row = mysqli_fetch_array($apply_loker_table))
// {
//   printf($row['nama']);
// }

require_once "template/header.php"
?>

<!--.HEADER  -->

<!--KONTEN  -->
<main>
<div class="row">
  <div class="col l10 m12 s12 offset-l1">
    <!-- Nama Lowongan-->

    <div class="row">
      <div class="card-panel z-depth-0">
        <!-- Operasi Owner-->
        <div class="right-align">
          <?php if ($loker_data['idperusahaan']==$perusahaan_data['idperusahaan']) {?>
            <a class='dropdown-trigger btn right-align' href='#' data-target='dropdownLowongan'><i class="material-icons left">build</i>
              Operasi
            </a>
            <ul id='dropdownLowongan' class='dropdown-content'>
              <li><a href='edit_data_lowongan.php?idloker=<?php echo $loker_data['idloker'] ?>'><i class="material-icons left">edit</i>
                Edit</a>
              </li>
              <li class="divider" tabindex="-1"></li>
              <li><a href='edit_data_lowongan.php?idloker=<?php echo $loker_data['idloker'] ?>'><i class="material-icons left">clear</i>
              Hapus</a></li>
            </ul>
          <?php } ?>
        </div>
        <!-- .Operasi Owner-->
        <div class="center-align">
          <h2><?php echo $loker_data['nama']; ?></h2>
          <h5><?php echo $perusahaan_data['nama']; ?>?variable?</h5>
        </div>
        <ul class="tabs tabs-fixed-width">
          <li class="tab"><a class="active" href="#lowo">Detail Lowongan Kerja</a></li>
          <li class="tab"><a  href="#penca">Daftar Pelamar</a></li>
        </ul>
      </div>
    </div>
    <!-- .Nama Lowongan-->
    <!-- Konten -->
    <div class="row">
      <div class="tab-content">
        <!-- Tab Lowongan -->
        <div class="" id="lowo">
          <div class="row">
            <div class="col l6 s12">
              <div class="card-panel z-depth-1 hoverable">
                <h4>Deskripsi Lowongan</h4>
                <div class="divider"></div>
                <div class="section">
                  <?php echo $loker_data['deskripsi_loker'] ?>
                </div>
              </div>
            </div>
            <div class="col l6 s12">
              <div class="card-panel">
                <h4>Informasi Perusahaan</h4>
                <div class="divider"></div>
                <div class="section">
                  <table>
                    <tr>
                      <td>Nama Perusahaan : </td>
                      <td><?php echo $perusahaan_data['nama'];?>?variable?</td>
                    </tr>
                    <tr>
                      <td>Kontak Nama : </td>
                      <td><?php echo $loker_data['nama_cp']; ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Telepon : </td>
                      <td><?php echo $loker_data['no_telp_cp'];?></td>
                    </tr>
                    <tr>
                      <td>Email : </td>
                      <td><?php echo $loker_data['email_cp']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat : </td>
                      <td><?php echo $perusahaan_data['alamat'];?>?variable?<br>
                          <?php echo $perusahaan_data['kota'];?>?variable?<br>
                          <a href="https://www.google.com/maps/search/<?php echo $perusahaan_data['alamat'].'+'.$perusahaan_data['kota'];?>" target="_blank">lihat lokasi</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Bergabung : </td>
                      <td><?php echo $perusahaan_data['tgl_daftar']?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card-panel">
                <h4>Syarat dan Benefit</h4>
                <div class="divider"></div>
                <div class="section">
                  <table>
                    <tr>
                      <td>Bidang : </td>
                      <td><?php echo $bidang_pekerjaan_data['nama'];?></td>
                    </tr>
                    <tr>
                      <td>Pendidikan : </td>
                      <td><?php echo $tingkat_pendidikan_data['keterangan']?></td>
                    </tr>
                    <tr>
                      <td>Tipe : </td>
                      <td><?php echo $loker_data['tipe'];?></td>
                    </tr>
                    <tr>
                      <td>Usia :</td>
                      <td><?php echo $loker_data['usia_min'].' - '.$loker_data['usia_max'];?> Tahun</td>
                    </tr>
                    <tr>
                      <td>Gaji : </td>
                      <td><?php echo $loker_data['gaji_min'].'-'.$loker_data['gaji_max'];?> IDR</td>
                    </tr>
                    <tr>
                      <td>Tanggal Dibuat</td>
                      <td><?php echo $loker_data['tgl_insert']?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Diperbaharui</td>
                      <td><?php echo $loker_data['tgl_update']?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Berakhir</td>
                      <td><?php echo $loker_data['tgl_expired']?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- .Tab Lowongan -->
        <!-- Tab Pelamar -->
        <div class="" id="penca">
          <div class="row">
            <div class="col l12 s12">
              <div class="card-panel">
                <h4>Daftar Pelamar</h4>
                <div class="divider"></div>
                <div class="section">
                  <div class="row">
                    <?php while($row = mysqli_fetch_array($apply_loker_table)){ ?>
                    <div class="col s4">
                      <!-- CARD PENCAKER -->
                      <div class="card sticky-action medium">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="<?php echo $row['foto'] ?>">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><?php echo $row['nama'] ?><i class="material-icons right">more_vert</i></span>
                          <p>
                            <?php if($row['status']=="Proses Seleksi"){?>
                              <span class="new badge" data-badge-caption="Proses Seleksi"></span>
                            <?php } elseif ($row['status']=="Diterima") {?>
                              <span class="new badge blue" data-badge-caption="Diterima"></span>
                            <?php } else {?>
                              <span class="new badge red" data-badge-caption="Ditolak"></span>
                            <?php } ?>
                          </p>
                          <!-- .badge -->
                          <p>Apply: <?php echo $row['tgl_apply'] ?></p>
                          <a href="detail_apply_loker.php?idapply=<?php echo $row['idapply'] ?>">Detail Profil Lamaran</a>
                          <!-- badge -->
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><?php echo $row['nama'] ?><i class="material-icons right">close</i></span>
                          <p><?php echo $row['bidang_pekerjaan'] ?>, <?php echo $row['jenis_kelamin'] ?></p>
                          <p><?php echo $row['tempat_lahir'] ?>, <?php echo $row['tanggal_lahir'] ?></p>
                          <p><?php echo $row['email'] ?></p>
                          <p><?php echo $row['no_telp'] ?></p>
                          <p><?php echo $row['alamat'] ?></p>
                        </div>
                      </div>
                      <!-- .CARD PENCAKER -->
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Tab Pelamar -->
      </div>
    </div>
    <!-- .Konten -->
  </div>
</div>
</main>
<!-- NOTIFIKASI -->
<?php if(Session::isOn('sukses'))
{
  echo Session::flash('sukses');
}
?>
<!-- .NOTIFIKASI -->

<!-- VERSI LAMA -->


<!--FOOTER  -->
<?php require_once "template/footer.php"; ?>
<!--.FOOTER  -->
