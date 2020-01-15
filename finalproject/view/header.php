<?php
if (isset($_POST["out"])) {
	session_destroy();
	header("location: login.php");
}
if (isset($_POST["post"])) {
	header("location: post.php");
}
if (isset($_POST["home"])) {
	header("location: userinterface.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/theme.css">
</head>
<body>
	<header class="container-xl">
		<h1>JoyFul - Enjoy your day</h1>
		<div class="flex">
			<button><a href="profile.php"><i class="far fa-user-circle"></i></a></button>
			<button onclick="Clicked()"><i class="far fa-paper-plane"></i></button>
		</div>
	</header>
	<form id="bar" method="post">
		<div class="container-xl" style="background: linear-gradient(to right, #F4662B 0%, #E93F5C 100%); ">
			<div style="text-align:center;align-items: center;display: grid;grid-template-columns: auto auto auto auto auto;color: white;font-size: 30px;padding: 10px 20px;">
				<button name="home"><i class="fas fa-home"></i></button>
				<button name="post"><i class="fas fa-plus-square"></i></button>
				<div class="search-box" style="text-align:center;align-items: center;display: grid;grid-template-columns: auto auto;">
					<input type="text" name="find">
					<button type="submit"><i class="fas fa-search"></i></button>
				</div>
				<button><i class="fas fa-chart-line"></i></button>
				<button name="out"><i class="fas fa-sign-out-alt"></i></button>
			</div>
		</div>
	</form>
<body>
</html>