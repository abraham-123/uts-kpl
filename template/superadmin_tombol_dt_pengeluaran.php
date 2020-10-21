<?php
                        //koneksi
                        include_once '../db/koneksi.php';

                        $query  = "SELECT * FROM dta_pengeluaran";
                        $result = $mysqli->query($query);

                        $no = 1;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                         ?>
                         <tr>
                             <td><?php print_r($no);  ?></td>
                             <td><?php print_r($row['id_pengeluaran']); ?></td>
                             <td><?php print_r($row['tanggal']); ?></td>
                             <td><?php print_r("Rp. ". number_format($row['nominal'], 0, ",", ".")); ?></td>
                             <td><?php print_r($row['keterangan']); ?></td>
                             <td align="center">
                               <a class="btn btn-success" href="../rekap/cetak_pengeluaran_ke.php?id_pengeluaran=<?php print_r( $row['id_pengeluaran']); ?>" target="_blank"><i class="fa fa-print"></i>
                               <a class="btn btn-primary" href="dt_pengeluaran_update.php?id_pengeluaran=<?php print_r($row['id_pengeluaran']); ?>"><i class="fa fa-edit"></i> </a>
                               <a class="btn btn-danger" href="javascript:;" data-id="<?php print_r($row['id_pengeluaran']); ?>" data-toggle="modal" data-target="#modal-konfirmasihapuspengeluaran"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>

                        <?php
                        $no++;
                        }
                        ?>