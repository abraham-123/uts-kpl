<?php 
session_start();
session_unset();
session_destroy();
header("location: ../halaman2/index.php");

 ?>
