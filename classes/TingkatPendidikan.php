<?php

/**
 *
 */
class TingkatPendidikan
{

  private $_db;


  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  public function get_table($column="")
  {
    return $this->_db->get_table('tingkat_pendidikan', $column);
  }
}




 ?>
