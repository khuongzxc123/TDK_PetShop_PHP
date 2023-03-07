<?php

    class User{
        private $db;

        function __construct($pdo) {
            $this -> db = $pdo;
        }

        function find($userName){
        
            $sql = "SELECT * FROM user WHERE UserName=:username" ;
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $userName);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function edituser($id, $temp, $fullname){
            $sql = "UPDATE user SET Avata=:temp,FullName=:fullname WHERE Id=:id" ;
            $stmt = $this -> db -> prepare($sql);
            return $stmt -> execute(array(
            ':temp' => $temp,
            ':id' => $id,
            ':fullname' => $fullname
        ));
        }
        function addUser($username, $hashPass){
            $stmt = $this -> db -> prepare("INSERT INTO user(UserName,Pass) VALUES (:username,:pass)");
            return $stmt -> execute(array(
                ':username' => $username,
                ':pass' => $hashPass,
            ));
        }
    }
?>