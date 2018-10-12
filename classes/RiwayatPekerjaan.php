<?php

/**
 *
 */
class RiwayatPekerjaan
{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  public function get_table($where="", $id="")
  {
    $table = 'riwayat_pekerjaan';
    return $this->_db->get_table($table, $where, $id);
  }

  public function get_data($id)
  {
    return $this->_db->get_info('riwayat_pekerjaan','idriwayat_pekerjaan', $id);
  }
}




 ?>
