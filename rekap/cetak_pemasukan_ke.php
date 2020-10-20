<?php 
include_once ('../db/koneksi.php');
include_once('../admin/head.php');

ob_start();

$idtran = $_GET['id_pemasukan'];
$query  = "SELECT * FROM dta_pemasukan WHERE id_pemasukan = '$idtran'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

?>
 
<style media="screen">

.judul {
  padding: 4mm;
}

.admin {
  font-weight: bold;
}

.nama {
  text-decoration: underline;
}

</style>
 
<page>
  <div class="judul">
    <h2>Bukti Pemasukan</h2>
    <p>SD Maranatha Tayu</p>
    <p><em>Jalan Sedayu no. 1, Kec. Tayu, Kab. Pati Prov. Jawa Tengah</em> </p>
    <hr>
    <table>
      <tr>
        <td>Kode Pemasukan</td>
        <td>: <?php echo $row['id_pemasukan']; ?></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>: <?php echo $row['tanggal']; ?></td>
      </tr>
      <tr>
        <td>Nominal</td>
        <td>: <?php echo "Rp. ". number_format($row['nominal'], 0, ",", "."); ?></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>: <?php echo $row['keterangan']; ?></td>
      </tr>
      <?php ?>
    </table>
  </div>

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
$html2pdf->Output('Bukti_Pemasukan.pdf','I');

 ?>



