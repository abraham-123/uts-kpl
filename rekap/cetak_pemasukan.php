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
  <div class="judul">
    <h2>Data Pemasukan</h2>
    <p>SD Maranatha Tayu</p>
    <p><em>Jalan Sedayu no. 1, Kec. Tayu, Kab. Pati Prov. Jawa Tengah</em> </p>
    <hr>
  </div>

  <!-- tabel barang masuk -->
  <table border="1" align="center">
    <tr align="center">
      <th>No</th>
      <th>Kode Pemasukan</th>
      <th>Tanggal</th>
      <th>Nominal (Rupiah)</th>
      <th>Keterangan</th>
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
     </tr>
     <?php
       $no++;
      }
      ?>
  </table>
  <br><br><br><br><br><br>

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
