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

    <form class="row g-3" method="post" action="?r=email">
        <div class="col-md-5">
            <h3>Email</h3>
            <input name="email" type="email" class="form-control" value="<?php if ($_SESSION['email'] != null)
                echo $_SESSION['email'];
            else
                echo ""; ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
    <div class="text-end">
        <button onclick="location.href='?r=edituser'" class="btn btn-danger">Quay Lại</button>
    </div>
</main>


<?php
include_once('views/shares/footer.php');
?>