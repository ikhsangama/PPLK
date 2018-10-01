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
}
?>
