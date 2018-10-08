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

}




 ?>
