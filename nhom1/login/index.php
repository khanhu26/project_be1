<?php
 ob_start();
require "../config.php";
require "../models/db.php";
require "../admin/models/user.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Space Login Form Flat Responsive Widget Template :: w3layouts</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- css files -->

<!-- Online-fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //Online-fonts -->

</head>
<body>
<?php 
	if(isset($_SESSION['user'])){
		header("Location: ../admin/index.php");
	}

	if(isset($_POST['username'])){
		$log = new User();
		$user = $log->login($_POST['username']);
		if(count($user) != 0) {
		if(password_verify($_POST['password'], $user[0]['password'])==TRUE) {
			$_SESSION['user'] = $user[0];
			header("Location: ../admin/index.php");
		}else{
				$_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
		}
    }else{
			$_SESSION['error'] = "Tài khoản không tồn tại";
		}
	}
?>
	<!-- main -->
	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3">Login Form</h1>
			<div class="w3layouts-main">
				<h2><span>Login now</span></h2>
				<div class="social">
					<a href="#">Login With Facebook</a>
				</div>
					<h3>---</h3>
					<form action="#" method="post">
						<input placeholder="Username or Email" name="username" type="text" required="">
						<input placeholder="Password" name="password" type="password" required="">
						<div style="text-align: center; color: red;"> 
						<?php
						if(isset($_SESSION['error'])){
							echo $_SESSION['error'];
						}
						unset($_SESSION['error']);?>

						</div>
						<input type="submit" value="Signin" name="login">
					</form>
					<h6><a href="#">Lost Your Password?</a></h6>
			</div>
			<!-- //main -->
			
			<!--footer-->
			<div class="footer-w3l">
				<p>&copy; 2017 Space Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<!--//footer-->
		</div>
	</div>

</body>
</html>