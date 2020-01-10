<?php
require 'databaseconnect.php';

$sql = "SELECT * from users";
$users = $db->query($sql)->fetch_all();
$idAccount = count($users);
if(isset($_POST['done'])){
	$name = $_POST['usern'];
	$pw = $_POST['passw'];
	$cf = $_POST['confirm'];
	if ($pw == $cf) {
		$sql2 = "INSERT INTO `users`( `idAccount`,`avt`, `usern`, `passw`) VALUES (".($idAccount+1).","."'"."images/default.png"."'".","."'".$name."'".","."'".$cf."'".")";
		$db->query($sql2);	
	}else{
		echo "Something went wrong!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<style type="text/css">
		input{
			text-indent: 15px;
			height: 30px;
			border: none;
			background: transparent;
			font-style: italic;
			border-bottom: 1px solid lightgrey;
			color: black;
			outline: none;
			font-weight: bold;
		}
		.signup-form{
			/*width: auto;
			height: auto;
			padding: 10px 40px; */                                        
			background: transparent;
			display: grid;
			align-items: center;
			justify-content: center;
			grid-template-columns: auto;
			color: #EC494F;;
			margin: 100px 100px;
			top:0px;
		}
		.signup-form img{
			height: 150px;
			width: 150px;
			border-radius: 75px;
		}
		a{
			color: black;
			font-size: 14px;
			font-weight: bold;
		}
		label{
			margin-top: 15px;
			margin-bottom: 15px;
		}
		button{
			margin: 15px 15px;
			height: 30px;
			border:none;
			border-radius: 10px;
			background: linear-gradient(to bottom, #ff5050 0%, #ff6699 100%);;
			font-weight: bold;
			outline: none;
		}
		button:hover{
			background: linear-gradient(to bottom, #ff5050 0%, #cc0066 100%);
		}
		body{
			background-image: url("images/simple.jpg");
			display: flex;
			justify-content: center;
			align-items: center;
			font-family: Comic Sans MS;
			color: black;
		}
		span{
			font-size: 12px;
			display: flex;
			align-items: center;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<body>

	<form class="signup-form" method="post">
		<img src="images/logo.jpg">
		<h1>Signup</h1>
		<label><i class="fas fa-user"></i>&nbspUsername</label>
		<input name="usern" placeholder="Enter your username">
		<label><i class="fas fa-key"></i>&nbspCreate password</label>
		<input name="passw" placeholder="Enter your password" type="password">
		<label><i class="fas fa-redo"></i>&nbspConfirm password</label>
		<input name="confirm" placeholder="Enter your password again" type="password">
		<span><input type="checkbox">Accept terms and service of using</span>
		<button name="done" type="submit"><i class="fas fa-check"></i>&nbspDONE</button>
		<a href="#">Have you got any account?</a>
		<a href="login.php ">Or Login?</a>
	</form>

</body>
</html>