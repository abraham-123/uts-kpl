 
<?php include_once ('head.php'); ?>

<body class="nav-md">
 
  <div class="container body">
    <div class="main_container">
 
      <?php include_once ('header.php'); ?>
 
      <div class="right_col" role="main">
      <?php

      $sql   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
      $query = $mysqli->query($sql);
      $row   = $query->fetch_array(MYSQLI_ASSOC);

      $sql2   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
      $query2 = $mysqli->query($sql2);
      $row2   = $query2->fetch_array(MYSQLI_ASSOC);

      $saldo = $row['total_biaya']-$row2['total_biaya'];

 ?>
        <div class="">
          <div class="page-title">
            <div class="" align="center">
              <h2>
                <b>
                MONEYADMSYS
                </b> 
              </h2>
              <h5>Sistem Administrasi Keuangan Pengelolaan Dana Sumbangan</h5>
            </div>
          </div>
          <br><br><br><br>
          <div class="" align="right">
            <div class="title_left">
              <h2>Saldo tersisa = <?php echo "Rp. ". number_format($saldo, 0, ",", "."); ?></h2>
            </div>
          </div>
                  <br>

          
          <div class="clearfix"></div>

          

          <?php 
          if (isset($_GET['simpan'])) {

            echo '
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil dimasukkan
            </div>';

          }  else if (isset($_GET['update'])) {

            echo '
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil diupdate
            </div>';

          } else if (isset($_GET['hapus'])) {

            echo '
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil dihapus
            </div>';

          }
           ?>
 
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="row">
                    <a href="input_pemasukan.php" class="btn btn-success">Input Pemasukan</a>&nbsp&nbsp&nbsp
                    <a href="input_pengeluaran.php" class="btn btn-primary">Input Pengeluaran</a>
                  </div>
                  
                  <div class="row">
                    <div class="page-title">
                      <a href="../rekap/cetak_semua.php" target="_blank">
                        <button class="btn btn-success" type="submit" name="cetak">Cetak Semua</button>
                      </a>
                    </div>
                  </div>
                  <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="x_panel">
                <form class="" action="../rekap/cetak_laporan.php" method="post" target="_blank">
                  <div class="control-group">
                    <div class="controls">
                      <label class="control-label">Cetak Laporan Bulanan</label><br><br>
                      <label class="control-label">Bulan </label>
                         <select class="form-control" name="bulan" required>
                           <option value="">- - - pilihan - - -</option>
                           <option value="1">Januari</option>
                           <option value="2">Februari</option>
                           <option value="3">Maret</option>
                           <option value="4">April</option>
                           <option value="5">Mei</option>
                           <option value="6">Juni</option>
                           <option value="7">Juli</option>
                           <option value="8">Agustus</option>
                           <option value="9">September</option>
                           <option value="10">Oktober</option>
                           <option value="11">November</option>
                           <option value="12">Desember</option>
                         </select><br>
                       <label class="control-label">Tahun</label>
                          <select class="form-control" name="tahun" required>
                            <option value="">- - - pilihan - - -</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                          </select>

                    </div>
                  </div>
                  
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="cetak" value="Cetak">
                  </div>
                </form>
              </div>
            </div>
          </div>
                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nominal (Rupiah)</th>
                            <th>Jenis Transaksi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        include_once ('../db/koneksi.php');

                        $query  = "SELECT a.id_pemasukan, a.tanggal, a.nominal, b.nama_jenis, a.keterangan
                                    FROM dta_pemasukan a, dta_jenis b
                                    WHERE a.id_jenis = b.id_jenis
                                    UNION
                                    SELECT a.id_pengeluaran, a.tanggal, a.nominal, b.nama_jenis, a.keterangan
                                    FROM dta_pengeluaran a, dta_jenis b
                                    WHERE a.id_jenis = b.id_jenis";
                        $result = $mysqli->query($query);

                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                         ?>
                         <tr>
                             <td><?php echo $no ?></td>
                             <td><?php echo $row['id_pemasukan']; ?></td>
                             <td><?php echo $row['tanggal']; ?></td>
                             <td><?php echo "Rp. ". number_format($row['nominal'], 0, ",", "."); ?></td>
                             <td><?php echo $row['nama_jenis']; ?></td>
                             <td><?php echo $row['keterangan']; ?></td>
                         </tr>

                        <?php
                        $no++;
                        }
                        ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div> 
      <?php include_once ('footer.php'); ?>

    </div>
  </div> 
<?php include_once ('foot.php'); ?>
 
<script type="text/javascript">
  $(document).ready(function () {

    $('#modal-konfirmasihapussiswa').on('show.bs.modal',
    function (event)
    {
      var div   = $(event.relatedTarget)
      var id    = div.data('id')
      var modal = $(this);
      modal.find('#hapus-data-siswa').attr("href","dt_siswa_hapus.php?id_siswa="+id);
    })

  });
</script>
