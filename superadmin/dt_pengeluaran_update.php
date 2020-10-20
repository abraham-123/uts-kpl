 
<?php include_once ('head.php') ?>


<?php

$kd = $_GET['id_pengeluaran'];
$sql   = "SELECT * FROM dta_pengeluaran WHERE id_pengeluaran = '$kd'";
$query = $mysqli->query($sql);
while ($row = $query->fetch_array(MYSQLI_NUM)) {
  $kdp = $row[0];
  $tgl = $row[2];
  $nom = $row[3];
  $ket = $row[4];
}
?>

 <body class="nav-md">
 
   <div class="container body">
     <div class="main_container">
 
       <?php include_once ('header.php'); ?>
 
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Update</h3>
             </div>
           </div>

           <div class="clearfix"></div>
 
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Data Pengeluaran</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
 
                   <form class="form-horizontal form-label-left" action="dt_pengeluaran_update_proses.php" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pengeluaran<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="kodep" value=<?php echo "\"$kdp\""; ?> readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="date" name="tanggal" value=<?php echo "\"$tgl\""; ?> readonly>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nominal<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="number" name="nominal" value=<?php echo "\"$nom\""; ?> required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="keterangan" value=<?php echo "\"$ket\""; ?> required>
                       </div>
                     </div>
                     
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <input class="btn btn-success" type="submit" name="update" value="Update">
                         <a class="btn btn-warning" href="dt_pengeluaran.php">Batal</a>
                       </div>
                     </div>

                     <br><br>
                     <div class="row">
                        <div class="col-md-6">
                          <p>
                            <b></b>
                          </p>
                        </div>
                      </div>

                   </form> 

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