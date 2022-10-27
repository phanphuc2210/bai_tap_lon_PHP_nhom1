<?php 
session_start(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>	
	<!-- Bootstrap CSS -->
	<link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/includes/style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<!-- Code mẫu -->
	<!-- <div id="header">
		<h1>Your Website</h1>
		<h2>catchy slogan...</h2>
	</div> -->
	<!-- <div id="navigation">
		<ul>
			<li><a href="index.php">Home Page</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="view_users.php">View Users</a></li>
			<li><a href="password.php">Change Password</a></li>
			<li><a href="#">link five</a></li>
		</ul>
	</div> -->
	
	<?php 
	$path_array = explode('/', $_SERVER['PHP_SELF']);
	
	// Phải đăng nhập thì mới có thể truy cập
	$isLogin = isset($_SESSION['isLogin'])? $_SESSION['isLogin'] : false;
	$username = isset($_SESSION['Username'])? $_SESSION['Username'] : '';
	if($path_array[1] == 'exercises' && $isLogin == false) {
		header("Location: /login.php");
	}
	?>
	<nav class="navbar navbar-expand-lg bg-light py-1">
		<div class="container">
			<a class="navbar-brand" href="/"><h3 class="fw-bold text-origin">Nhóm 1</h3></a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav fw-bold">
					<li class="nav-item">
						<a class="nav-link <?php echo $path_array[1] == 'index.php'? 'active' : ''; ?>" aria-current="page" href="/">Trang chủ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Thông tin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $path_array[1] == 'exercises'? 'active' : ''; ?>" href="/exercises">Bài tập</a>
					</li>
					<li class="nav-item">
						<a class="nav-link">Web demo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link">Trợ giúp</a>
					</li>
				</ul>
			</div>
			<?php 
			if($_SESSION['isLogin']) {
				echo "<div class='d-flex align-items-center'>
						<img style='width: 40px;' class='rounded-circle' src='../Images/avatar.jpg' alt='avatar'>
						<span class='ms-1'>Chào, ". $username ."!</span>
						<a href='/logout.php' class='btn btn-outline-dark btn-sm ms-2'>Đăng xuất</a>
					</div>";
			} else {
				echo "<a href='/login.php' class='btn btn-dark btn-sm'>Đăng nhập</a>";
			}
			?>
		</div>
	</nav>

	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 9.1 - header.php -->