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

    <form class="row g-3" method="post" action="?r=editCategory&id=<?php echo $category['Id']; ?>">
        <div class="col-md-1">
            <p>Id</p>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo $category['Id']; ?>" disabled>
        </div>
        <div class="col-md-4">
            <p>Tên loại thú cưng</p>
            <input type="text" name="loai" id="loai" class="form-control" value="<?php echo $category['CateName']; ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>

    </form>
</main>


<?php
include_once('views/shares/footer.php');
?>