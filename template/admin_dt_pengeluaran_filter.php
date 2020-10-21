<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="x_panel">
                <form class="" action="../rekap/cetak_pengeluaran_dari.php" method="post" target="_blank">
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