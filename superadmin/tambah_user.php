 
<?php include_once ('head.php') ?>
 
<?php

$sql    = "SELECT id_user FROM dta_user";
$carkod = $mysqli->query($sql);
$datkod = $carkod->fetch_array(MYSQLI_ASSOC);
 ?>
 <body class="nav-md">
 
   <div class="container body">
     <div class="main_container">
 
       <?php include_once ('header.php'); ?>
 
       <div class="right_col" role="main">
         <div class="">
           <div class="page-title">
             <div class="title_left">
               <h3>Tambah User</h3>
             </div>
           </div>

           <div class="clearfix"></div>
 
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Form Tambah User</h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
 
                   <form class="form-horizontal form-label-left" action="tambah_user.php" method="post">
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="username" required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required"></span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" type="text" name="password" required>
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="level" required>
                           <option>- - - pilihan - - -</option>
                           <option>admin</option>
                           <option>superadmin</option>
                         </select>
                       </div>
                     </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <input class="btn btn-success" type="submit" name="tambah" value="Tambah">
                         <a class="btn btn-warning" href="../superadmin/dt_user.php">Batal</a>
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
 
<?php 

if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $sql     = "SELECT * FROM dta_user WHERE id_user = '$kodeoto'";
  $validasi = $mysqli->query($sql);

  if ($datkod) {
    $query  = "INSERT INTO dta_user (username, password, level) VALUES ('$username', '$password', '$level')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_user.php?&simpan')
          </script>";
  } else {
    $query  = "INSERT INTO dta_user (id_user, username, password, level) VALUES ('90001', '$username', '$password', '$level')";
    $result = $mysqli->query($query);

    echo "<script>
            window.location=(href='dt_user.php?&simpan')
          </script>";
  }

}

 ?>
 
 <?php include_once ('foot.php'); ?>
