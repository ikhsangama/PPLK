<?php

/**
 *
 */
class Database
{

  private static $INSTANCE = null;
  private $mysqli,
          $HOST = 'localhost',
          $USER = 'root',
          $PASSWORD = '',
          $DBNAME = 'pbp_pplk';

  function __construct()
  {
    $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASSWORD, $this->DBNAME);
    if(mysqli_connect_error()){
      die('gagal koneksi: '. mysqli_connect_error());
    }
  }

  // singleton patter, menguji koneksi agar tidak berulang kali
  public static function getInstance(){
    if(!isset(self::$INSTANCE))
    {
      self::$INSTANCE = new Database();
    }
    return self::$INSTANCE;
  }

  public function insert($table, $values = array())
  {
    // Metode implode untuk menggabungkan semua array $kolom, lalu mengeluarkan semua $kolom dan $valuenya
    $kolom = implode(",", array_keys($values));
    //.Metode implode untuk mengeluarkan semua $kolom dan $valuenya

    //mengambil semua values
    $valueArrays = array();
    $i = 0;
    foreach ($values as $key => $value) {
      if (is_int($values))
      {
        $valueArrays[$i] = $value;
      }
      else
      {
        $valueArrays[$i] = "'". $value."'";
      }
      $i++;
    }
    //.mengambil semua values
    $value = implode (",", $valueArrays);

    $query = "INSERT INTO $table ($kolom) VALUES ($value)";

    // die($query); //mengecek kueri sebelum dieksekusi dan dimasukkan ke myskl

    if ($this->mysqli->query($query)) return true;
    else return false;
  }



}

// // cek nilai object db
// $db = Database::getInstance();
// var_dump($db);
 ?>
