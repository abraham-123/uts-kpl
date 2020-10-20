 
<?php include_once ('head.php'); ?>

<body class="nav-md">
 
  <div class="container body">
    <div class="main_container">
 
      <?php include_once ('header.php'); ?>
      <?php

      $sql   = "SELECT * FROM dta_jenis WHERE nama_jenis = 'pemasukan'";
      $query = $mysqli->query($sql);
      $row   = $query->fetch_array(MYSQLI_ASSOC);

      $totalpemasukan = $row['total_biaya'];
      ?>
 
      <div class="right_col" role="main">
        <div class="">
                  <br>
          <div class="page-title">
            <div class="title_left">
              <h3>Data Pemasukan</h3>
            </div>
          </div>

          <div class="" align="right">
            <div class="title_left">
              <h5>Total Pemasukan = <?php echo "Rp. ". number_format($totalpemasukan, 0, ",", "."); ?></h5>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="x_panel">
                <form class="" action="../rekap/cetak_pemasukan_dari.php" method="post" target="_blank">
                  <div class="control-group">
                    <div class="controls">
                      <label class="control-label">Cetak Menurut Tanggal</label>
                    </div><br>
                    <div class="controls">
                      <label class="control-label">Dari Tanggal</label>
                      <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <input class="form-control col-md-7 col-xs-12" type="date" name="tgl_a" required>
                      </div>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label">Sampai Tanggal</label>
                    <div class="input-prepend input-group">
                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                      <input class="form-control col-md-7 col-xs-12" type="date" name="tgl_b" required>
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
          <div class="page-title">
            <div class="page-title">
              <a href="../rekap/cetak_pemasukan.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Semua Pemasukan</button>
              </a>
            </div>
          </div>

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

                  <table class="table table-striped table-bordered table-hover" id="datatables" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pemasukan</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        include_once ('../db/koneksi.php');

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
                             <td align="center">
                               <a class="btn btn-primary" href="../rekap/cetak_pemasukan_ke.php?id_pemasukan=<?php echo $row['id_pemasukan'] ?>" target="_blank"><i class="fa fa-print"></i></a>
                             </td>
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
