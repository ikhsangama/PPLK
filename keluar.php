<?php
require_once 'core/init.php';

session_destroy();

// header("Location: masuk.php")
Redirect::to("masuk");

 ?>
