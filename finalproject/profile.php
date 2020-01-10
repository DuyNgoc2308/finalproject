<?php
require 'databaseconnect.php';
$sql = "SELECT * from users ";
$users = $db->query($sql)->fetch_all();

session_start();

$sql1 = "SELECT * from users where usern="."'".$_SESSION["un"]."'"."and passw="."'".$_SESSION["pw"]."'";
$usersi = $db->query($sql1)->fetch_all();

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
		.cols-form{             
			background: transparent;
			display: grid;
			align-items: center;
			justify-content: center;
			grid-template-columns: auto auto;
			color:  #EC494F;
			margin: 100px 100px;
			font-weight: bold;
		}
		.cols-form img{
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
			/*background-image: url("images/simple.jpg");*/
			display: grid;
			font-family: sans-serif;
			grid-template-columns: auto;
			align-items: center;
			font-family: Comic Sans MS;
		}
		img{
			height: 300px;
			width: 300px;
			border-radius: 150px;
			border:3px solid #cc0066;
		}
	</style>
</head>
<body>
	<div  style="display: grid;grid-template-columns: auto;">
	<div>
		<h1>About you</h1>
		<img src="<?php echo $usersi[0][3] ?>">	
	</div>
	<div>
		<form class="cols-form" action="" method="post">
			<label><i class="fas fa-qrcode"></i>&nbspID</label>
			<input value="<?php echo $usersi[0][1] ?>">
			<label><i class="fas fa-signature"></i>&nbspName</label>
			<input value="<?php echo $usersi[0][2] ?>">
			<label><i class="fas fa-venus-mars"></i>&nbspGender</label>
			<input  value="<?php echo $usersi[0][6]?>">
			<label><i class="fas fa-user"></i>&nbspUsername</label>
			<input  value="<?php echo $usersi[0][4]?>">
		</form>
	</div>
</div>
</body>
</html>