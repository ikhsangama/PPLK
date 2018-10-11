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


// Jika loker tidak ada di database


$bidang_pekerjaan_data = $bidang_pekerjaan->get_data($loker_data['idbidang']);
$tingkat_pendidikan_data = $tingkat_pendidikan->get_data($loker_data['idtingkat_pendidikan']);

$apply_loker_table = $apply_loker->get_table_applyloker_pencaker('idloker', Input::get('idloker'));
require_once "template/header.php";?>
<main>
<div class="row">
<div class="col l10 m12 s12 offset-l1">


  <div class="row">
      <div class="col l12 m12 s12">
        <div class="card-panel center-align">
          <h2>Nama Lowongan</h2>
          <h5>Nama Perusahaan</h5>
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a class="active" href="#test4">Detail Lowongan Kerja</a></li>
            <li class="tab"><a  href="#test5">Daftar Pelamar</a></li>
          </ul>
        </div>
      </div>
  </div>
  <div class="tab-content">
  <div id="test4">
  <div class="row">
    <div class="col l6">
      <div class="card-panel">
        <h3>Informasi Lowongan Pekerjaan</h3>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>
    <div class="col l6">
      <div class="card-panel">
        <h4>Informasi Perusahaan</h4>
        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="card-panel">
        <h4>Syarat & Benefit Pekerjaan</h4>
      </div>
    </div>
  </div>
</div>
<div id="test5">
<div class="row">
  <div class="col l12">
    <div class="card-panel">
      <h3>Foto Yang Daftar</h3>
      <div class="divider"></div>
      <div class="row">

    <div class="col l3">
      <div class="card">
        <div class="card-image">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>

    <div class="col l3">
      <div class="card">
        <div class="card-image">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>

    <div class="col l3">
      <div class="card">
        <div class="card-image">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>

    <div class="col l3">
      <div class="card">
        <div class="card-image">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
 </div>
</div>
</div>
</div>
</main>
<?php
require_once "template/footer.php";?>
