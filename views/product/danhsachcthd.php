<?php
include_once('views/shares/header.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Chi Tiết Hóa Đơn:
      <?php echo $hoaDonId ?>
    </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?r=/">Home</a></li>
        <li class="breadcrumb-item active">Chi Tiết Hóa Đơn:
          <?php echo $hoaDonId ?>
        </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Chi Tiết Hóa Đơn:
        <?php echo $hoaDonId ?>
      </h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Hình Ảnh</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($danhSachCTHD as $item) {
            echo "<tr>";
            echo "<th scope='row'>" . $i . "</th>";
            echo "<td scope='row'>" . $item['Name'] . "</td>";
            echo "<td scope='row'>" . currency_format($item['Price'] * $item['Quantity']) . "</td>";
            echo "<td scope='row'>" . $item['Quantity'] . "</td>";
            echo "<td scope='row'><img src='assets/img/products/" . $item['Image'] . "' style='width: 70px; height: 70px'></td>";
            echo "</tr>";
            $i++;
          }

          ?>
      </table>
      <div class="text-center">
        <button onclick="location.href='?r=hoadon'" class="btn btn-primary">Quay Lại</button>
      </div>
      </tbody>
    </div>
  </div>
</main>
<?php
include_once('views/shares/footer.php');
?>