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
  public function get_table($column="")
  {
    // die($idperusahaan);
    return $this->_db->get_table('loker', $column);
  }

  public function get_data($id)
  {
    return $this->_db->get_info('loker','idloker', $id);
  }

  public function update_loker($values = array(), $id)
  {
    if($this->_db->update('loker', 'idloker', $id, $values)) return true;
    else return false;
  }

  public function hapus_loker($id)
  {
    if($this->_db->destroy('loker', 'idloker', $id)) return true;
    else return false;
  }

}




 ?>
