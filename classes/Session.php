<?php
class Session{

  public static function isAktif($email){
    return (isset($_SESSION[$email])) ? true : false ;
  }

  public static function setEmailSession($email, $nilai)
  {
    return $_SESSION[$email] = $nilai;
  }

  public static function getEmailSession($email)
  {
    return $_SESSION[$email];
  }

  public static function flash($nama, $pesan='')
  {
    if(self::isAktif($nama))
    {
      $session = self::getEmailSession($nama);
      self::delete($nama);
      return $session;
    }
    else
    {
      self::setEmailSession($nama, $pesan);
    }
  }

  public static function delete($nama)
  {
    if(self::isAktif($nama))
    {
      unset($_SESSION[$nama]);
    }
  }
}
?>
