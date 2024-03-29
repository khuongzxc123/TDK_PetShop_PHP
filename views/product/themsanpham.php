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
    <div class="col-md-4">
      <p>Tên Sản Phẩm</p>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="col-md-2">
      <p>Giá(VND)</p>
      <input type="number" name="gia" id="gia" min="1000" class="form-control" required>
    </div>
    <div class="col-md-1">
      <p>Đơn Vị</p>
      <input type="text" name="donvi" id="donvi" class="form-control" required>
    </div>
    <div class="row ">
      <label>Loại</label>
      <div class="col-sm-2" style ="margin-top:10px;">
        <select class="form-select" aria-label="Default select example" name="loai">
          <?php foreach($category as $item){ ?>
          <option value="<?php echo $item['Id']; ?>"><?php echo $item['CateName']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <br>
    <div class="col-md-9">
      <p>Hình Ảnh</p>
      <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
  </form>




</main>


<?php
include_once('views/shares/footer.php');
?>