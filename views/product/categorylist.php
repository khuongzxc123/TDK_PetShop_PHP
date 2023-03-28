<?php
include_once('views/shares/header.php');
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Danh Sách Loại Thú Cưng</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?r=/">Home</a></li>
        <li class="breadcrumb-item active">Danh Sách Loại Thú Cưng</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Danh Sách Loại Thú Cưng</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Loại thú cưng</th>
            <th scope="col">Settings</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($category as $item) {
            echo "<tr>";
            echo "<th scope='row'>" . $item['Id'] . "</th>";
            echo "<td scope='row'>" . $item['CateName'] . "</td>";
            echo "<td><a href='?r=editCategory&id=" . $item['Id'] . "'>EDIT</a></td>";
            echo "</tr>";
          }

          ?>
      </table>
      <div class="text-center">
        <button onclick="location.href='?r=/'" class="btn btn-primary">Quay Lại</button>
      </div>
      </tbody>
    </div>
  </div>
</main>
<?php
include_once('views/shares/footer.php');
?>