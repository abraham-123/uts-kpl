<?php

include_once ('../db/koneksi.php');

$kdp = $_GET['id_pengeluaran'];
$sql   = "DELETE FROM dta_pengeluaran WHERE id_pengeluaran = '$kdp'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'dt_pengeluaran.php?&hapus');
}

 ?>