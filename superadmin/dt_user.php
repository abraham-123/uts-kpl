<?php include_once ('head.php'); ?>

<body class="nav-md">

  <div class="container body">
    <div class="main_container">

      <?php include_once ('header.php'); ?>

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Data User</h3>
            </div>
          </div><br>
          <div class="page-title">
            <div class="page-title">
              <a href="../superadmin/tambah_user.php">
                <button class="btn btn-success">Tambah User</button>
              </a>
            </div>
          </div>

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
                            <th>Kode User</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once ('../db/koneksi.php');

                        $query  = "SELECT * FROM dta_user";
                        $result = $mysqli->query($query);

                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                         ?>
                         <tr>
                             <td><?php echo $no ?></td>
                             <td><?php echo $row['id_user']; ?></td>
                             <td><?php echo $row['username']; ?></td>
                             <td><?php echo $row['password']; ?></td>
                             <td><b><?php echo $row['level']; ?></b></td>
                             <td align="center">
                               <a class="btn btn-primary" href="dt_update_user.php?id_user=<?php echo $row['id_user'] ?>">Update</a>
                               <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_user'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapususer"> Hapus </a>
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

          <div class="modal fade" id="modal-konfirmasihapususer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi hapus user</h4>
                      </div>
                      <div class="modal-body">
                        Ingin menghapus ini?
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" id="hapus-data-user" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
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

    $('#modal-konfirmasihapususer').on('show.bs.modal',
    function (event)
    {
      var div   = $(event.relatedTarget)
      var id    = div.data('id')
      var modal = $(this);
      modal.find('#hapus-data-user').attr("href","dt_hapus_user.php?id_user="+id);
    })

  });
</script>