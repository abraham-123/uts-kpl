 
<?php include_once '../template/head.php'; ?>

<body class="nav-md">
 
  <div class="container body">
    <div class="main_container">
 
    <?php include_once 'header.php'; ?>

    <?php include_once '../template/dt_pemasukan.php'; ?>
                       

    <?php include_once '../template/admin_tombol_dt_pemasukan.php'; ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>  

        </div>
      </div> 
      <?php include_once '../template/footer.php'; ?>

    </div>
  </div> 
<?php include_once '../template/foot.php'; ?>
 
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
