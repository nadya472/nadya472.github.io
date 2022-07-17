<?php
  require 'function.php';

  // pagination
  $jumlahDataPerHalaman = 5;
  $jumlahData = count(query("SELECT * FROM dokter"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanaktif) - $jumlahDataPerHalaman;


  $dokter = query("SELECT * from dokter ORDER BY id_dokter ASC LIMIT $awalData, $jumlahDataPerHalaman");

  // jika tombol cari di klik
  if (isset($_POST["cari"])) {
    $dokter = cari($_POST["keyword"]);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Health Care || Medical Clinic</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a href="../index.php" class="navbar-brand ms-4 ms-lg-0">
          <h3 class="fw-bold text-primary m-0" style="text-align: left;">Health Care</h3>
          <h5 class="fw-bold text-secondary m-0" style="text-align: left;">Medical Clinic</h5>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile">
            <a class="nav-link" href="../modul auth/login.php">
                <i class="ti-power-off text-primary"></i>
                Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dokter.php" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Dokter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../modul pasien/pasien.php" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Pasien</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../modul obat/obat.php" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Obat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../modul berobat/berobat.php" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Rekam Medis</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../modul auth/users.php" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Data User</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- Start Form Dokter -->
        <div class="main-panel">        
          <div class="content-wrapper">
            <div class="row">
              <!-- table tampil data -->
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Data Dokter</h2>
                    <form action="" method="post">
                      <div class="col-log-6">
                        <input type="text" name="keyword" size="30" autofocus placeholder="Cari Dokter" autocomplete="off">
                        <button type="submit" class="btn btn-primary rounded py-2 px-3 mt-0.5 mx-2" name="cari">Cari</button>
                      </div>
                    </form>
                    <div class="col-log-2" style="text:right">
                          <a href="cetak.php" target="blank">
                            <button class="btn btn-primary rounded py-3 px-3 mt-4 mx-20" style="float:right">Cetak</button>
                          </a> 
                    </div>
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <tr> 
                            <th> No. </th>
                            <th style="text-align:center"> ID Dokter </th>
                            <th style="text-align:center"> Nama Dokter </th>
                            <th style="text-align:center"colspan="2"> Aksi </th>
                        </tr>
                        <?php $no = 1;?>
                        <?php foreach( $dokter as $row):?>
                        <tr>
                            <td><?=$no ++ ?></td>
                            <td><?=$row ['id_dokter'];?></td>
                            <td><?=$row ['nama_dokter'];?></td>
                            <td><a href="edit.php?id=<?= $row["id_dokter"] ?>">Ubah</a></td>
                            <td><a href="hapus.php?id=<?= $row["id_dokter"] ?>"onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                      <div class="col-lg-12 col-md-6 text-right">
                      <a href="tambah.php">
                        <button type="submit"  class="btn btn-primary rounded py-3 px-3 mt-4 mx-20">Tambah Dokter</button>
                      </a>
                      </div>
                      <!-- NAVIGASI -->
                      <?php if ( $halamanaktif > 1 ) : ?>
                        <a href="?halaman=<?= $halamanaktif -1; ?>">&lt;</a>
                      <?php endif ?>

                      <?php for ($i = 1; $i <= $jumlahHalaman; $i++) :?>
                        <?php if ( $i == $halamanaktif) :?>
                          <a href ="?halaman=<?= $i;?>"style="font-weight:bold; color:red;"><?= $i; ?></a>
                        <?php else: ?>
                          <a href ="?halaman=<?= $i;?>"><?= $i;?></a>
                        <?php endif;?>
                        <?php endfor;?>
                      <?php if ( $halamanaktif < $jumlahHalaman ) : ?>
                        <a href="?halaman=<?= $halamanaktif + 1; ?>">&gt;</a>
                      <?php endif ?>
                      <!-- Navigasi END -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
      <!-- end table tampil data -->
      <!-- End Form Dokter-->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer> 
  
      <!-- container-scroller -->

      <!-- plugins:js -->
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="vendors/chart.js/Chart.min.js"></script>
      <script src="vendors/datatables.net/jquery.dataTables.js"></script>
      <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
      <script src="js/dataTables.select.min.js"></script>

      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/settings.js"></script>
      <script src="js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="js/dashboard.js"></script>
      <script src="js/Chart.roundedBarCharts.js"></script>
      <!-- End custom js for this page-->
  </div>
</body>
</html>