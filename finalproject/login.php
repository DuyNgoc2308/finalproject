<?php
require 'databaseconnect.php';
$sql = "SELECT * from users ";
$users = $db->query($sql)->fetch_all();

session_start();
if(isset($_POST["login"])){
	$_SESSION["un"] = $_POST["username"];
	$_SESSION["pw"] = $_POST["password"];
	for ($i=0; $i < count($users) ; $i++) { 
		if ($_SESSION["un"] == $users[$i][3] && $_SESSION["pw"] == $users[$i][4]) {
			$_SESSION["idAcc"] = $users[$i][0];
			header("location: userinterface.php");
		}else{
			
		}
	}	
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<style type="text/css">
		input{
			text-indent: 15px;
			height: 40px;
			width: 200px;
			border: none;
			background: transparent;
			font-style: italic;
			border-bottom: 1px solid lightgrey;
			color: black;
			font-weight: bold;
			outline: none;
			font-size: 15px;
		}
		.login-form{
			/*width: auto;
			height: auto;
			padding: 10px 30px; */                                       
			background: transparent;
			display: grid;
			align-items: center;
			justify-content: center;
			grid-template-columns: auto;
			color:  #EC494F;
			margin: 100px 100px;
			font-weight: bold;
		}
		.login-form img{
			height: 150px;
			width: 150px;
			border-radius: 75px;
		}
		a{
			color: black;
			font-size: 14px;
		}
		label{
			margin-top: 15px;
			margin-bottom: 15px;
		}
		button{
			margin: 15px 15px;
			height: 30px;
			width: auto;
			border:none;
			border-radius: 10px;
			background: linear-gradient(to bottom, #ff5050 0%, #ff6699 100%);;
			font-weight: bold;
			outline: none;
			color:white;
		}
		button:hover{
			background: linear-gradient(to bottom, #ff5050 0%, #cc0066 100%);
		}
		body{
			background-image: url("images/simple.jpg");
			display: flex;
			font-family: sans-serif;
			justify-content: center;
			align-items: center;
			background-size: cover;
			font-family: Comic Sans MS;
		}
	</style>
</head>
<body>

	<form class="login-form" action="" method="post">
		<img src="images/logo.jpg">
		<h1>Login</h1>
		<label><i class="fas fa-user"></i>&nbspUsername</label>
		<input placeholder="Enter your username" name="username">
		<label><i class="fas fa-key"></i>&nbspPassword</label>
		<input placeholder="Enter your password" type="password" name="password">
		<button name="login" type="submit">LOGIN&nbsp<i class="fas fa-sign-in-alt"></i></button>
		<a href="#">Forgot password?</a>
		<a href="signup.php">Or Signup?</a>
	</form>
</body>
</html>