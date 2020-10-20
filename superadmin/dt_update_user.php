<?php include_once ('head.php') ?>

<?php

$kdu = $_GET['id_user'];
$sql   = "SELECT * FROM dta_user WHERE id_user = '$kdu'";
$query = $mysqli->query($sql);
while ($row = $query->fetch_array(MYSQLI_NUM)) {
  $kodeuser = $row[0];
  $username = $row[1];
  $password = $row[2];
  $level = $row[3];
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
                   <h2>Update Admin</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
 
                   <form class="form-horizontal form-label-left" action="dt_update_user_proses.php" method="post">

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode User<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="kd" value=<?php echo "\"$kodeuser\""; ?> readonly>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required"></span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="un" value=<?php echo "\"$username\""; ?> required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required"></span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="pw" value=<?php echo "\"$password\""; ?> required>
                       </div>
                     </div>


                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Level<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="lv" required>
                            <option><?php echo $level; ?></option>
                            <option>- - - pilihan - - -</option>
                            <option>admin</option>
                            <option>superadmin</option>
                         </select>
                       </div>
                     </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <a class="btn btn-warning" href="dt_user.php">Batal</a>
                         <input class="btn btn-success" type="submit" name="update" value="Update">
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
