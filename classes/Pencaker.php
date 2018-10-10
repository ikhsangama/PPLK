<?php
/**
 *
 */
class Pencaker
{

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  // Hanya mendapatkan tabel pencaker yang sesuai dengan loker
  // public function get_table()
  // {
  //   $table = "pencaker";
  //   // die($idperusahaan);
  //   return $this->_db->get_table($table);
  // }

  public function get_data($id)
  {
    return $this->_db->get_info('pencaker','idpencaker', $id);
  }

}

 ?>
