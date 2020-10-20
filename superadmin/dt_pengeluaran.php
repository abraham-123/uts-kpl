 
<?php include_once ('head.php'); ?>

<body class="nav-md">
 
  <div class="container body">
    <div class="main_container">
 
      <?php include_once ('header.php'); ?>
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
              <h5>Total Pengeluaran = <?php echo "Rp. ". number_format($totalpengeluaran, 0, ",", "."); ?></h5>
            </div>
          </div>

          <div class="page-title">
            <div class="page-title">
              <a href="../rekap/cetak_pengeluaran.php" target="_blank">
                <button class="btn btn-success" type="submit" name="cetak">Cetak Data</button>
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
                            <th>Kode Pengeluaran</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        //koneksi
                        include_once ('../db/koneksi.php');

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
                             <td align="center">
                               <a class="btn btn-success" href="../rekap/cetak_pengeluaran_ke.php?id_pengeluaran=<?php echo $row['id_pengeluaran'] ?>" target="_blank"><i class="fa fa-print"></i>
                               <a class="btn btn-primary" href="dt_pengeluaran_update.php?id_pengeluaran=<?php echo $row['id_pengeluaran'] ?>"><i class="fa fa-edit"></i> </a>
                               <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_pengeluaran'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapuspengeluaran"><i class="fa fa-trash"></i></a>
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
          <div class="modal fade" id="modal-konfirmasihapuspengeluaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi</h4>
                      </div>
                      <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus ?
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" id="hapus-data-pengeluaran" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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

    $('#modal-konfirmasihapuspengeluaran').on('show.bs.modal',
    function (event)
    {
      var div   = $(event.relatedTarget)
      var id    = div.data('id')
      var modal = $(this);
      modal.find('#hapus-data-pengeluaran').attr("href","dt_pengeluaran_hapus.php?id_pengeluaran="+id);
    })

  });
</script>
