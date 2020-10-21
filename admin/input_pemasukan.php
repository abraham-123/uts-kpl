<?php include_once '../template/head.php' ?>
 
<?php include_once '../template/input_pemasukan.php'; ?>

<?php
 
if (isset($_POST['tambah'])) {
  $tgl = $_POST['tanggal']; 
  $nom = $_POST['nominal'];
  $ket = $_POST['keterangan'];
  $idjenis = 12345;

  $sqlmasuk   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
  $querymasuk = $mysqli->query($sqlmasuk);
  $rowmasuk = $querymasuk->fetch_array(MYSQLI_ASSOC);
  $sqlkeluar   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
  $querykeluar = $mysqli->query($sqlkeluar);
  $rowkeluar   = $querykeluar->fetch_array(MYSQLI_ASSOC);
  $saldo = $rowmasuk['total_biaya']-$rowkeluar['total_biaya'];
  $saldoakhir = $saldo+$nom;

  $sql     = "SELECT * FROM dta_pemasukan WHERE id_pemasukan = '$idp'";
  $validasi = $mysqli->query($sql);

  $sql2    = "SELECT id_pemasukan FROM dta_pemasukan";
  $data = $mysqli->query($sql2);
  $adadata = $data->fetch_array(MYSQLI_ASSOC);

  if ($nom < 0) {
    echo "<script>
            window.alert('Nominal yang anda masukan salah!');
            window.location=(href='input_pemasukan.php')
          </script>";
  } else if ($adadata) {
    $query  = "INSERT INTO dta_pemasukan (id_jenis, tanggal, nominal, keterangan, saldo_akhir) VALUES ('$idjenis', '$tgl', '$nom', '$ket', '$saldoakhir')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_pemasukan.php?&simpan')
          </script>";
    
  } else {
    $query  = "INSERT INTO dta_pemasukan (id_pemasukan, id_jenis, tanggal, nominal, keterangan, saldo_akhir) VALUES ('10001', '$idjenis', '$tgl', '$nom', '$ket', '$saldoakhir')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_pemasukan.php?&simpan')
          </script>";
  }
  

}

 ?>

 <!-- untuk bagian foot -->
 <?php include_once '../template/foot.php'; ?> 
