<?php include_once ('head.php') ?>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title">
      <a href="admin.php" class="site_title"><span>MONEYADMSYS</span></a>
    </div>

    <div class="clearfix"></div>
 
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <a href="admin.php">Dashboard</a>
          </li>
          <li>
            <a href="dt_pemasukan.php">Data Pemasukan</a>
          </li>
          <li>
            <a href="dt_pengeluaran.php">Data Pengeluaran</a>
          </li>
          
          
        </ul>
      </div>
    </div> 

  </div>
</div>
 
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle">
          <i class="fa fa-bars"></i>
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Halo, <?php echo $_SESSION['level']; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
              <a href="../halaman/masuk.php"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div> 
