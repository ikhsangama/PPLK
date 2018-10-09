<?php

/** mengatur CRUD database secara langsung
 *
 */
class Database
{

  private static $connection = null;
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
  public static function getConnection(){
    if(!isset(self::$connection))
    {
      self::$connection = new Database();
    }
    return self::$connection;
  }

  public function insert($table, $values = array())
  {
    // Metode implode untuk menggabungkan semua array $kolom, lalu mengeluarkan semua $kolom dan $valuenya
    $kolom = implode(", ", array_keys($values));
    //.Metode implode untuk mengeluarkan semua $kolom dan $valuenya
    //mengambil semua values
    $valueArrays = array();
    $i = 0;
    foreach ($values as $key => $value) {
      if (is_int($value))
      {
        $valueArrays[$i] = $this->escape($value);
      }
      else
      {
        $valueArrays[$i] = "'". $this->escape($value)."'";
      }
      $i++;
    }
    //.mengambil semua valuearrays sebagai values yang dipisahkan dengan koma
    $value = implode (", ", $valueArrays);
    // $query = "INSERT INTO perusahaan (nama, password) VALUES ("ikhsan", 123)";
    $query = "INSERT INTO $table ($kolom) VALUES ($value)";
    // die($query); //mengecek kueri sebelum dieksekusi dan dimasukkan ke myskl
    return $this->run($query, "masalah saat memasukkan data");
  }

  public function update($table, $column, $id, $values)
  {
    //mengambil semua values
    $valueArrays = array();
    $i = 0;

    // UPDATE TABLE SET kunci1=nilai1, kunci2=nilai2...
    foreach ($values as $key => $value) {
      if (is_int($values))
      {
        $valueArrays[$i] = $key ."=". $this->escape($value);
      }
      else
      {
        $valueArrays[$i] = $key ."='". $this->escape($value)."'";
      }
      $i++;
    }
    //.mengambil semua values
    $values = implode (",", $valueArrays);
    // $query = "INSERT INTO perusahaan (nama, password) VALUES ("ikhsan", 123)";
    $query = "UPDATE $table SET $values WHERE $column = $id";
    // die($query); //mengecek kueri sebelum dieksekusi dan dimasukkan ke myskl
    return $this->run($query, "masalah saat memasukkan data");
  }

  // Mendapatkan info data yang dicari
  public function get_info ($table, $column, $value)
  {
    // Kalau bukan int diselipkan tanda kutip sebelum mnjalankan kuery
    if(!is_int($value))
    {
      $value = "'". $value ."'";
      // die($value);
      $query = "SELECT * FROM $table WHERE $column = $value";
      $result = $this->mysqli->query($query);

      while($row = $result->fetch_assoc())
      {
        return $row;
      }
    }
  }

  /** Menjalankan kuery
  */
  public function run($query, $msg)
  {
    if ($this->mysqli->query($query)) return true;
    else die($msg);
  }

/** ESCAPE INPUT untuk menghindari skl injection
*/
  public function escape($name)
  {
    return $this->mysqli->real_escape_string($name);
  }

  public function get_table($table, $column="")
  {
    if($column!="")
    {
      $query = "SELECT $column FROM $table";
    } else
    {
      $query = "SELECT * FROM $table";
    }
    // die($query);
    $result = $this->mysqli->query($query);
    return $result;
  }

  public function destroy($table, $column, $id)
  {
    $query = "DELETE FROM $table WHERE $column = $id";
    // die($query); //mengecek kueri sebelum dieksekusi dan dimasukkan ke myskl
    return $this->run($query, "masalah saat menghapus data");
  }

  public function get_table_leftjoin($lefttable, $righttable, $leftid, $rightid, $condcolumn, $condvalue)
  {
    // SELECT * FROM `apply_loker`
    // LEFT JOIN `pencaker`
    // ON apply_loker.idpencaker = pencaker.idpencaker
    // WHERE apply_loker.idloker=15

    $query = "SELECT * FROM $lefttable LEFT JOIN $righttable ON $lefttable.$leftid = $righttable.$rightid WHERE $lefttable.$condcolumn = $condvalue";
    // die($query);
    $result = $this->mysqli->query($query);
    return $result;
  }

}

 ?>
