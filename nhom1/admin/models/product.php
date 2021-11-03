<?php
class Product extends Db {



    /**____________________________________________________________________________________________________
     * LẤY DỮ LIỆU BẢNG products:
     */
    //Lấy danh sách tất cả sản phẩm:
    static function getAllProducts() {
        $sql = self::$connection->prepare("SELECT * FROM products order by id desc");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    //Lấy danh sách tất cả sản phẩm và Phân trang:
    static function getAllProducts_andCreatePagination($page, $resultsPerPage) {
        //Tính xem nên bắt đầu hiển thị từ trang có số thứ tự là bao nhiêu:
        $firstLink = ($page - 1) * $resultsPerPage; //(Trang hiện tại - 1) * (Số kết quả hiển thị trên 1 trang).
        //Dùng LIMIT để giới hạn số lượng kết quả được hiển thị trên 1 trang:
        $sql = self::$connection->prepare("SELECT * FROM products order by created_at desc LIMIT $firstLink, $resultsPerPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * LẤY SẢN PHẨM THEO id:
     */
    static function getProduct_ByID($id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = $sql->get_result()->fetch_assoc();
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * LẤY DANH SÁCH SẢN PHẨM THEO manu_id:
     */
    static function getProducts_ByManuID($manu_id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id like ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }




    /**____________________________________________________________________________________________________
     * LẤY DANH SÁCH SẢN PHẨM THEO type_id:
     */
    static function getProducts_ByTypeID($type_id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id like ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * XÓA SẢN PHẨM THEO id:
     */
    static function deleteProductByID($id) {
        $sql = self::$connection->prepare("DELETE FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }



    /**____________________________________________________________________________________________________
     * THÊM SẢN PHẨM:
     */
    static function insertProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at) {
        $sql = self::$connection->prepare("INSERT INTO products(id, name, manu_id, type_id, price, pro_image, description, feature, created_at) VALUES(0, '$name', $manu_id, $type_id, $price, '$pro_image', '$description', $feature, '$create_at')");
        return $sql->execute();
    }



    /**____________________________________________________________________________________________________
     * SỬA SẢN PHẨM:
     */
    static function updateProduct($id, $name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at) {
        $sql = self::$connection->prepare("UPDATE products SET name='$name', manu_id=$manu_id, type_id=$type_id, price=$price, pro_image='$pro_image', description='$description', feature=$feature, created_at='$create_at' WHERE id=$id");
        return $sql->execute();
    }



    /**____________________________________________________________________________________________________
     * PAGINATE: ĐÁNH SỐ TRANG, TẠO LINK TỚI CÁC TRANG.
     */
    static function paginate($url, $page, $totalResults, $resultsPerPage, $offset) {
        $totalLinks = ceil(floatval($totalResults)/floatval($resultsPerPage));
        $links = "";

        $from = $page - $offset;
        $to = $page + $offset;
        if($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if($to > $totalLinks) {
            $to = $totalLinks;
        }

        $firstLink = "";
        $lastLink = "";
        $prevLink = "";
        $nextLink = "";
        // Trường hợp để xuất hiện $firstLink, $lastLink, $prevLink, $nextLink:
        if($page > 1) {
            $prev = $page - 1;
            $prevLink = "<a style=\"padding:10px;\" href='$url" . "page=$prev'>< Lùi</a>";
            $firstLink = "<a style=\"padding:10px;\" href='$url" . "page=1'><< Đầu</a>";
        }
        if($page < $totalLinks) {
            $next = $page + 1;
            $nextLink = "<a style=\"padding:10px;\" href='$url" . "page=$next'>Tiếp ></a>";
            $lastLink = "<a style=\"padding:10px;\" href='$url" . "page=$totalLinks'>Cuối >></a>";
        }
        // $links:
        for($i=$from; $i<=$to; $i++) {
            if($page == $i) {
                $links = $links . "<a style=\"padding:10px;text-decoration:underline;color:red;font-weight:bold;\" href='$url" . "page=$i'>$i</a>";
            }
            else
            {
                $links = $links . "<a style=\"padding:10px;\" href='$url" . "page=$i'>$i</a>";
            }
        }
        return $firstLink . $prevLink . $links . $nextLink . $lastLink;
    }
}