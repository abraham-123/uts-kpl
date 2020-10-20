 
<?php include_once ('head.php') ?>
 
<?php

$kd = $_GET['id_pemasukan'];
$sql   = "SELECT * FROM dta_pemasukan WHERE id_pemasukan = '$kd'";
$query = $mysqli->query($sql);
$row   = $query->fetch_array(MYSQLI_ASSOC);

 ?>

 <body class="nav-md">
 
   <div class="container body">
     <div class="main_container">
 
       <?php include_once ('header.php'); ?>
 
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Detail</h3>
             </div>
           </div>

           <div class="clearfix"></div>
 
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Data Pemasukan</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
 
                   <form class="form-horizontal form-label-left" action="#">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pemasukan</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['id_pemasukan']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['tanggal']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nominal</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="number" name="" value="<?php echo $row['nominal']; ?>" readonly>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="" value="<?php echo $row['keterangan']; ?>" readonly>
                       </div>
                     </div>
                     
                     
                     
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-primary" href="dt_pemasukan.php">Kembali</a>
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
