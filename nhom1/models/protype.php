<?php
class Protype extends Db {
    //Lấy loại:
    static function getType($type_id) {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $type = $sql->get_result()->fetch_assoc();
        return $type;
    }

    //Lấy tên loại:
    static function getTypeName($type_id) {
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $type = $sql->get_result()->fetch_assoc();
        return $type['type_name'];
    }

    //Lấy ra tất cả loại sản phẩm.
    static function getAllProductTypes() {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
}