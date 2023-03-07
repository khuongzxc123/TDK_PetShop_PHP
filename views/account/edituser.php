<?php
    include_once('views/shares/header.php');
?>

	<main id="main" class="main">
		<div class="pagetitle">
			<h1>Chỉnh Sửa</h1>
			<nav>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="?r=/">Home</a></li>
				<li class="breadcrumb-item active">Edit User</li>
				</ol>
			</nav>
		</div>

    <form class="row g-3" method="post" action="?r=edituser&id=<?php echo $_SESSION['userId'] ?>" autocomplete="off" enctype="multipart/form-data"> 
                <div class="col-md-5">
                  <p>Username</p>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['userName'] ?>" disabled>
                </div>
                <div class="col-md-1">
                  <p>ID</p>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['userId'] ?>" disabled>
                </div><br>
                <div class="col-md-5">
                  <p>Full Name</p>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['fullName'] ?>" name="fullname">
                </div>
                <div class="col-md-9">
                <p>Avata</p>
                <img src="assets/img/avata/<?php echo $_SESSION['avata'] ?>" style="width: 200px; height: 200px">
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
