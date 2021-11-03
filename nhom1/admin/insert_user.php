<?php
require_once "config.php";
require_once "models/db.php";
require_once "models/product.php";
require_once "models/manufacture.php";
require_once "models/protype.php";
require_once "models/user.php";
$user = new User;
?>
<?php
    $insertResult = -1;

    if(isset($_GET['username'])==TRUE) {
        $insertResult = User::insertUser($_GET['username'], password_hash($_GET['password'], PASSWORD_DEFAULT), $_GET['role']);
    }
    header("Location: form.php?functionType=users&insertResult=$insertResult");
?>