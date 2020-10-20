<?php 
include_once ('../db/koneksi.php');
 
if (isset($_POST['update'])) {
  $kodep = $_POST['kodep'];
  $tgl = $_POST['tanggal'];
  $nom = $_POST['nominal'];
  $ket = $_POST['keterangan'];
  $idj = 12345;


  $sql   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
  $query = $mysqli->query($sql);
  $row   = $query->fetch_array(MYSQLI_ASSOC);
  $totalmasuk = $row['total_biaya'];

  $sql2   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
  $query2 = $mysqli->query($sql2);
  $row2   = $query2->fetch_array(MYSQLI_ASSOC);
  $totalkeluar = $row2['total_biaya'];

  $sql3   = "SELECT * FROM dta_pengeluaran WHERE id_pengeluaran = '$kodep'";
  $query3 = $mysqli->query($sql3);
  $row3   = $query3->fetch_array(MYSQLI_ASSOC);
  $nominalsebelum = $row3['nominal'];

  $syarat = $totalmasuk-($totalkeluar-$nominalsebelum+$nom);
  
  if ($syarat < 0) {
    echo "<script>
           # window.alert('Saldo tidak mencukupi, ulangi kembali masukan anda');
           # window.location=(href='dt_pengeluaran.php')
          #</script>";
  } else {
    $query  = "UPDATE dta_pengeluaran SET nominal = '$nom', keterangan = '$ket' WHERE id_pengeluaran = '$kodep'";
    $update = $mysqli->query($query);
    echo "<script>
              window.location=(href='dt_pengeluaran.php?&update')
          </script>";
  }
}

?>
