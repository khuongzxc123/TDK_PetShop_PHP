<?php
    session_start();
    include_once('views/shares/header.php');
?>
<main id="main" class="main">
    <div class="pagetitle">
			<h1>Trang Chủ</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				</ol>
			</nav>
	  </div>



<div class="container">
  <div class="row">
  <?php foreach($sanPham as $item){ ?>
  <div class="col-xs-4 col-md-4">
      <div class="prod-info-main prod-wrap clearfix">
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12" >
              <div class="product-image" style="width: 100%; height: 100%">
                <img src="assets/img/products/<?php echo $item['Image'] ?>" class="img-responsive" style="width: 100%; height: 100%;" >
              </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
              <div class="product-deatil">
                <h5 class="name"><a href="#"><?php echo $item['Name'] ?></a></h5>
                <p class="price-container"><span><?php echo $item['Price'] ?> VND</span></p>
                <span class="tag1"></span>
              </div>
            <div class="description">
                <p>A Short product description here</p>
              </div>
              <div class="product-info smart-form">
                <div class="row">
              <div class="col-md-12">
              <a href="#" class="btn btn-danger">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div><?php } ?>
  </div>
</div>
</main>
<?php
    include_once('views/shares/footer.php');
?>
