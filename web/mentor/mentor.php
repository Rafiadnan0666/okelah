<?php
require "../config.php";
$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id = $id";
$query2 = "SELECT * FROM mahasantri WHERE mentor_id = $id";
$query3 = "SELECT * FROM gambar WHERE user_id = $id";
$jml = "SELECT COUNT(nama_mhs) AS jml FROM mahasantri WHERE mentor_id = $id";
$user = mysqli_query($connect, $query);
$mahasantri = mysqli_query($connect, $query2);
$jl = mysqli_fetch_assoc(mysqli_query($connect, $jml));
$usr = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TAPET</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <!-- Font Awessome -->
  <script src="https://kit.fontawesome.com/735fc517fe.js" crossorigin="anonymous"></script>
  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION["login$id"]) || isset($_SESSION["aktif$id"])) {
    echo $_SESSION["login$id"];
  ?>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-light text-decoration-none font-weight-bold" href="mentor.php?id=<?= $id ?>" style="font-size:2rem;">TAPET</a>
          <a class="sidebar-brand brand-logo-mini font-weight-bold text-decoration-none text-light pl-4 " href="mentor.php?id=<?= $id ?>" style="font-size:2rem;">T</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <div class="pp rounded-circle" style="background-image: url(../img/<?= $usr['gambar'] ?>);"></div>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?= $usr['nama'] ?></h5>
                  <span>Mentor</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="edit_mentor.php?id=<?= $id ?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>

              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="mentor.php?id=<?= $id ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Home</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="mentor.php?id=<?= $id ?>"><h1 class="text-light">T</h1></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <div class="pps rounded-circle" style="background-image: url(../img/<?= $usr['gambar'] ?>);"></div>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $usr['nama'] ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a href="edit_mentor.php?id=<?= $id ?>" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <form class="dropdown-item preview-item" action="" method="POST">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content pl-0">
                      <button type="submit" onclick="return confirm('Apakah anda yakin akan keluar ?')" name="logout" class="btn preview-subject mb-1">Log out</button>
                    </div>
                  </form>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div id="bodi" class="content-wrapper bodi">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <span class="card-text" style="float: right;">Jumlah Binaan : <?= $jl['jml'] ?></span>
                    <h4 class="card-title">Mahasantri dari <?= $usr['nama'] ?></h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> NIM </th>
                            <th> Nama </th>
                            <th> Rata-Rata Nilai </th>
                            <th> Setoran Terakhir </th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($mahasantri as $m) {
                            $mid = $m['id'];
                            $avg = mysqli_fetch_assoc(mysqli_query($connect, "SELECT AVG(nilai) AS avg FROM setoran WHERE mahasantri_id = $mid ORDER BY id DESC LIMIT 1"));
                            $str = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM setoran WHERE mahasantri_id = $mid ORDER BY id DESC LIMIT 1"));
                          ?>
                            <tr>
                              <td> <?= $no++ ?> </td>
                              <td> <?= $m['nim'] ?> </td>
                              <td> <?= $m['nama_mhs'] ?> </td>
                              <td> <?= number_format($avg['avg'], 2, ",", ".") ?> </td>
                              <td> <?= "Juz " . $str['juz'] . " , Hal " . $str['halaman'] ?> </td>
                              <td style="text-align: right;">
                                <a href="mahasantri.php?id=<?= $m['id'] ?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Detail</a>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
                2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                  templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  <?php
    unset($_SESSION["login$id"]);
    $_SESSION["aktif$id"] = "";
  } else {
    header('location:../login.php');
  }
  ?>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>

<?php

if (isset($_POST['logout'])) {
  unset($_SESSION["aktif$id"]);
  // session_unset("aktif$id");
  // session_destroy();
  echo "<script>document.location.href = '../login.php'</script>";
}
