<?php
class Session{

  public static function isOn($nama){
    return (isset($_SESSION[$nama])) ? true : false ;
  }

  public static function setSession($nama, $nilai)
  {
    return $_SESSION[$nama] = $nilai;
  }

  public static function getSession($nama)
  {
    return $_SESSION[$nama];
  }

  public static function flash($nama, $pesan='')
  {
    if(self::isOn($nama))
    {
      $session = self::getSession($nama);
      self::delete($nama);
      return $session;
    }
    else
    {
      self::setSession($nama, $pesan);
    }
  }

  public static function delete($nama)
  {
    if(self::isOn($nama))
    {
      unset($_SESSION[$nama]);
    }
  }
}
?>
