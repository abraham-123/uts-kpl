<?php 
include_once ('../db/koneksi.php');
include_once('../admin/head.php');

ob_start();
?>
 
<style media="screen">

.judul {
  padding: 4mm;
}

.judultengah {
  padding: 4mm;
  text-align: center;
}

.admin {
  font-weight: bold;
}

.nama {
  text-decoration: underline;
}

</style>
<?php 
    if (isset($_POST['cetak'])) {
      $bulan = $_POST['bulan'];
      $tahun = $_POST['tahun'];
    }
?>
<page>
  <div class="judul">
    <h2>Laporan Bulanan</h2>
    <p>SD Maranatha Tayu</p>
    <p><em>Jalan Sedayu no. 1, Kec. Tayu, Kab. Pati Prov. Jawa Tengah</em> </p>
    <hr>
  </div>
  <div class="judul">
    <h4>Data pemasukan bulan ke-<?php echo $bulan; ?> tahun <?php echo $tahun; ?></h4>
  </div>
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Pemasukan</th>
      <th>Tanggal</th>
      <th>Nominal (Rupiah)</th>
      <th>Keterangan</th>
      <th>Saldo Akhir</th>
    </tr>
    <?php 
    if (isset($_POST['cetak'])) {
      $bulan = $_POST['bulan'];
      $tahun = $_POST['tahun'];
      $query  = "SELECT * FROM dta_pemasukan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'";
      $result = $mysqli->query($query);

      $query2 = "SELECT * FROM dta_pemasukan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ORDER BY tanggal DESC LIMIT 1";
      $result2 = $mysqli->query($query2);
      $saldopemasukan = $result2->fetch_array(MYSQLI_ASSOC);

      $totalmasuk  = "SELECT SUM(nominal) AS total FROM dta_pemasukan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'";
      $hasilmasuk = $mysqli->query($totalmasuk);
      $masuk = $hasilmasuk->fetch_array(MYSQLI_ASSOC);

    } else {
      $query3  = "SELECT * FROM dta_pemasukan";
      $result3 = $mysqli->query($query3);
    }

    $no = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row['id_pemasukan']; ?></td>
       <td><?php echo $row['tanggal']; ?></td>
       <td><?php echo "Rp. ". number_format($row['nominal'], 0, ",", "."); ?></td>
       <td><?php echo $row['keterangan']; ?></td>
       <td><?php echo $row['saldo_akhir']; ?></td>
     </tr>
     <?php
       $no++;
      }
      ?>
  </table>
  <div class="judul">
    <h5>Total Pemasukan = <?php echo "Rp. ". number_format($masuk['total'], 0, ",", "."); ?></h5>
  </div>
</page>
<page>
<div class="judul">
    <h4>Data pengeluaran bulan ke-<?php echo $bulan; ?> tahun <?php echo $tahun; ?></h4>
  </div>
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Pengeluaran</th>
      <th>Tanggal</th>
      <th>Nominal (Rupiah)</th>
      <th>Keterangan</th>
      <th>Saldo Akhir</th>
    </tr>
    <?php 
    if (isset($_POST['cetak'])) {
      $bulan = $_POST['bulan'];
      $tahun = $_POST['tahun'];
      $query4  = "SELECT * FROM dta_pengeluaran WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'";
      $result4 = $mysqli->query($query4);

      $query5 = "SELECT * FROM dta_pengeluaran WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ORDER BY tanggal DESC LIMIT 1";
      $result5 = $mysqli->query($query5);
      $saldopengeluaran = $result5->fetch_array(MYSQLI_ASSOC);

      $totalkeluar  = "SELECT SUM(nominal) AS total FROM dta_pengeluaran WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'";
      $hasilkeluar = $mysqli->query($totalkeluar);
      $keluar = $hasilkeluar->fetch_array(MYSQLI_ASSOC);
    } else {
      $query6  = "SELECT * FROM dta_pengeluaran";
      $result6 = $mysqli->query($query6);
    }

    $no = 1;
    while ($row2 = $result4->fetch_array(MYSQLI_ASSOC)) {
     ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row2['id_pengeluaran']; ?></td>
       <td><?php echo $row2['tanggal']; ?></td>
       <td><?php echo "Rp. ". number_format($row2['nominal'], 0, ",", "."); ?></td>
       <td><?php echo $row2['keterangan']; ?></td>
       <td><?php echo $row2['saldo_akhir']; ?></td>
     </tr>
     <?php
       $no++;
      }
      ?>
  </table>
    <?php
      $querymasuk = "SELECT * FROM dta_pemasukan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ORDER BY tanggal ASC LIMIT 1";
      $querymasuk2 = $mysqli->query($querymasuk);
      $querymasuk3 = $querymasuk2->fetch_array(MYSQLI_ASSOC);

      $querykeluar = "SELECT * FROM dta_pengeluaran WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' ORDER BY tanggal ASC LIMIT 1";
      $querykeluar2 = $mysqli->query($querykeluar);
      $querykeluar3 = $querykeluar2->fetch_array(MYSQLI_ASSOC);
      $saldoakhirbulan = 0;

      $validasi = "SELECT a.id_pemasukan, a.tanggal, a.nominal, b.nama_jenis, a.keterangan, a.saldo_akhir
                    FROM dta_pemasukan a, dta_jenis b
                    WHERE a.id_jenis = b.id_jenis AND month(a.tanggal) = '$bulan' AND year(a.tanggal) = '$tahun'
                    UNION
                    SELECT a.id_pengeluaran, a.tanggal, a.nominal, b.nama_jenis, a.keterangan, a.saldo_akhir
                    FROM dta_pengeluaran a, dta_jenis b
                    WHERE a.id_jenis = b.id_jenis AND month(a.tanggal) = '$bulan' AND year(a.tanggal) = '$tahun'
                    ORDER BY tanggal ASC LIMIT 1";
      $validasi2 = $mysqli->query($validasi);
      $validasi3 = $validasi2->fetch_array(MYSQLI_ASSOC);
      if ($validasi3['nama_jenis'] == 'pemasukan') {
        if ($querymasuk3['nominal'] == $querymasuk3['saldo_akhir']) {
          $saldoakhirbulan = $masuk['total']-$keluar['total'];
        } else {
          $saldoakhirbulan = $querymasuk3['saldo_akhir']-$querymasuk3['nominal']+$masuk['total']-$keluar['total'];
        }
      } else {
        $saldoakhirbulan = $querykeluar3['nominal']+$querykeluar3['saldo_akhir']+$masuk['total']-$keluar['total'];
      }

    ?>
  <div class="judul">
    <h5>Total Pengeluaran = <?php echo "Rp. ". number_format($keluar['total'], 0, ",", "."); ?></h5>
    <h5>Saldo Akhir Bulan = <?php echo "Rp. ". number_format($saldoakhirbulan, 0, ",", "."); ?></h5>
  </div>
  <br><br><br><br><br><br>

  <p>Yang bertanda tangan dibawah ini :</p>
  <p class="admin">Administrator</p>
  <br>
  <br>
  <br>
  <p class="nama"><?php echo $_SESSION['inpuser']; ?></p>
</page>
<?php 
$content = ob_get_clean();
include_once('../html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$content2 = ob_end_clean();
$html2pdf->Output('Laporan_Bulan_ke.pdf','I');

 ?>
