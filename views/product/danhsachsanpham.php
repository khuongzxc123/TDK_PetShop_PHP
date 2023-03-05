<?php
    include_once('views/shares/header.php');
?>
  <main id="main" class="main">
    <div class="pagetitle">
			<h1>Danh Sách Sản Phẩm</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Danh Sách Sản Phẩm</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
    <div class="card">
      <div class="card-body">
          <h5 class="card-title">Danh Sách Sản Phẩm</h5>
          <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Settings</th>
              </tr>
              </thead>
              <tbody>
              <?php
                foreach($danhSachSanPham as $item){
                  echo "<tr>";
                  echo "<th scope='row'>".$item['Id']."</th>";
                  echo "<td scope='row'>".$item['Name']."</td>";
                  echo "<td scope='row'>".$item['Price']."</td>";
                  echo "<td scope='row'><img src='assets/img/products/".$item['Image']."' style='width: 70px; height: 70px'></td>";
                  echo "<td><a href='?r=sua&id=".$item['Id']."'>EDIT</a></td>";
                  echo "</tr>";
                }
                
              ?>
          </table>
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





