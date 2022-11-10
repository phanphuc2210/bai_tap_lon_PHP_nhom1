<?php 
session_start(); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>	
	<!-- Bootstrap CSS -->
	<link 
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
		rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
		crossorigin="anonymous"
	>
	<!-- Bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="./includes/style.css" type="text/css" media="screen" />
	<!-- AOS CSS -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<!-- AOS JS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://kit.fontawesome.com/8973f61f8c.js" crossorigin="anonymous"></script>
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
	// Phải đăng nhập thì mới có thể truy cập
	$isLogin = isset($_SESSION['isLogin'])? $_SESSION['isLogin'] : false;
	$username = isset($_SESSION['Username'])? $_SESSION['Username'] : '';
	// if($path_array[1] == 'exercises' && $isLogin == false) {
	// 	header("Location: /authentication/login.php");
	// }
	?>
	<nav class="navbar navbar-expand-lg bg-light py-0">
		<div class="container">
			<a href="./"><h4 class="fw-bold text-origin mb-0">Nhóm 1</h4></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav fw-bold">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="./">Trang chủ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./exercise.php">Bài tập</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./website/">Web demo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./contact.php">Liên hệ</a>
					</li>
				</ul>
			</div>
			<?php 
			if($isLogin) {
				echo "<div class='d-flex align-items-center'>
						<img style='width: 32px;' class='rounded-circle' src='./Images/avatar.jpg' alt='avatar'>
						<span class='ms-1'>Chào, ". $username ."!</span>
						<a href='./logout.php' class='btn btn-outline-dark btn-sm ms-2'>Đăng xuất</a>
					</div>";
			} else {
				echo "<a href='./login.php' class='btn btn-dark btn-sm'>Đăng nhập</a>";
				echo "<a href='./signin.php' class='btn btn-dark btn-sm ms-2'>Đăng ký</a>";
			}
			?>
		</div>
	</nav>

	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 9.1 - header.php -->