<?php
    include_once('views/shares/header.php');
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<h1>Thêm Sản Phẩm</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="?r=/">Home</a></li>
				<li class="breadcrumb-item active">Add Product</li>
				</ol>
			</nav>
		</div>

    <form class="row g-3" method="post" action="?r=themsanpham" autocomplete="off" enctype="multipart/form-data"> 
                <div class="col-md-5">
                  <p>Tên Sản Phẩm</p>
                  <input type="text" name="name" id = "name" class="form-control" required>
                </div>
                <div class="col-md-1">
                  <p>Giá(VND)</p>
                  <input type="number" name="gia" id = "gia" min="1000" required>
                </div><br>
                <div class="col-md-9">
                <p>Hình Ảnh</p>
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                </div>
      </form>
		



	</main>


<?php
    include_once('views/shares/footer.php');
?>
