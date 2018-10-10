<?php
/**
 *
 */
class ApplyLoker
{

  function __construct()
  {
    $this->_db = Database::getConnection(); //melakukan koneksi ke database
  }

  // Hanya mendapatkan tabel pencaker yang sesuai dengan loker
  public function get_table_applyloker_pencaker($condcolumn, $condvalue)
  {
    $lefttable = 'apply_loker';
    $righttable = 'pencaker';
    $leftid = 'idpencaker';
    $rightid = 'idpencaker';
    // die($idperusahaan);
    return $this->_db->get_table_leftjoin($lefttable, $righttable, $leftid, $rightid, $condcolumn, $condvalue);
  }

  public function get_data($id)
  {
    return $this->_db->get_info('apply_loker','idapply', $id);
  }

  public function update_apply_loker($values = array(), $id)
  {
    if($this->_db->update('apply_loker', 'idapply', $id, $values)) return true;
    else return false;
  }


}

 ?>
