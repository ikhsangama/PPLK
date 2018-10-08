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

  public function create_loker($values = array())
  {
    if($this->_db->insert('loker', $values)) return true;
    else return false;
  }

  // Hanya mendapatkan tabel loker yang sesuai dengan perusahaannya
  public function get_table($idperusahaan)
  {
    $table = "loker";
    // die($idperusahaan);
    return $this->_db->get_table_loker($table, $idperusahaan);
  }

}




 ?>
