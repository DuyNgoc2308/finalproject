<?php
require '../model/databaseconnect.php';
require '../model/user.php';
// $sql = "SELECT * from users ";
// $users = $db->query($sql)->fetch_all();

session_start();
if(isset($_POST["login"])){
	$_SESSION["un"] = $_POST["username"];
	$_SESSION["pw"] = $_POST["password"];
	for ($i=0; $i < count($users) ; $i++) { 
		if ($_SESSION["un"] == $users[$i]->usern && $_SESSION["pw"] == $users[$i]->passw) {
			$_SESSION["idAcc"] = $users[$i]->id;
			header("location: ../view/userinterface.php");
		}else{
			echo '<script language="javascript">';
			echo 'alert("Something went wrong!")';
			echo '</script>';
		}
	}	
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/logintheme.css">
	<link rel="shortcut icon" type="image/jpg" href="../images/logoo.jpg">
</head>
<body>
<div class="container" style="display: flex;justify-content: center;">
	<form class="login-form" action="" method="post">
		<img src="../images/logoo.jpg">
		<h1>Login</h1>
		<label><i class="fas fa-user"></i>&nbspUsername</label>
		<input placeholder="Enter your username" name="username">
		<label><i class="fas fa-key"></i>&nbspPassword</label>
		<input placeholder="Enter your password" type="password" name="password">
		<button name="login" type="submit">LOGIN&nbsp<i class="fas fa-sign-in-alt"></i></button>
		<a href="#">Forgot password?</a>
		<a href="signup.php">Or Signup?</a>
	</form>
</div>
</body>
</html>