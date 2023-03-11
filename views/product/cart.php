<?php
    include_once('views/shares/header.php');
    session_start();
?>
  <main id="main" class="main">
    <div class="pagetitle">
			<h1>Giỏ Hàng</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="?r=/">Home</a></li>
				<li class="breadcrumb-item active">Giỏ Hàng</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
    <div class="card">
      <div class="card-body">
          <h5 class="card-title">Giỏ Hàng</h5>
            <?php
          
                if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
                    $tong = 0;
            ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Settings</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($_SESSION['giohang'] as $item){
                        
                            echo "<tr>";
                            echo "<th scope='row'>".$item[1]."</th>";
                            echo "<td scope='row'>".$item[2]."</td>";
                            echo "<td scope='row'>".$item[3]."</td>";
                            echo "<td scope='row'>".$item[3]*$item[2]."</td>";
                            echo "<td scope='row'><img src='assets/img/products/".$item[4]."' style='width: 70px; height: 70px'></td>";
                            echo "<td><a href='?r=delCart&id=".$item[0]."'>Xóa</a></td>";
                            echo "</tr>";
                          $tong+=($item[3]*$item[2]);
                        }
                        
                    ?>
                </table>
                <div class="text-end "> 
                    <p><h3>Thành Tiền: </h3><h2 class="fw-bold"><?php echo $tong." VND"; ?></h2></p> 
                </div>
            <?php
                }else{
                    echo "<h3>Không có sản phẩm trong giỏ hàng</h3>";
                }
            ?>
            <div class="text-center">
                <button onclick="location.href='?r=/'" class="btn btn-primary">Quay Lại</button>
                <button onclick="location.href='?r=delCart'" class="btn btn-danger" >Xóa giỏ hàng</button>
                <button onclick="location.href='?r=thanhtoan&total=<?php echo $tong ?>'" class="btn btn-primary" >Thanh Toán</button>
            </div>
           
          </tbody>
      </div>
    </div>
  </main>
<?php
    include_once('views/shares/footer.php');
?>





