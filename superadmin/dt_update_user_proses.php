<?php 
include_once ('../db/koneksi.php');
 
if (isset($_POST['update'])) {
  $kode = $_POST['kd'];
  $username = $_POST['un'];
  $password = $_POST['pw'];
  $level = $_POST['lv'];

  $query  = "UPDATE dta_user SET username = '$username', password = '$password', level = '$level' WHERE id_user = '$kode'";
  $result = $mysqli->query($query);

  if ($result) {
    header('location:'.'dt_user.php?&update');
  } else {
    echo "<script>
            window.alert('Kesalahan dalam mengubah data, coba ulangi');
            window.location=(href='dt_admin.php')
          </script>";
  }

}

 ?>
