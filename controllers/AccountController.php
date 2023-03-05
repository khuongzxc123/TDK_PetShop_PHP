<?php
require_once('configs/database.php');
require_once('models/User.php');

class AccountController{
    private $model;
    function __construct(){
        global $pdo;
       $this->model = new User($pdo);
    }

    function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $userName = $_POST['username'];
            $pass = $_POST['password'];
            if(empty($userName) || empty($pass)){
                echo "<script type='text/javascript'>alert('USERNAME or PASSWORD khong duoc nhap!!!');</script>";
                exit;
            }
            // $hashPass = password_hash($pass,PASSWORD_BCRYPT);
            $user = $this->model->find($userName);
            if(password_verify($pass, $user['Pass'])){
                $_SESSION['userId'] = $user['Id'];
                $_SESSION['userName'] = $user['UserName'];
                $_SESSION['avata'] = $user['Avata'];
                header('Location: ?r=/');
                exit;
            }
            else{
                $_SESSION['error'] = 'Invalid User!';
                header("Location: ?r=login");
                exit;
            }
            exit;
        }
        require_once('views/account/login.php');
    }
    function logout(){
        session_destroy();
        header('Location: ?r=/');
    }
    function edituser(){
        session_start();
        $filename = "assets/img/avata/".$_SESSION['avata'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            if($_FILES["image"]["error"] === 4){
              echo
              "<script> alert('Image Does Not Exist'); </script>"
              ;
            }
            else{
              $fileName = $_FILES["image"]["name"];
              $fileSize = $_FILES["image"]["size"];
              $tmpName = $_FILES["image"]["tmp_name"];
          
              $validImageExtension = ['jpg', 'jpeg', 'png'];
              $imageExtension = explode('.', $fileName);
              $imageExtension = strtolower(end($imageExtension));
              if ( !in_array($imageExtension, $validImageExtension) ){
                echo
                "
                <script>
                  alert('Invalid Image Extension');
                </script>
                ";
              }
              else if($fileSize > 10000000){
                echo
                "
                <script>
                  alert('Image Size Is Too Large');
                </script>
                ";
              }
              else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, 'assets/img/avata/' . $newImageName);
                $isUpdate = $this->model->edituser($id, $newImageName);
                if($isUpdate){
                    if(file_exists($filename) && $filename != 'assets/img/avata/defaut_avata.png')
                    {
                        unlink($filename);
                    }
                    header('Location: ?r=/');
                    $_SESSION['avata'] = $newImageName;
                }else{
                    echo "ERROR UPDATE USER!!";
                }
              }
            }
          }
        require_once('views/account/edituser.php');
    }
}
?>
