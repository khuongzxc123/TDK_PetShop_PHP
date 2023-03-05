<?php

    class Product{
        private $db;

        function __construct($pdo) {
            $this -> db = $pdo;
        }
        function addProduct($name, $gia, $temp){
             $stmt = $this -> db -> prepare("INSERT INTO product(Name,Price,Image) VALUES (:name,:price,:temp)");
             $stmt -> execute(array(
                ':name' => $name,
                ':price' => $gia,
                ':temp' => $temp
            ));
        }

        function getAllProduct(){
            $stmt = $this->db->prepare("select * from product");
            $stmt->execute();
            $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $danhSach;
        }
    }
?>