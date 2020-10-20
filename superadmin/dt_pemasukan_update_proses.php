<?php
// untuk koneksi
include_once ('../db/koneksi.php');

// untuk proses input
if (isset($_POST['update'])) {
  $kodep = $_POST['kodep'];
  $tgl = $_POST['tanggal'];
  $nom = $_POST['nominal'];
  $ket = $_POST['keterangan'];
  $idj = 12345;

  $query  = "UPDATE dta_pemasukan SET nominal = '$nom', keterangan = '$ket' WHERE id_pemasukan = '$kodep'";
  $update = $mysqli->query($query);
  echo "<script>
            window.location=(href='dt_pemasukan.php?&update')
        </script>";

 
}

?>
