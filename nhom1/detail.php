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
                <?php
                    if(isset($_GET['id']) == TRUE) {
                        $v = Product::getProductByID($_GET['id']);
                        // var_dump($v);
                ?>
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="images <?php echo "/" . $v['pro_image']; ?>"
                                    alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2><?php echo $v['name']; ?></h2>
                                <span>
                                    <span><?php echo number_format($v['price']); ?> đ</span>
                                    <label>Quantity:</label>
                                    <input type="text" value="3" />
                                    <br>
                                    <a href="cart.php?p=<?=  $v['type_id']?>" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> <?php echo Manufacture::getBrand($v['manu_id'])['manu_name']; ?></p>
                                <p><b>Description:</b> <?php echo $v['description']; ?></p>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->
                    <!--features_items-->
                </div>
                <?php
                    }
                ?>
            </div>
    </section>
    <?php require_once "module/footer.php"; ?>
</body>

</html>