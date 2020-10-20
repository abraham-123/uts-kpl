<?php

// Koneksi
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "pkl_donatur";

$mysqli = new mysqli($host, $user, $pass, $dbnm);
if ($mysqli->connect_errno) {

  echo "Koneksi Gagal !". $mysqli->connect_errno;

} else {

  // echo "Berhasil Konek !";

}

 ?>
