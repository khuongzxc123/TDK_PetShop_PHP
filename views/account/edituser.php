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

  <form class="row g-3" method="post" action="?r=edituser&id=<?php echo $_SESSION['userId'] ?>" autocomplete="off"
    enctype="multipart/form-data">
    <div class="col-md-5">
      <h3>Username</h3>
      <input type="text" class="form-control" value="<?php echo $_SESSION['userName'] ?>" disabled>
    </div>
    <div class="col-md-1">
      <h3>ID</h3>
      <input type="text" class="form-control" value="<?php echo $_SESSION['userId'] ?>" disabled>
    </div><br>
    <div class="col-md-5">
      <h3>Full Name</h3>
      <input type="text" class="form-control" value="<?php echo $_SESSION['fullName'] ?>" name="fullname">
    </div>

    <div class="col-md-6">
      <h3>Avata</h3>
      <img src="assets/img/avata/<?php echo $_SESSION['avata'] ?>" style="width: 200px; height: 200px">
      <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
    </div>
    <div class="col-md-5">
      <h3>Email</h3>
      <input type="email" name="email" id="email" value="<?php if ($_SESSION['email'] != null)
        echo $_SESSION['email'];
      else
        echo ""; ?>" class="form-control" disabled>
      <?php
      if (isset($_SESSION['email']) && $_SESSION['email'] != NULL) {
        if ($_SESSION['status'] != 0) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:10px">
            Email đã xác thực
          </div>
          <?php
        } else {
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:10px">
            Email chưa xác thực
          </div>
          <?php
        }
      } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:10px">
          Chưa nhập email
        </div>
        <?php
      }
      ?>
      <a href="?r=email" type="button">Thêm/ Sửa Email</a>
    </div>

    <div class="text-center">
      <button onclick="location.href='?r=/'" class="btn btn-primary">Quay Lại</button>
      <button type="submit" class="btn btn-primary">Sửa</button>
    </div>
  </form>




</main>


<?php
include_once('views/shares/footer.php');
?>