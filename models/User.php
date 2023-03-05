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
        function edituser($id, $temp){
            $sql = "UPDATE user SET Avata=:temp WHERE Id=:id" ;
            $stmt = $this -> db -> prepare($sql);
            return $stmt -> execute(array(
            ':temp' => $temp,
            ':id' => $id
        ));
        }
    }
?>