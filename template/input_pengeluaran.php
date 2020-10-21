<?php

$tanggal = date("Y-m-d");

 ?>
 <body class="nav-md">
 
   <div class="container body">
     <div class="main_container">
 
       <?php include_once 'header.php'; ?>
 
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Input Pengeluaran</h3>
             </div>
           </div>

           <div class="clearfix"></div>
 
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Form Input Pengeluaran</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
 
                   <form class="form-horizontal form-label-left" action="input_pengeluaran.php" method="post">
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="date" name="tanggal" value="<?php echo $tanggal; ?>" required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nominal<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <span class="form-control-feedback left" aria-hidden="true">Rp</span>
                         <input class="form-control col-md-7 col-xs-12 has-feedback-left" type="number" name="nominal" required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="keterangan" required>
                       </div>
                     </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
                         <a class="btn btn-warning" href="../admin/admin.php">Batal</a>
                       </div>
                     </div>

                   </form> 

                

                 </div>
               </div>
             </div>
           </div> 

         </div>
       </div>
       <?php include_once '../template/footer.php'; ?>

     </div>
   </div>


