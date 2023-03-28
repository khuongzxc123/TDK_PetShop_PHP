<?php

class HoaDon
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }
    function addHoaDon($hoaDonId, $day, $userId, $total, $diaChi)
    {
        $stmt = $this->db->prepare("INSERT INTO hoadon(Id,Day,UserId,Total,Address) VALUES (:id,:day,:userid,:total,:diachi)");
        return $stmt->execute(
            array(
                ':id' => $hoaDonId,
                ':day' => $day,
                ':userid' => $userId,
                ':total' => $total,
                ':diachi' => $diaChi
            )
        );
    }
    function addCTHD($hoaDonId, $productId, $soluong)
    {
        $stmt = $this->db->prepare("INSERT INTO chitiethoadon(HoaDonId,ProductId,Quantity) VALUES (:hoadonid,:productid,:soluong)");
        return $stmt->execute(
            array(
                ':hoadonid' => $hoaDonId,
                ':productid' => $productId,
                ':soluong' => $soluong
            )
        );
    }
    function giamSLProduct($id, $sl)
    {
        $sql = "UPDATE product SET Quantity=(Quantity-:sl) WHERE Id=:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(
            array(
                ':id' => $id,
                ':sl' => $sl
            )
        );
    }
    function getAllHoaDon()
    {
        $stmt = $this->db->prepare("SELECT hoadon.Id, hoadon.Day, hoadon.Total, user.FullName, hoadon.Address
            FROM hoadon INNER JOIN user
            ON hoadon.UserId = user.Id");
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }

    function getUserHoaDon($userId){
        $stmt = $this->db->prepare("SELECT hoadon.Id, hoadon.Day, hoadon.Total, user.FullName, hoadon.Address
            FROM hoadon INNER JOIN user
            ON hoadon.UserId = user.Id
            WHERE hoadon.UserId=:id");
        $stmt->execute(array(
            ':id' => $userId,
        ));
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
    function getCTHD($hoaDonId)
    {
        $stmt = $this->db->prepare("SELECT chitiethoadon.Quantity, product.Name, product.Image, Product.Price
            FROM chitiethoadon INNER JOIN product
            ON chitiethoadon.ProductId = product.Id
            WHERE chitiethoadon.HoaDonId = :hoadonid");
        $stmt->bindParam(':hoadonid', $hoaDonId);
        $stmt->execute();
        $danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $danhSach;
    }
}
?>