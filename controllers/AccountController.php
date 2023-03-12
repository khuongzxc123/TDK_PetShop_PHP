<?php
require_once('configs/database.php');
require_once('models/User.php');
require_once('controllers/ImageController.php');

class AccountController
{
  private $model;
  function __construct()
  {
    global $pdo;
    $this->model = new User($pdo);
    $this->img = new ImageController();
  }

  function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();
      $userName = $_POST['username'];
      $pass = $_POST['password'];
      if (empty($userName) || empty($pass)) {
        echo "<script type='text/javascript'>alert('USERNAME or PASSWORD khong duoc nhap!!!');</script>";
        exit;
      }
      // $hashPass = password_hash($pass,PASSWORD_BCRYPT);
      $user = $this->model->find($userName);
      if (password_verify($pass, $user['Pass'])) {
        $_SESSION['userId'] = $user['Id'];
        $_SESSION['userName'] = $user['UserName'];
        $_SESSION['avata'] = $user['Avata'];
        $_SESSION['fullName'] = $user['FullName'];
        $_SESSION['roleId'] = $user['RoleId'];
        header('Location: ?r=/');
        exit;
      } else {
        $_SESSION['error'] = 'Invalid User!';
        header("Location: ?r=login");
        exit;
      }
      exit;
    }
    require_once('views/account/login.php');
  }
  function logout()
  {
    session_destroy();
    echo "<script>alert('Logout Success!');</script>";
    Header("Refresh: 0; url='?r=/'");
    // header('Location: ?r=/');
  }
  function edituser()
  {
    session_start();
    $filename = "assets/img/avata/" . $_SESSION['avata'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $fullname = $_POST['fullname'];
      $id = $_GET['id'];
      if ($_FILES["image"]["size"] != 0) {
        $newImageName = $this->img->uploadImage($_FILES["image"], 'assets/img/avata/');
        $isUpdate = $this->model->edituser($id, $newImageName, $fullname);
        if ($isUpdate) {
          if (file_exists($filename) && $filename != 'assets/img/avata/default_avata.png') {
            unlink($filename);
          }
          header('Location: ?r=/');
          $_SESSION['avata'] = $newImageName;
          $_SESSION['fullName'] = $fullname;
        } else {
          echo "ERROR UPDATE USER!!";
        }
      } else {
        $isUpdate = $this->model->edituser($id, $_SESSION['avata'], $fullname);
        if ($isUpdate) {
          header('Location: ?r=/');
          $_SESSION['fullName'] = $fullname;
        } else {
          echo "ERROR UPDATE USER!!";
        }
      }
    } else {
      require_once('views/account/edituser.php');
    }
  }

  function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $pass = $_POST['password'];
      $confirm = $_POST['confirmPass'];
      if ($pass != $confirm) {
        echo '<script language="javascript">alert("Pass and Confirm Pass not match!!!")</script>';
        Header("Refresh: 0; url='?r=register'");
        exit;
      }
      $user = $this->model->find($username);
      if (!empty($user)) {
        echo '<script language="javascript">alert("Username is Exists")</script>';
        Header("Refresh: 0; url='?r=register'");
        exit;
      }
      $hashPass = password_hash($pass, PASSWORD_BCRYPT);
      $isSuccess = $this->model->addUser($username, $hashPass);
      if ($isSuccess) {
        echo '<script language="javascript">alert("Register Success")</script>';
        Header("Refresh: 0; url='?r=login'");
      } else {
        echo '<script language="javascript">alert("404 Error!!")</script>';
        Header("Refresh: 0; url='?r=register'");
      }

    } else {
      require_once('views/account/register.php');
    }
  }
  function danhsachAccount()
  {
    $danhsachAccount = $this->model->getAllAccount();
    require_once('views/account/danhsachaccount.php');
  }

}
?>