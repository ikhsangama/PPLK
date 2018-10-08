<?php

/**
 *
 */
class BidangPekerjaan
{

  private $_db;

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  public function get_table($column="")
  {
    $table = 'bidang_pekerjaan';
    return $this->_db->get_table($table, $column);
  }

  public function get_data($id)
  {
    return $this->_db->get_info('bidang_pekerjaan','idbidang', $id);
  }
}




 ?>
