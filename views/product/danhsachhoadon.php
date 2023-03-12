<?php
include_once('views/shares/header.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Danh Sách Hóa Đơn</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?r=/">Home</a></li>
        <li class="breadcrumb-item active">Danh Sách Hóa Đơn</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Danh Sách Hóa Đơn</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Người Mua</th>
            <th scope="col">Ngày Mua</th>
            <th scope="col">Tổng</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $tong = 0;
          foreach ($danhSachHoaDon as $item) {
            echo "<tr>";
            echo "<th scope='row'>" . $item['Id'] . "</th>";
            echo "<td scope='row'>" . $item['FullName'] . "</td>";
            echo "<td scope='row'>" . $item['Day'] . "</td>";
            echo "<td scope='row'>" . currency_format($item['Total']) . "</td>";
            echo "<td><a href='?r=chitiethoadon&id=" . $item['Id'] . "'>Chi Tiết</a></td>";
            echo "</tr>";
            $tong += $item['Total'];
          }

          ?>
      </table>
      <div class="text-end ">
        <p>
        <h3>Tổng: </h3>
        <h2 class="fw-bold">
          <?php echo currency_format($tong); ?>
        </h2>
        </p>
      </div>
      <div class="text-center">
        <button onclick="location.href='?r=/'" class="btn btn-primary">Quay Lại</button>
      </div>
      </tbody>
    </div>
  </div>
</main>
<?php
include_once('views/shares/footer.php');
?>