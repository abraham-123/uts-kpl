<?php

      $sql   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pengeluaran'";
      $query = $mysqli->query($sql);
      $row   = $query->fetch_array(MYSQLI_ASSOC);

      $totalpengeluaran = $row['total_biaya'];
      ?>
 
      <div class="right_col" role="main">
        <div class="">
          <br>
          <div class="page-title">
            <div class="title_left">
              <h3>Data Pengeluaran</h3>
            </div>
          </div>
          <div class="" align="right">
            <div class="title_left">
              <h5>Total Pengeluaran = <?php print_r("Rp. ". number_format($totalpengeluaran, 0, ",", ".")); ?></h5>
            </div>
          </div>

          <!-- <?php include_once '../template/admin_dt_pengeluaran_filter.php'; ?> -->

          <div class="page-title">
            <div class="page-title">
              <a href="../rekap/cetak_pengeluaran.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Semua Pengeluaran</button>
              </a>
            </div>
          </div>

          <div class="clearfix"></div>

          

          <?php 
          if (isset($_GET['simpan'])) {

            print_r( '
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil dimasukkan
            </div>');

          }  else if (isset($_GET['update'])) {

            print_r('
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil diupdate
            </div>') ;

          } else if (isset($_GET['hapus'])) {

            print_r( '
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Data berhasil dihapus
            </div>');

          }
           ?>
 
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pengeluaran</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        