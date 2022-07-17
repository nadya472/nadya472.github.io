<?php
  require 'function2.php';
  $pasien = query("SELECT * from pasien");
  if (isset($_POST['submit'])) {
    if (tambah2($_POST) > 0) {
      // pesan jika data tersimpan
      echo "<script>alert('Data Pasien berhasil ditambahkan'); 
      window.location.href='pasien.php'</script>";
      } else {
      // pesan jika data gagal disimpan
      echo "<script>alert('Data Pasien gagal ditambahkan');
        window.location.href='pasien.php'</script>";
      } 
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
<div class="main">
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
            <a class="nav-link" href="../modul dokter/dokter.php" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Dokter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pasien.php" aria-expanded="false" aria-controls="form-elements">
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
      <!-- Start Form Pasien -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <!-- tambah data -->
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Pasien</h4>
                  <form class="forms-sample" method="post" action="">
                    <div class="form-group row col-12">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control" name="id_pasien">
                      </div>
                    </div>
                    <div class="form-group row col-12">
                      <label for="nama_pasien" class="col-md-4 col-form-label" autocomplete="off">Nama Pasien</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" required>
                      </div>
                    </div>
                    <div class="form-group row col-12">
                      <label for="jenis_kelamin" class="col-md-4 col-form-label" autocomplete="off">Jenis Kelamin</label>
                      <div class="col-md-8">
                        <select class="form-control" name="jenis_kelamin" autocomplete="off">
                            <option></option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                            <option>Lain-lain</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row col-12">
                      <label for="umur" class="col-md-4 col-form-label" autocomplete="off">Umur</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="umur" placeholder="Umur" required>
                      </div>
                    </div>
                    <div class="sc col-md-3" style="float:right">
                      <input type="submit" name="submit" value="Simpan" class="btn btn-primary rounded py-3 px-3 mt-4 mx-2">
                      <a href="pasien.php" class="btn btn-primary rounded py-3 px-3 mt-4 mx-2">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <!-- End Form Dokter-->

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
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

