<?php
require '../model/databaseconnect.php';

$sql = "SELECT * from users";
$users = $db->query($sql)->fetch_all();
$idAccount = count($users);
if(isset($_POST['done'])){
	$fname = $_POST["fname"];
	$name = $_POST['usern'];
	$pw = $_POST['passw'];
	$cf = $_POST['confirm'];
	$gender = $_POST['gender'];
	if ($fname == null || $name == null || $pw == null || $cf == null) {
		echo '<script language="javascript">';
		echo 'alert("Something went wrong!")';
		echo '</script>';
	}elseif ($fname == null && $name == null && $pw == null && $cf == null){
		echo '<script language="javascript">';
		echo 'alert("Something went wrong!")';
		echo '</script>';
	}else{
		if ($pw == $cf) {
			$sql2 = "INSERT INTO `users`(`fullname`, `avt`, `usern`, `passw`, `gender`) VALUES ('".$fname."',"."'../images/default.png','".$name."','".$pw."','".$gender."')";
			$db->query($sql2);
			header("location: login.php");	
		}else{
			echo "Something went wrong!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/signuptheme.css">
	<link rel="shortcut icon" type="image/jpg" href="../images/logoo.jpg">
</head>
<body>
<div class="container" style="display: flex;justify-content: center;">
	<form class="signup-form" method="post">
		<img src="../images/logoo.jpg">
		<h1>Signup</h1>
		<div class="flex1">
			<label><i class="fas fa-signature"></i>&nbspFullname</label>
			<input name="fname" placeholder="Enter your fullname">
		</div>
		<div class="flex1">
			<label><i class="fas fa-venus-mars"></i>&nbspGender</label>
			<div class="flex2">
				<span><input type="radio" name="gender" value="Male"> Male</span><br>&nbsp&nbsp&nbsp&nbsp&nbsp
				<span><input type="radio" name="gender" value="Female"> Female</span><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</div>
		</div>
		<div class="flex1">
			<label><i class="fas fa-user"></i>&nbspUsername</label>
			<input name="usern" placeholder="Enter your username">
		</div>
		<div class="flex1">
			<label><i class="fas fa-key"></i>&nbspCreate password</label>
			<input name="passw" placeholder="Enter your password" type="password">
		</div>
		<div class="flex1">
			<label><i class="fas fa-redo"></i>&nbspConfirm password</label>
			<input name="confirm" placeholder="Enter your password again" type="password">
		</div>
		<div style="display: flex;justify-content: center;">
			<span><input type="checkbox">Accept terms and service of using</span>
		</div>
		<div style="display: flex;justify-content: center;">
			<button name="done" type="submit"><i class="fas fa-check"></i>&nbspDONE</button>
		</div>
		<a href="login.php ">Have you got any account?Or Login?</a>
	</form>
</div>
</body>
</html>