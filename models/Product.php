<?php

class Product
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }
    function addProduct($name, $gia, $temp, $donvi)
    {
        $stmt = $this->db->prepare("INSERT INTO product(Name,Price,Image,Unit) VALUES (:name,:price,:temp,:donvi)");
        $stmt->execute(
            array(
                ':name' => $name,
                ':price' => $gia,
                ':temp' => $temp,
                ':donvi' => $donvi
            )
        );
    }

    function getAllProduct()
    {
        $stmt = $this->db->prepare("select * from product");
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
}
?>