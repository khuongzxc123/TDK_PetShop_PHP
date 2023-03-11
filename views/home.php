<?php
    session_start();
    include_once('views/shares/header.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
			<h1>Trang Chủ</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="?r=/">Home</a></li>
				</ol>
			</nav>
	  </div>



<div class="container">
  <div class="row">
  <?php foreach($sanPham as $item){ ?>
  <div class="col-xs-4 col-md-4">
    <form action="?r=addCart" method="post">
      <div class="prod-info-main prod-wrap clearfix">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12" >
              <div class="product-image" style="width: 100%; height: 100%">
                <img src="assets/img/products/<?php echo $item['Image'] ?>"  style="width: 100%;height: 100%;" >
              </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="product-deatil">
                <h5 class="name"><a href="#"><?php echo $item['Name'] ?></a></h5>
                <p class="price-container"><span><?php echo $item['Price'] ?> VND</span></p>
                <span class="tag1"></span>
              </div>
              <div class="description">
              <input type="number" name="soluong" id = "soluong" min="0" class="form-control" required>
              </div>
              <div class="product-info smart-form">
                <div class="row">
              <div class="col-md-12">
              <input type="hidden" value="<?php echo $item['Id'] ?>" name="id">
              <input type="hidden" value="<?php echo $item['Name'] ?>" name="name">
              <input type="hidden" value="<?php echo $item['Price'] ?>" name="price">
              <input type="hidden" value="<?php echo $item['Image'] ?>" name="image">
              <button type="submit" class="btn btn-danger">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form> 
  </div>
  <?php } ?>
  </div>
</div>
</main>
<?php
    include_once('views/shares/footer.php');
?>
