<?php

/**
 *
 */
class Perusahaan
{
  private $_db;

  function __construct()
  {
    // code...
    $this->_db = Database::getInstance(); //melakukan koneksi ke database
  }

  /**
  *gak langsung dimasukkan ke database di Perusahaan.php
  *dioper 1x lagi ke kelas Database.php
  *semua yang berhubungan langsung dgn database akan ditanggung jawab oleh metode2 dari kelas Databasenya
  */
  public function register_perusahaan($values = array())
  {
    if($this->_db->insert('perusahaan', $values))return true;
    else return false;
  }
}


 ?>
