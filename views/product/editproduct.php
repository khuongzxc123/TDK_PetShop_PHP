<?php
    include_once('views/shares/header.php');
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<h1>Chỉnh Sửa</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="?r=/">Home</a></li>
				<li class="breadcrumb-item active">Edit Product</li>
				</ol>
			</nav>
		</div>

    <form class="row g-3" method="post" action="?r=editsanpham&id=<?php echo $product['Id'] ?>" autocomplete="off" enctype="multipart/form-data"> 
                <div class="col-md-5">
                  <p>Tên sản phẩm</p>
                  <input type="text" class="form-control" name="name" value="<?php echo $product['Name'] ?>" required >
                </div>
                <div class="col-md-2">
                  <p>Giá (VND)</p>
                  <input type="number" name="price" id = "price" min="1000" class="form-control" required>
                </div>
                <div class="col-md-1">
                  <p>Đơn vị</p>
                  <input type="text" class="form-control" name="unit" value="<?php echo $product['Unit'] ?>" required>
                </div>
                <br>
                <div class="col-md-9">
                <p>Hình ảnh</p>
                <img src="assets/img/products/<?php echo $product['Image'] ?>" style="width: 200px; height: 200px">
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
      </form>
		



	</main>


<?php
    include_once('views/shares/footer.php');
?>
