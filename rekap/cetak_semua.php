<?php
// untuk koneksi
include_once ('../db/koneksi.php');
include_once('../admin/head.php');

ob_start();
?>

<!-- koding CSS -->
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

<!-- koding HTML dan PHP query -->
<page>
  <div class="judultengah">
    <h2>Data Pemasukan dan Pengeluaran</h2>
    <p>SD Maranatha Tayu</p>
    <p><em>Jalan Sedayu no. 1, Kec. Tayu, Kab. Pati Prov. Jawa Tengah</em> </p>
    <hr>
  </div>
  <div class="judul">
    <h4>Data Pemasukan</h4>
  </div>
  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Pemasukan</th>
      <th>Tanggal</th>
      <th>Nominal</th>
      <th>Keterangan</th>
      <th>Saldo Akhir</th>
    </tr>
    <?php 
    $query  = "SELECT * FROM dta_pemasukan";
    $result = $mysqli->query($query);

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
  <br>

  

</page>
<page>
  <div class="judul">
    <h4>Data Pengeluaran</h4>
  </div>
 
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Pengeluaran</th>
      <th>Tanggal</th>
      <th>Nominal</th>
      <th>Keterangan</th>
      <th>Saldo Akhir</th>
    </tr>
    <?php 
    $query  = "SELECT * FROM dta_pengeluaran";
    $result = $mysqli->query($query);

    $no = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row['id_pengeluaran']; ?></td>
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
  <?php

      $sql   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
      $query = $mysqli->query($sql);
      $row   = $query->fetch_array(MYSQLI_ASSOC);

      $sql2   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
      $query2 = $mysqli->query($sql2);
      $row2   = $query2->fetch_array(MYSQLI_ASSOC);

      $saldo = $row['total_biaya']-$row2['total_biaya'];

 ?>
  <br><br><br>
  <div class="judul">
    <h4>Saldo Tersisa = <?php echo "Rp. ". number_format($saldo, 0, ",", "."); ?></h4>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <p>Yang bertanda tangan dibawah ini :</p>
  <p class="admin">Administrator</p>
  <br>
  <br>
  <br>
  <p class="nama"><?php echo $_SESSION['inpuser']; ?></p>

</page>

<?php
// proses untuk menampilkan file pdf
$content = ob_get_clean();
include_once('../html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$content2 = ob_end_clean();
$html2pdf->Output('Data_Pemasukan.pdf','I');

 ?>
