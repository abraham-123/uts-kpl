<?php include_once '../template/head.php' ?>
 
<?php include_once '../template/input_pengeluaran.php'; ?>

<?php
 
if (isset($_POST['tambah'])) {
  $tgl = $_POST['tanggal'];
  $nom = $_POST['nominal'];
  $ket = $_POST['keterangan'];
  $idjenis = 12346;

  $sqlmasuk   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
  $querymasuk = $mysqli->query($sqlmasuk);
  $rowmasuk = $querymasuk->fetch_array(MYSQLI_ASSOC);
  $sqlkeluar   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
  $querykeluar = $mysqli->query($sqlkeluar);
  $rowkeluar   = $querykeluar->fetch_array(MYSQLI_ASSOC);
  $saldo = $rowmasuk['total_biaya']-$rowkeluar['total_biaya'];
  $saldoakhir = $saldo-$nom;

  $qmasuk   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
  $query = $mysqli->query($qmasuk);
  $row   = $query->fetch_array(MYSQLI_ASSOC);

  $qkeluar   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
  $query2 = $mysqli->query($qkeluar);
  $row2   = $query2->fetch_array(MYSQLI_ASSOC);

  $saldo = $row['total_biaya']-$row2['total_biaya'];

  $sql2    = "SELECT id_pengeluaran FROM dta_pengeluaran";
  $data = $mysqli->query($sql2);
  $adadata = $data->fetch_array(MYSQLI_ASSOC);

  if ($nom < 0 || $nom > $saldo) {
    echo "<script>
            window.alert('Nominal yang anda masukan salah atau Saldo tidak mencukupi! Ulangi sekali lagi');
            window.location=(href='input_pengeluaran.php')
          </script>";
  } else if ($adadata) {
    $query  = "INSERT INTO dta_pengeluaran (id_jenis, tanggal, nominal, keterangan, saldo_akhir) VALUES ('$idjenis', '$tgl', '$nom', '$ket', '$saldoakhir')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_pengeluaran.php?&simpan')
          </script>";

  }else {
    $query  = "INSERT INTO dta_pengeluaran (id_pengeluaran, id_jenis, tanggal, nominal, keterangan, saldo_akhir) VALUES ('30010', '$idjenis', '$tgl', '$nom', '$ket', '$saldoakhir')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_pengeluaran.php?&simpan')
          </script>";
  }

}

 ?>
 
 <?php include_once '../template/foot.php'; ?>
