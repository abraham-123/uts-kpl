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
              <h2>Saldo tersisa = <?php print_r("Rp. ". number_format($saldo, 0, ",", ".")); ?></h2>
            </div>
          </div>
                  <br>

          
          <div class="clearfix"></div>

          

          <?php 
          if (isset($_GET['simpan'])) {

            print_r('
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
            </div>');

          } else if (isset($_GET['hapus'])) {

            print_r('
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