<?php
class Product extends Db {






    /**____________________________________________________________________________________________________
     * LẤY DỮ LIỆU BẢNG products:
     */
    static function getAllProducts() {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



/**____________________________________________________________________________________________________
     * Lấy sản phẩm theo id:
     */
    static function getProductByID($id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $item = $sql->get_result()->fetch_assoc();
        return $item;
    }






    
    /**____________________________________________________________________________________________________
     * Lấy ra tất cả sản phẩm nổi bật.
     */
    static function getAllFeaturedProducts() {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }


    

    /**____________________________________________________________________________________________________
     * Lấy ra 3 sản phẩm mới nhất:
     */
    static function get3NewestProducts() {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 0,3");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * LẤY DANH SÁCH SẢN PHẨM CÙNG HÃNG:
     */
    //Lấy ra các sản phẩm cùng một hãng:
    static function getProductsByManuID($manu_id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    //Lấy ra các sản phẩm cùng một hãng và Phân trang:
    static function getProductsByManuID_andCreatePagination($manu_id, $page, $resultsPerPage) {
        //Tính xem nên bắt đầu hiển thị từ trang có số thứ tự là bao nhiêu:
        $firstLink = ($page - 1) * $resultsPerPage; //(Trang hiện tại - 1) * (Số kết quả hiển thị trên 1 trang).
        //Dùng LIMIT để giới hạn số lượng kết quả được hiển thị trên 1 trang:
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ? LIMIT $firstLink, $resultsPerPage");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * LẤY DANH SÁCH SẢN PHẨM CÙNG LOẠI:
     */
    //Lấy ra các sản phẩm cùng một loại:
    static function getProductsByTypeID($type_id) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    //Lấy ra các sản phẩm cùng một loại và Phân trang:
    static function getProductsByTypeID_andCreatePagination($type_id, $page, $resultsPerPage) {
        //Tính xem nên bắt đầu hiển thị từ trang có số thứ tự là bao nhiêu:
        $firstLink = ($page - 1) * $resultsPerPage; //(Trang hiện tại - 1) * (Số kết quả hiển thị trên 1 trang).
        //Dùng LIMIT để giới hạn số lượng kết quả được hiển thị trên 1 trang:
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT $firstLink, $resultsPerPage");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }



    /**____________________________________________________________________________________________________
     * SEARCHING:
     */
    //(SEARCHING) Tìm kiếm sản phẩm:
    static function searchProduct($keyword) {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE name like '%$keyword%'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    //(SEARCHING + Paging/Pagination) Tìm kiếm sản phẩm và Phân trang:
    static function searchProduct_andCreatePagination($keyword, $page, $resultsPerPage) {
        //Tính xem nên bắt đầu hiển thị từ trang có số thứ tự là bao nhiêu:
        $firstLink = ($page - 1) * $resultsPerPage; //(Trang hiện tại - 1) * (Số kết quả hiển thị trên 1 trang).
        //Dùng LIMIT để giới hạn số lượng kết quả được hiển thị trên 1 trang:
        $sql = self::$connection->prepare("SELECT * FROM products WHERE name like '%$keyword%' LIMIT $firstLink, $resultsPerPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
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
            $prevLink = "<a class=\"pagination_link\" href='$url" . "page=$prev'>< Lùi</a>";
            $firstLink = "<a class=\"pagination_link\" href='$url" . "page=1'><< Đầu</a>";
        }
        if($page < $totalLinks) {
            $next = $page + 1;
            $nextLink = "<a class=\"pagination_link\" href='$url" . "page=$next'>Tiếp ></a>";
            $lastLink = "<a class=\"pagination_link\" href='$url" . "page=$totalLinks'>Cuối >></a>";
        }
        // $links:
        for($i=$from; $i<=$to; $i++) {
            if($page == $i) {
                $links = $links . "<a class=\"pagination_link pagination_link_active\" href='$url" . "page=$i'>$i</a>";
            }
            else
            {
                $links = $links . "<a class=\"pagination_link\" href='$url" . "page=$i'>$i</a>";
            }
        }
        return $firstLink . $prevLink . $links . $nextLink . $lastLink;
    }

        //Lấy ra các sản phẩm cùng một loại:
        static function getProductsByID($id) {
            $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items[0]; //return an array.
        }

}