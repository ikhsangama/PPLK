<div class="container">

  <div class="card-panel">

    <div class="row">
      <ul id="tabs-swipe-demo" class="tabs">
        <li class="tab col s6"><a class="active blue-text" href="#test-swipe-2">Detail Lowongan Kerja</a></li>
        <li class="tab col s6"><a class="green-text" href="#test-swipe-3">Daftar Pelamar Kerja</a></li>
      </ul>
      <!-- Tab Detail Lowongan Kerja -->
      <div id="test-swipe-2" class="col s12">
        <!-- DETAIL LOWONGAN -->
        <div class="row">
          <div class="col s12">
            <h4><?php echo $loker_data['nama'] ?>
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
            </h4>
            <hr>
              <!-- NOTIFIKASI -->
              <?php if(Session::isOn('sukses'))
              {
                echo Session::flash('sukses');
              }
              ?>
              <!-- .NOTIFIKASI -->
            <hr><br>

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
        </div>
        <!-- .DETAIL LOWONGAN -->
      </div>
      <!-- .Tab Detail Lowongan Kerja -->

      <!-- Tab Daftar Pelamar Kerja -->
      <div id="test-swipe-3" class="col s12">
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
      <!-- .Tab Daftar Pelamar Kerja -->
    </div>


  </div>
</div>
<!--.KONTEN  -->
