<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        <?php
            $types = Manufacture::getAllProductBrands();
            foreach($types as $k => $v) {
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="cate.php?manu_id=<?php echo $v['manu_id']; ?>"><?php echo $v['manu_name']; ?></a></h4>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>