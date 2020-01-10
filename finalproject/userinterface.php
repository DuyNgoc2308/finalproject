
<?php
require 'databaseconnect.php';
require 'OOP/user.php';
$sql1 = "SELECT * from post";
$posts = $db->query($sql1)->fetch_all();
$sql2 = "SELECT * from users";
$users = $db->query($sql2)->fetch_all();
session_start();

$sql3 = "SELECT * from users where usern="."'".$_SESSION["un"]."'"."and passw="."'".$_SESSION["pw"]."'";
$usersi = $db->query($sql3)->fetch_all();

if (isset($_POST["postmind"])) {
	$mind = $_POST["mind"];
	$sql4 = "INSERT INTO `post`(`idAccount`,`descrip`) VALUES (".$_SESSION["idAcc"].","."'".$mind."'".")";
	$post = $db->query($sql4);
}
if (isset($_POST["out"])) {
	session_destroy();
	header("location: login.php");
}
if (isset($_POST["post"])) {
	header("location: postt.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>JoyFul - enjoy your day</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/theme.css">
</head>
<body>
	<header class="container-xl">
		<h1>JoyFul - Enjoy your day</h1>
		<div class="flex">
			<button><a href="profile.php"><i class="far fa-user-circle"></i></a></button>
			<button onclick="Clicked()"><i class="far fa-paper-plane"></i></button>
		</div>
	</header>
	<form method="post">
		<div class="container-xl" style="background: linear-gradient(to right, #F4662B 0%, #E93F5C 100%); ">
			<div style="text-align:center;align-items: center;display: grid;grid-template-columns: auto auto auto auto auto;color: white;font-size: 30px;padding: 10px 20px;">
				<button><i class="fas fa-home"></i></button>
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
	<div class="container-md">
		<form action="" method="post">
			<div class="user-box">
				<img src="<?php echo $usersi[0][2];?>">
				<input type="text" name="mind" placeholder="What's on your mind?">
				<button name="postmind"><i class="fas fa-plus-circle"></i></button>
			</div>
		</form>
	</div>
	<main class="container-sm">
		<?php
			for ($i=0; $i < count($users) ; $i++) { 
		?>
		<div class="container">
			<div class="user-box">
				<?php
					echo "<img src="."'".$users[$i][2]."'>";
					echo "<h5>".$users[$i][3]."</h5>";
				?>
			</div>
				<?php
					echo "<img class='col-xl-12' src="."'".$posts[$i][2]."'>";
					echo "<p class='col-xl-6'>".$posts[$i][3]."</p>";
				?>
			<div class="col-xl-12">
				<button><i class="far fa-heart"></i></button>
				<button><i class="far fa-comment"></i></button>
				<button><i class="far fa-paper-plane"></i></button>
			</div>
		</div>
		<?php
			}
		?>
		
	</main>
	<footer class="container-xl">
		<img src="images/logo.jpg">
		<p>@Created by Nguyen Duy Ngoc - Jan 2020</p>
	</footer>
</body>
<script type="text/javascript">
	function Clicked(){
		alert("Entered");
	}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>