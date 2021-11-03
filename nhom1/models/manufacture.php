<?php
class Manufacture extends Db {
    //Lấy nhãn hiệu:
    static function getBrand($manu_id) {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $brand = $sql->get_result()->fetch_assoc();
        return $brand;
    }
    //Lấy ra tất cả nhãn hiệu sản phẩm.
    static function getAllProductBrands() {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
}
