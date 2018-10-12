<?php

/**
 *
 */
class RiwayatPendidikan
{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  public function get_table($where="", $id="")
  {
    $table = 'riwayat_pendidikan';
    return $this->_db->get_table($table, $where, $id);
  }

  public function get_data($id)
  {
    return $this->_db->get_info('riwayat_pendidikan','idriwayat_pendidikan', $id);
  }
}




 ?>
