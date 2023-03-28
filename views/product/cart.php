<?php
include_once('views/shares/header.php');

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
            $tong = 0;
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {

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
                            foreach ($_SESSION['giohang'] as $item) {
                                echo "<form action='?r=updateCart' method='post'>";
                                echo "<tr>";
                                echo "<th scope='row'>" . $item[1] . "</th>";
                                echo "<td scope='row'>" . currency_format($item[2]) . "</td>";
                                echo "<td scope='row'><input type='number' name='soluong' id='soluong' class='form-control' value='". $item[3] ."' required></td>";
                                echo "<td scope='row'>" . currency_format($item[3] * $item[2]) . "</td>";
                                echo "<td scope='row'><img src='assets/img/products/" . $item[4] . "' style='width: 70px; height: 70px'></td>";
                                echo "<td><a class='btn btn-danger' href='?r=delCart&id=" . $item[0] . "'>Xóa</a></td>";
                                echo "<input type='hidden' name='id' id='id' class='form-control' value='".$item[0]."'>";
                                echo "<td><button class='btn btn-primary' type='submit'>Cập nhật</button></td>";
                                echo "</tr></form>";
                                $tong += ($item[3] * $item[2]);
                            }
                            ?>
                        
                </table>
                <form action="?r=addDiaChi" method="post">
                    <div class="col-md-8">
                        <h2>Địa Chỉ</h2>
                        <input type="text" name="diachi" id="diachi" class="form-control"
                            value="<?php if (isset($_SESSION['diachi'])) {
                                echo $_SESSION['diachi'];
                            } ?>" required>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Xác Nhận</button>

                    </div>
                </form>

                <div class="text-end ">
                    <p>
                    <h3>Thành Tiền: </h3>
                    <h2 class="fw-bold">
                        <?php echo currency_format($tong); ?>
                    </h2>
                    </p>
                </div>
                <?php
            } else {
                echo "<h3>Không có sản phẩm trong giỏ hàng</h3>";
            }
            ?>
            <div class="text-center">
                <button onclick="location.href='?r=/'" class="btn btn-primary">Quay Lại</button>
                <button onclick="location.href='?r=delCart'" class="btn btn-danger">Xóa giỏ hàng</button>
                <button onclick="location.href='?r=thanhtoan&total=<?php echo $tong ?>'" class="btn btn-primary">Thanh
                    Toán</button>
            </div>

            </tbody>
        </div>
    </div>
</main>
<?php
include_once('views/shares/footer.php');
?>