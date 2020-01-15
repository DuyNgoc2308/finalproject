<?php
require '../model/databaseconnect.php';
require '../model/user.php';
require '../model/post.php';


// require '../OOP/user.php';
// $sql1 = "SELECT * from posts";
// $posts = $db->query($sql1)->fetch_all();
// $sql2 = "SELECT * from users";
// $users = $db->query($sql2)->fetch_all();
session_start();


$sql3 = "SELECT * from users where usern=" . "'" . $_SESSION["un"] . "'" . "and passw=" . "'" . $_SESSION["pw"] . "'";
$usersi = $db->query($sql3)->fetch_all();

if (isset($_POST["postmind"])) {
	$mind = $_POST["mind"];
	$sql4 = "INSERT INTO `posts`(`idAccount`,`descrip`) VALUES (" . $_SESSION["idAcc"] . "," . "'" . $mind . "'" . ")";
	$post = $db->query($sql4);
	header("location: userinterface.php");
}
$bug=0;

// $like = 0;
// if (isset($_POST["interact"])) {
// 	$like = $like + 1;
// 	$sql5 = "UPDATE `posts` SET `interact`=".$like." WHERE `id`=".$posta[$i][2];
// 	$heart = $db->query($sql5);
// 	// echo $heart;
// 	return $like;
// }

// if (isset($_POST["interact"])) {
// 	$arin=json_decode($_POST["interact"]);
// 	$id=$arin[1];
	

// 	$sqli = "SELECT * FROM `posts` where id=".$id;

// 	$resulti = $db->query($sqli)->fetch_all();  

	
// 	$AR=(array)json_decode($resulti[0][4]);

// 	$idu= (integer)$arin[0];

// 	array_push($AR,$idu);
// 	echo json_encode($AR);
// 	$ARU=json_encode($AR);
// 	$sqlu = "UPDATE  `posts` set interact=".$ARU." WHERE  id=".$id;

// 	$resultu = $db->query($sqlu);
// 	echo $resultu;

// }

?>
<!DOCTYPE html>
<html>

<head>
	<title>JoyFul - enjoy your day</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/theme.css">
	<link rel="shortcut icon" type="image/jpg" href="../images/logoo.jpg">

</head>

<body>
	<?php require "header.php";?>
	<div>
		<div class="container-md">
			<form action="" method="post">
				<div class="user-box">
					<img src="<?php echo $usersi[0][2]; ?>">
					<input type="text" name="mind" placeholder="What's on your mind?">
					<button name="postmind"><i class="fas fa-plus-circle"></i></button>
				</div>
			</form>
		</div>
	</div>
	<main class="container-sm">
		<?php
		for ($i = 0; $i < count($posts); $i++) {
			$sqlq = "SELECT users.avt,users.usern,users.id,posts.id,posts.img,posts.descrip FROM posts,users WHERE posts.idAccount = users.id";
			$posta = $db->query($sqlq)->fetch_all();
			
		?>
		<div class="container">
			<div class="user-box">
				<?php
					echo "<img src=" . "'" . $posta[$i][0] . "'>";
					echo "<h5>" . $posta[$i][1] . "</h5>";
				?>
			</div>
				<?php

					echo "<img class='col-xl-12' src=" . "'" . $posta[$i][4] . "'>";
					echo "<p class='col-xl-6'>" . $posta[$i][5] . "</p>";
					// $idim=$posta[$i][3];
					// $iduser=$posta[$i][2];
					// $str= json_encode(array($iduser,$idim));


				?>
				<form method="post">
					<div class="col-xl-12">
						<button name="interact" value="<?php echo $str;?>"><i class="far fa-heart"></i></button>
						<button type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" value="<?php echo $posta[$i][3]; ?>"><i class="far fa-comment"></i></button>
						<button><i class="far fa-paper-plane"></i></button>
						<div class="collapse" id="collapseExample" style="padding: 0;">
							<div class="card card-body">
								<div style="display: flex;align-items: center;color:#E93F5C">
									<input type="text" name="cmt">
									<button><i class="fas fa-location-arrow"></i></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		<?php
		}
		?>
	</main>
	<?php require "footer.php"?>
</body>
<script type="text/javascript">
	function Clicked() {
		alert("Entered");
	}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>