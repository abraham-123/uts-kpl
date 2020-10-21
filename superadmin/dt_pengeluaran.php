 
<?php include_once '../template/head.php'; ?>

<body class="nav-md">
 
  <div class="container body"> 
    <div class="main_container">
 
      <?php include_once 'header.php'; ?>
      
      <?php include_once '../template/dt_pengeluaran_superadmin.php'; ?> 
      
      <?php include_once '../template/superadmin_tombol_dt_pengeluaran.php'; ?>   

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div> 
          <div class="modal fade" id="modal-konfirmasihapussiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi</h4>
                      </div>
                      <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus Data Siswa Ini ?
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" id="hapus-data-siswa" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
