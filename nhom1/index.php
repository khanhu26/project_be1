<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $getProductById = $product->getProductByID($id);
}
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
                        <h2 class="title text-center">3 Featured Items</h2>
                        <?php
                            $i = 0;
                            $arr_of_items = Product::getAllFeaturedProducts();
                            // var_dump($arr_of_items);
                            foreach($arr_of_items as $k => $v) {
                                if($i == 3) {
                                    break;
                                }
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="images/<?= $v['pro_image']?>"
                                            alt="" />
                                        <h2><?php
                                            echo number_format( $v['price']);
                                        ?> đ</h2>
                                        <p><?php echo $v['name']; ?></p>
                                        <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo number_format( $v['price']); ?> đ</h2>
                                            <p><a href="detail.php?id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a></p>
                                            <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                $i++;
                            }
                        ?>
                    </div>
                    <div class="newest_items">
                        <h2 class="title text-center">3 Newest Items</h2>
                        <?php
                            $i = 0;
                            $arr_of_items = Product::get3NewestProducts();
                            // var_dump($arr_of_items);
                            foreach($arr_of_items as $k => $v) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="images/<?=  $v['pro_image'] ?>"
                                            alt="" />
                                        <h2><?php
                                            echo number_format( $v['price']);
                                        ?> đ</h2>
                                        <p><?php echo $v['name']; ?></p>
                                        <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo number_format( $v['price']); ?> đ</h2>
                                            <p><a href="detail.php?id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a></p>
                                            <a href="cart.php?p=<?=  $v['id']?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <?php require_once "module/footer.php"; ?>                  
</body>

</html>