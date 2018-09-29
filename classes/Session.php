<?php
class Session{

  public static function isAktif($nama){
    return (isset($_SESSION[$nama])) ? true : false ;
  }

  public static function setNamaSession($nama, $nilai)
  {
    return $_SESSION[$nama] = $nilai;
  }

  public static function getNamaSession($nama)
  {
    return $_SESSION[$nama];
  }
}
?>
