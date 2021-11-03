<ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="index.php" class="active">Home</a></li>
    <li class="dropdown"><a href="index.php">Products<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
            <?php
                $types = Protype::getAllProductTypes();
                foreach($types as $k => $v) {
            ?>
                <li><a href="cate.php?type_id=<?php echo $v['type_id']; ?>"><?php echo $v['type_name']; ?></a></li>
            <?php
                }
            ?>
        </ul>
    </li>
    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
            <li><a href="#">Blog List</a></li>
            <li><a href="#">Blog Single</a></li>
        </ul>
    </li>
    <li><a href="#">Contact</a></li>
    <li><a href="cart.php?">Cart</a></li>
</ul>