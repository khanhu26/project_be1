<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";
$user = new User;
?>
<head>
    <title>Mobile Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        ul.pagination {
            list-style: none;
            float: right;
        }

        ul.pagination li.active {
            font-weight: bold
        }

        ul.pagination li {
            float: left;
            display: inline-block;
            padding: 10px
        }
    </style>
</head>

<body>
    <!--Header-part-->
    <div id="header">
        <h1><a href="index.php"><img src="../images/logo.png" alt=""></a></h1>
    </div>
    <!--close-Header-part-->
    <!--top-Header-menu-->
    <?php require_once "element_navbar.php"; ?>
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="Search here..." />
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
        <ul>
            <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
            <li> <a href="manufactures.php"><i class="icon icon-th-list"></i> <span>Manufactures</span></a></li>
            <li> <a href="protypes.php"><i class="icon icon-th-list"></i> <span>Product type</span></a></li>
            <li> <a href="users.php"><i class="icon icon-th-list"></i> <span>Users</span></a></li>

        </ul>
    </div><!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i
                        class="icon-home"></i> Home</a></div>
            <h1>Manage User</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="<?php
                            if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
                                echo "form.php?functionType=users";
                            }
                         ?>"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Users</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $page = 1;
                                        $resultsPerPage = 5;
                                        $totalResults = count(User::getAllUsers());
                                        // $totalLinks = ceil($totalResults/$resultsPerPage);
                                        if(isset($_GET['page'])==TRUE) {
                                            $page = $_GET['page'];
                                        }
                                        $list_of_users = User::getAllUsers_andCreatePagination($page, $resultsPerPage);

                                        // Output:
                                        echo "<p style=\"text-align:center;\"><b>There are $totalResults results.</b></p>";
                                        if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
                                        foreach ($list_of_users as $key => $value) {
                                    ?>
                                    <tr class="">
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['password']; ?></td>
                                        <td><?php if($value['role']==1){echo "Super admin";}else{echo "Admin";} ?></td>
                                        <td>
                                            <a href="edit.php" class="btn btn-success btn-mini">Edit</a>
                                            <a href="delete-user.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }else{
                                        foreach ($list_of_users as $key => $value) {
                                            if($_SESSION['user']['id'] == $value['id']){
                                    ?>
                                        <tr class="">
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['password']; ?></td>
                                        <td><?php if($value['role']==1){echo "Super admin";}else{echo "Admin";} ?></td>
                                        <td>
                                            <a href="edit.php" class="btn btn-success btn-mini">Edit</a>
                                            <a href="delete-user.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }}}?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <?php
                                        echo User::paginate("users.php?", $page, $totalResults, $resultsPerPage, 1);
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
    </div>
    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>