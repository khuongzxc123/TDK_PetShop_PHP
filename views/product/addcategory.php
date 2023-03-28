<?php
include_once('views/shares/header.php');
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?r=/">Home</a></li>
        <li class="breadcrumb-item active">Add Category</li>
      </ol>
    </nav>
  </div>

  <form class="row g-3" method="post" action="?r=addcategory">
    <div class="col-md-4">
      <p>Loại Sản Phẩm</p>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Thêm Loại</button>
    </div>
  </form>




</main>


<?php
include_once('views/shares/footer.php');
?>