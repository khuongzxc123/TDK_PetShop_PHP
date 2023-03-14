<?php

class User
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }

    function find($userName)
    {

        $sql = "SELECT * FROM user WHERE UserName=:username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $userName);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function edituser($id, $temp, $fullname)
    {
        $sql = "UPDATE user SET Avata=:temp,FullName=:fullname WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':temp' => $temp,
                ':id' => $id,
                ':fullname' => $fullname
            )
        );
    }
    function addUser($username, $hashPass)
    {
        $stmt = $this->db->prepare("INSERT INTO user(UserName,Pass) VALUES (:username,:pass)");
        return $stmt->execute(
            array(
                ':username' => $username,
                ':pass' => $hashPass,
            )
        );
    }
    function getAllAccount()
    {
        $stmt = $this->db->prepare("select * from user");
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
    function editEmail($id, $email, $token){
        $sql = "UPDATE user SET Email=:email,Token=:token,Status=0 WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':email' => $email,
                ':id' => $id,
                ':token' => $token
            )
        );
    }
    function findById($id)
    {
        $sql = "SELECT * FROM user WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updateStatus($id){
        $sql = "UPDATE user SET Status=1 WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':id' => $id
            )
        );
    }

    function newToken($id, $token){
        $sql = "UPDATE user SET Token=:token WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':id' => $id,
                ':token' => $token
            )
        );
    }

    function updatePass($id, $pass){
        $sql = "UPDATE user SET Pass=:pass WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':id' => $id,
                ':pass' => $pass
            )
        );
    }
}
?>