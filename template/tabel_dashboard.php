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
                        include_once '../db/koneksi.php';

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
                             <td><?php print_r($no);?></td>
                             <td><?php print_r($row['id_pemasukan']); ?></td>
                             <td><?php print_r($row['tanggal']); ?></td>
                             <td><?php print_r("Rp. ". number_format($row['nominal'], 0, ",", ".")); ?></td>
                             <td><?php print_r($row['nama_jenis']); ?></td>
                             <td><?php print_r($row['keterangan']); ?></td>
                         </tr>

                        <?php
                        $no++;
                        }
                        ?>

                    </tbody>
                  </table>