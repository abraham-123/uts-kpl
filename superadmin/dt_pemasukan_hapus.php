<?php

include_once ('../db/koneksi.php');

$kdp = $_GET['id_pemasukan'];
$sql   = "DELETE FROM dta_pemasukan WHERE id_pemasukan = '$kdp'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'dt_pemasukan.php?&hapus');
}

 ?>