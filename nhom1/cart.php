<?php
    session_start();
    if(!isset($_SESSION['cart'])){
        header("Location: index.php");
    }
?>

<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/protype.php";
require_once "models/manufacture.php";
$product = new Product;
$manufacturer = new Manufacture;
$protype = new Protype;

?>

<?php
    // unset($_SESSION['cart']);
    // unset($_SESSION['totalPriceOfCart']);

    // CHỨC NĂNG CART:
    $unitPrice = 0; // Đơn giá: Số tiền 1 món hàng.
    $price = 0; // Số tiền tính theo số lượng của 1 mặt hàng. 
    $shippingCost = 0;

    // Luôn tính toán lại tổng tiền mỗi khi tải lại trang:
    if(isset($_SESSION['cart'])==TRUE && isset($_SESSION['totalPriceOfCart'])==TRUE) {
        $_SESSION['totalPriceOfCart'] = 0;
        foreach($_SESSION['cart'] as $item => $detail) {
            $product = Product::getProductsByID($detail['id']);
            $_SESSION['cart'][$item]['price'] = ($product['price'] - $product['price']*10/100) * $detail['quantity'];
            $_SESSION['totalPriceOfCart'] += $_SESSION['cart'][$item]['price'];
        }
    }

    // THÊM HÀNG VÀO CART:
    if(isset($_GET['p'])==TRUE) {
        // Nếu khách hàng chưa đặt số lượng hàng thêm vào cart, thì số lượng mặc định là 1.
        $quantity = 1;
        if(isset($_GET['quantity'])==TRUE) {
            $quantity = $_GET['quantity'];
        }

        // Nếu chưa có hàng trong cart, thì tạo cart mới và thêm hàng vào cart:
        if(isset($_SESSION['cart'])==FALSE) {
            // Dữ liệu 1 món hàng trong cart:
            $product = Product::getProductsByID($_GET['p']);
            $unitPrice = number_format(($product['price'] - $product['price']*10/100)); // Giảm 10%.
            $price = $unitPrice * (int)$quantity;
            // Thêm dữ liệu vào mảng cart:
            $arr = array();
            $detail = array("id"=>$_GET['p'], "quantity"=>$quantity, "price"=>$price);
            array_push($arr, $detail);
            $_SESSION['cart'] = $arr;
            // Tạo tổng tiền:
            $_SESSION['totalPriceOfCart'] = number_format($detail['price']);
        }
        else {
            $count = 0; // Để đếm số lượng 1 món hàng.
            foreach($_SESSION['cart'] as $item => $detail) {
                if($detail['id'] == $_GET['p']) {
                    $count++;
                    break;
                }
            }
            // Nếu chưa có hàng trong cart, thì thêm món hàng đó vào cart.
            if($count==0) {
                // Dữ liệu 1 món hàng trong cart:
                $product = Product::getProductsByID($_GET['p']);
                $unitPrice = ($product['price'] - $product['price']*10/100); // Giảm 10%.
                $price = $unitPrice * (int)$quantity;
                // Thêm dữ liệu vào mảng cart:
                $arr = array();
                $detail = array("id"=>$_GET['p'], "quantity"=>$quantity, "price"=>$price);
                array_push($_SESSION['cart'], $detail);
                // Cập nhật tổng tiền:
                $_SESSION['totalPriceOfCart'] += number_format($detail['price']);
            }
        }
    }

    // Khi nhấn nút "UPDATE CART", thì các số lượng của các món hàng sẽ được cập nhật lại:
    if(isset($_SESSION['cart'])==TRUE && isset($_GET['updated_quantity'])==TRUE) {
        // Cập nhật số lượng:
        $i = 0;
        foreach($_SESSION['cart'] as $item => $detail) {
            $product = Product::getProductsByID($detail['id']);
            $_SESSION['cart'][$item]['quantity'] = $_GET['updated_quantity'][$i];
            $_SESSION['cart'][$item]['price'] =  number_format(($product['price'] - $product['price']*10/100) * $detail['quantity']);
            $i++;
        }

        // Cập nhật tổng tiền:
        $_SESSION['totalPriceOfCart'] = 0;
        foreach($_SESSION['cart'] as $item => $detail) {
            $product = Product::getProductsByID($detail['id']);
            $_SESSION['cart'][$item]['price'] = ($product['price'] - $product['price']*10/100) * $detail['quantity'];
            $_SESSION['totalPriceOfCart'] += $_SESSION['cart'][$item]['price'];
        }

        // Nếu số lượng = 0 thì xóa khỏi cart:
        foreach($_SESSION['cart'] as $item => $detail) {
            if($detail['quantity']==0) {
                unset($_SESSION['cart'][$item]);
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="en">
    <?php require_once "module/head.php"; ?>
  <body>
    
    <?php require_once "module/head.php"; ?>
    <?php //require_once "element_brand.php"; ?>
    <?php //require_once "element_navbar.php"; ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">



                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="get" action="cart.php">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_SESSION['cart'])==TRUE) {
                                                foreach($_SESSION['cart'] as $item => $detail) {
                                                    $product = Product::getProductsByID($detail['id']);
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="removeItemFromCart.php?id=<?php echo $detail['id']; ?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail" style="width: 150px;height:auto;">
                                                <a href="detail.php?id=<?php echo $product['id']; ?>"><img style="width:50%;height:auto;" alt="poster_1_up" class="shop_thumbnail" src="images/<?php echo $product['pro_image']; ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="detail.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo number_format(($product['price'] - $product['price']*10/100)); ?> đ</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <!-- <input type="button" class="minus" value="-"> -->
                                                    <input type="number" size="2" class="input-text qty text" title="Qty" value="<?php echo $detail['quantity']; ?>" min="0" step="1" name="updated_quantity[]">
                                                    <!-- <input type="button" class="plus" value="+"> -->
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo number_format($detail['price']); ?> đ</span> 
                                            </td>
                                        </tr>
                                        <?php
                                            } }
                                        ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <!-- <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="">
                                                    <input type="submit" value="Apply Coupon" name="" class="button">
                                                </div> -->
                                                <input type="submit" value="Update cart" name="" class="button">
                                                <!-- <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward"> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>



                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">
                                                <?php if(isset($_SESSION['totalPriceOfCart'])==TRUE) {echo $_SESSION['totalPriceOfCart'];} else {echo 0;} ?> đ</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">
                                                <?php if(isset($_SESSION['totalPriceOfCart'])==TRUE) {echo (int)$_SESSION['totalPriceOfCart'] + (int)$shippingCost;} else {echo 0;} ?> đ</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/js/main.js"></script>
  </body>
</html>