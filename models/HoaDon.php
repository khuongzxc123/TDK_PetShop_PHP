<?php

    class HoaDon{
        private $db;

        function __construct($pdo) {
            $this -> db = $pdo;
        }
        function addHoaDon($hoaDonId, $day, $userId, $total){
            $stmt = $this -> db -> prepare("INSERT INTO hoadon(Id,Day,UserId,Total) VALUES (:id,:day,:userid,:total)");
            return $stmt -> execute(array(
                ':id' => $hoaDonId,
                ':day' => $day,
                ':userid' => $userId,
                ':total' => $total
            ));
        }
        function addCTHD($hoaDonId, $productId, $soluong){
            $stmt = $this -> db -> prepare("INSERT INTO chitiethoadon(HoaDonId,ProductId,Quantity) VALUES (:hoadonid,:productid,:soluong)");
            return $stmt -> execute(array(
                ':hoadonid' => $hoaDonId,
                ':productid' => $productId,
                ':soluong' => $soluong
            ));
        }
    }
?>