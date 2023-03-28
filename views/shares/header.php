<?php
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="?r=/" class="logo d-flex align-items-center">
        <img src="assets/img/logo_pet_shop.png" alt="">
        <span class="d-none d-lg-block">PetShop</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="?r=search">
        <input type="text" name="searchName" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

   
      <div class="nav-item">
        <a href="?r=viewCart" class="nav-link nav-icon">
          <i class="bi bi-basket-fill"></i>
          <span class="badge bg-primary badge-number">
            <?php
            if (isset($_SESSION['giohang'])) {
              echo count($_SESSION['giohang']);
            } else {
              echo 0;
            } ?>
          </span>
        </a>
      </div>
      <div class="nav-item" style="margin-left: 10px;">
        <button onclick="location.href='?r=hoadonuser'" class="btn btn-primary">Lịch sử mua hàng</button>
      </div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <?php
        if (isset($_SESSION['userName'])) {

          ?>
          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/avata/<?php echo $_SESSION['avata']; ?>" alt="Profile" class="rounded-circle"
                style="width: 36px; height: 36px">
              <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo $_SESSION['userName']; ?>
              </span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>
                  <?php echo $_SESSION['fullName']; ?>
                </h6>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="?r=edituser">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="?r=logout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul><!-- End Profile Dropdown Items -->
          </li>
          <?php
        } else {
          ?>
          <a href="?r=login" style="margin-right: 20px;"><button type="button"
              class="btn btn-primary rounded-pill">Login</button></a>
          <?php
        }
        ?><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <?php
      if (isset($_SESSION['roleId'])) {
        if ($_SESSION['roleId'] == 1) {
          ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="?r=themsanpham" id="themsanpham">
              <i class="bi bi-journal-text"></i>
              <span>Thêm sản phẩm</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="?r=addcategory" id="addcategory">
              <i class="bi bi-journal-text"></i>
              <span>Thêm loại thú cưng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#danhSach" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Danh Sách</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="danhSach" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li class="nav-item">
                <a class="nav-link collapsed" href="?r=danhsachsanpham" id="danhsachProduct">
                  <i class="bi bi-circle"></i><span>Sản Phẩm</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="?r=listcategory" id="categorylist">
                  <i class="bi bi-circle"></i><span>Loại sản phẩm</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="?r=danhsachAccount" id="danhsachAccount">
                  <i class="bi bi-circle"></i><span>Tài Khoản</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="?r=hoadon" id="hoadon">
              <i class="bi bi-journal-text"></i>
              <span>Danh Sách Hóa Đơn</span>
            </a>
          </li>
        <?php }
      } ?>
    </ul>
  </aside><!-- End Sidebar-->