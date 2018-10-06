<?php
session_start();

// metode untuk load classes
spl_autoload_register(function($class){
  require_once 'classes/'.$class.'.php';
});

$perusahaan = new Perusahaan();
if(Session::isOn('perusahaan'))
{
 $perusahaan_data = $perusahaan->get_data(Session::getSession('perusahaan'));
}
?>
