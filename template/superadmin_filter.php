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