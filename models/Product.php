<?php

class Product
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }
    function addProduct($name, $gia, $temp, $donvi, $loai)
    {
        $stmt = $this->db->prepare("INSERT INTO product(Name,Price,Image,Unit,CategoryId) VALUES (:name,:price,:temp,:donvi,:loai)");
        $stmt->execute(
            array(
                ':name' => $name,
                ':price' => $gia,
                ':temp' => $temp,
                ':donvi' => $donvi,
                ':loai' => $loai
            )
        );
    }

    function getAllProduct()
    {
        $stmt = $this->db->prepare("SELECT product.Id, product.Name, product.Price, product.Image, product.Unit, category.CateName, product.Quantity
            FROM product INNER JOIN category
            ON product.CategoryId = category.Id");
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
    
    function getAllProductCategory($category)
    {
        $stmt = $this->db->prepare("select * from product where CategoryId=:c");
        $stmt->bindParam(':c', $category);
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
    function find($Id)
    {
        $sql = "SELECT * FROM product WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $Id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function editProduct($id, $tmp, $Name, $Unit, $Price)
    {
        $sql = "UPDATE product SET Image=:tmp,Name=:name,Unit=:unit,Price=:price WHERE Id=:id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(
            array(
                ':tmp' => $tmp,
                ':id' => $id,
                ':name' => $Name,
                ':unit' => $Unit,
                ':price' => $Price
            )
        );
    }

    function getAllCategory(){
        $stmt = $this->db->prepare("select * from category");
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
    function findCategory($id){
        $sql = "SELECT * FROM category WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function addCategory($name){
        $stmt = $this->db->prepare("INSERT INTO category(CateName) VALUES (:name)");
        return $stmt->execute(
            array(
                ':name' => $name
            )
        );
    }
    function editCategory($id, $name){
        $sql = "UPDATE category SET CateName=:name WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(               
                ':id' => $id,
                ':name' => $name,
            )
        );
    }
}
?>