<?php
/**
 *
 */
class Loker
{

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  // Hanya mendapatkan tabel pencaker yang sesuai dengan loker
  public function get_table_cond($idperusahaan)
  {
    $table = "loker";
    // die($idperusahaan);
    return $this->_db->get_table_cond($table, $idperusahaan);
  }

}

 ?>
