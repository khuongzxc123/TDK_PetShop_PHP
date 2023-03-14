<?php
require_once('configs/database.php');
require_once('models/User.php');
require_once('controllers/ImageController.php');
require_once('controllers/MailController.php');
class AccountController
{
  private $model;
  function __construct()
  {
    global $pdo;
    $this->model = new User($pdo);
    $this->img = new ImageController();
    $this->mail = new MailController();
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
        $_SESSION['email'] = $user['Email'];
        $_SESSION['status'] = $user['Status'];
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

  function email()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_SESSION['userId'];
      $email = $_POST['email'];
      $token = rand(000000, 999999);
      $isUpdate = $this->model->editEmail($id, $email, $token);
      if ($isUpdate) {
        $_SESSION['status'] = 0;
        $_SESSION['email'] = $email;
        $message = $this->url() . "/TDK_PetShop_PHP/?r=xacthuc&token=" . $token . "&id=" . $id;
        $message = "Nhấp vào link sau để xác thực: " . $message;
        $this->mail->sendMail($email, "Xác thực email", $message);
        header('Location: ?r=edituser');
      } else {
        echo "ERROR UPDATE USER!!";
      }
    } else {
      require_once('views/account/email.php');
    }
  }
  function url()
  {
    return sprintf(
      "%s://%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
    );
  }
  function xacthuc()
  {
    $id = $_GET['id'];
    $token = $_GET['token'];
    $user = $this->model->findById($id);
    if (!empty($user)) {
      if ($token == $user['Token']) {
        $isStatus = $this->model->updateStatus($id);
        if ($isStatus) {
          $_SESSION['status'] = 1;
          echo '<script language="javascript">alert("Xác thực thành công!!!")</script>';
          Header("Refresh: 0; url='?r=edituser'");
        }
      }
    }
  }

  function forgotPass()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      //$pass = $_POST['password'];
      //$confirm = $_POST['confirmPass'];
      $user = $this->model->find($username);
      if (empty($user)) {
        echo '<script language="javascript">alert("Username is not Exists")</script>';
        Header("Refresh: 0; url='?r=forgotPass'");
        exit;
      }
      if ($user['Email'] != NULL && $user['Status'] == 1) {
        $token = rand(000000, 999999);
        $message = "Mã Xác Thực: " . $token;
        $isToken = $this->model->newToken($user['Id'], $token);
        if ($isToken) {
          $this->mail->sendMail($user['Email'], "Forgot Password", $message);
          header('Location: ?r=nhaptoken&id=' . $user['Id']);
        }
      } else {
        echo '<script language="javascript">alert("Bạn chưa xác thực Email!! Bạn không thể tìm lại mật khẩu")</script>';
        Header("Refresh: 0; url='?r=forgotPass'");
        exit;
      }
    } else {
      require_once('views/account/forgotpassword.php');
    }
  }

  function nhaptoken()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $pass = $_POST['password'];
      $confirm = $_POST['confirmPass'];
      $token = $_POST['token'];
      $user = $this->model->findById($id);
      if ($pass != $confirm) {
        echo '<script language="javascript">alert("Pass and Confirm Pass not match!!!")</script>';
        Header("Refresh: 0; url='?r=forgotPass'");
        exit;
      }
      if ($user['Token'] != $token) {
        echo '<script language="javascript">alert("Mã xác thực không đúng")</script>';
        Header("Refresh: 0; url='?r=forgotPass'");
        exit;
      }
      $hashPass = password_hash($pass, PASSWORD_BCRYPT);
      $isSuccess = $this->model->updatePass($id, $hashPass);
      if ($isSuccess) {
        echo '<script language="javascript">alert("Success")</script>';
        Header("Refresh: 0; url='?r=login'");
      } else {
        echo '<script language="javascript">alert("404 Error!!")</script>';
        Header("Refresh: 0; url='?r=forgotPass'");
      }
    } else {
      $id = $_GET['id'];
      require_once('views/account/nhaptoken.php');
    }
  }
}
?>