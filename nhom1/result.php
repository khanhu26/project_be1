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
                <div class="col-sm-12">
                    <div class="features_items">
                        <h2 class="title text-center">Search Result</h2>
                        <?php
                            if(isset($_GET['keyword'])==TRUE) {
                                $page = 1;
                                $resultsPerPage = 3;
                                $totalResults = count(Product::searchProduct($_GET['keyword']));
                                if(isset($_GET['page'])==TRUE) {
                                    $page = $_GET['page'];
                                }
                                $results = Product::searchProduct_andCreatePagination($_GET['keyword'], $page, $resultsPerPage);

                                // Output:
                                echo "<p style=\"text-align:center;\"><b>There are $totalResults results.</b></p>";
                                foreach($results as $k => $v) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="images/<?= $v['pro_image'] ?>"
                                            alt="" />
                                        <h2><?php
                                            echo $v['price'];
                                        ?> đ</h2>
                                        <p><?php echo $v['name']; ?></p>
                                        <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo $v['price']; ?> đ</h2>
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
                    <!-- Page links: -->
                    <hr>
                    <div style="text-align:center; padding:30px;">
                        <form action="" method="get"></form>
                        <?php
                            if(isset($_GET['keyword']) == TRUE) {
                                echo Product::paginate("result.php?keyword=" . $_GET['keyword'] . "&", $page, $totalResults, $resultsPerPage, 1);
                                // echo Product::paginate($_SERVER['PHP_SELF'] . "?keyword=" . $_GET['keyword'] . "&", $page, $totalResults, $resultsPerPage);
                            }
                            else {
                                echo "<p><b>YOU SEARCH NOTHING!</b></p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>