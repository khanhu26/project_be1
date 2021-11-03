<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
// var_dump($product->getAllFeatureProducts());
?>
<?php require_once "module/head.php"; ?>

<body>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="public/images/logo.png" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <?php
                            require_once "module/navlinks.php";
                            require_once "module/searchbox.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php
                        require_once "module/sidebar.php";
                    ?>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!-- Lấy danh sách sản phẩm theo tên hãng sản phẩm: iPhone, Samsung, Oppo,...  -->
                        <?php
                            if(isset($_GET['manu_id']) == TRUE) {
                                $page = 1;
                                $resultsPerPage = 6;
                                $totalResults = count(Product::getProductsByManuID($_GET['manu_id']));
                                if(isset($_GET['page']) == TRUE) {
                                    $page = $_GET['page'];
                                }
                                $p = Product::getProductsByManuID_andCreatePagination($_GET['manu_id'], $page, $resultsPerPage);
                        ?>
                        <h2 class="title text-center"> <?php echo Manufacture::getBrand($_GET['manu_id'])['manu_name']; ?> </h2>
                        <p style="text-align:center;"><b>There are <?php echo $totalResults; ?> items.</b></p>
                        <?php foreach($p as $k => $v) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="images/<?= $v['pro_image'] ?>"
                                            alt="" />
                                        <h2><?php
                                            echo number_format($v['price']);
                                        ?> đ</h2>
                                        <p><?php echo $v['name']; ?></p>
                                        <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo number_format($v['price']); ?> đ</h2>
                                            <p><a href="detail.php?id=<?php echo number_format($v['price']); ?>"><?php echo $v['name']; ?></a></p>
                                            <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lấy danh sách sản phẩm theo loại sản phẩm: Điện thoại, Laptop,...  -->
                        <?php
                            } }
                            else if(isset($_GET['type_id'])) {
                                $page = 1;
                                $resultsPerPage = 6;
                                $totalResults = count(Product::getProductsByTypeID($_GET['type_id']));
                                if(isset($_GET['page']) == TRUE) {
                                    $page = $_GET['page'];
                                }
                                $p = Product::getProductsByTypeID_andCreatePagination($_GET['type_id'], $page, $resultsPerPage);
                        ?>
                        <h2 class="title text-center"><?php echo Protype::getType($_GET['type_id'])['type_name']; ?></h2>
                        <p style="text-align:center;"><b>There are <?php echo $totalResults; ?> items.</b></p>
                        <?php
                            // Output:
                            foreach($p as $k => $v) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="images/<?= $v['pro_image'] ?>"
                                            alt="" />
                                        <h2><?php
                                             echo number_format($v['price']);
                                        ?> đ</h2>
                                        <p><?php echo $v['name']; ?></p>
                                        <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($v['price']); ?> đ</h2>
                                            <p><a href="detail.php?id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a></p>
                                            <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            } }
                        ?>
                    </div>
                </div>
            </div>
            <div style="text-align:center; padding:30px;">
                <?php
                    if(isset($_GET['type_id']) == TRUE) {
                        echo Product::paginate("cate.php?type_id=" . $_GET['type_id'] . "&", $page, $totalResults, $resultsPerPage, 1);
                    }
                    else if(isset($_GET['manu_id']) == TRUE) {
                        echo Product::paginate("cate.php?manu_id=" . $_GET['manu_id'] . "&", $page, $totalResults, $resultsPerPage, 1);
                    }
                ?>
            </div>
        </div>
    <section>
</body>