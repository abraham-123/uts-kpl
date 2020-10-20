<?php

include_once ('../db/koneksi.php');

$kduser = $_GET['id_user'];
$sql   = "DELETE FROM dta_user WHERE id_user = '$kduser'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'dt_user.php?&hapus');
}

 ?>