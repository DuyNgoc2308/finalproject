<?php
require '../model/databaseconnect.php';
require '../model/user.php';
require '../model/post.php';
// $sql = "SELECT * from users ";
// $users = $db->query($sql)->fetch_all();
// $sql1 = "SELECT * from posts";
// $posts = $db->query($sql1)->fetch_all();
session_start();

$sql1 = "SELECT * from users where usern=" . "'" . $_SESSION["un"] . "'" . "and passw=" . "'" . $_SESSION["pw"] . "'";
$usersi = $db->query($sql1)->fetch_all();
if (isset($_FILES["avt"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["avt"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["changeavt"])) {
        $name = basename($_FILES["avt"]["name"]);
        $stt = $_POST["status"];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $sqll = "UPDATE `users` SET `avt`="."'../images/".$name."'". " WHERE id=".$_SESSION["idAcc"];
        $db->query($sqll);
        header("location: profile.php");
    }
}
$sqlq = "SELECT `img` FROM posts WHERE idAccount=".$_SESSION["idAcc"];
$history = $db->query($sqlq)->fetch_all();    
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/jpg" href="../images/logoo.jpg">
	<link rel="stylesheet" type="text/css" href="../CSS/profile.css">
</head>

<body>
	<?php require "header.php";?>
	<div id="profile" class="container-xl" style="display: flex;justify-content: center;align-items: center;">
		<div>
			<h1>About you</h1>
			<img src="<?php echo $usersi[0][2] ?>">
			<button name="changeavt"><input type="file" name="avt" id="avt" style="display: none">
            <label for="avt"><i class="fas fa-plus-circle"></i></label></button>
		</div>
		<div>
			<form class="cols-form" action="" method="post">
				<label><i class="fas fa-qrcode"></i>&nbspID</label>
				<input class="input" value="<?php echo $usersi[0][0] ?>">
				<label><i class="fas fa-signature"></i>&nbspName</label>
				<input class="input" value="<?php echo $usersi[0][1] ?>">
				<label><i class="fas fa-venus-mars"></i>&nbspGender</label>
				<input class="input" value="<?php echo $usersi[0][5] ?>">
				<label><i class="fas fa-user"></i>&nbspUsername</label>
				<input class="input" value="<?php echo $usersi[0][3] ?>">
			</form>
		</div>
	</div>
	<div class="container-xl" style="display: flex;align-items: center;margin-bottom: 0">
		<label><i class="fas fa-th-list"></i>&nbspHistory posting</label>
	</div>
	<div id="history" class="container-xl" style="border:1px solid black;display: grid;grid-template-columns:auto auto auto auto;padding: 10px 10px; ">
		<?php
		for ($i=0; $i < count($history); $i++) { 
			if ($history[$i][0] != null) {
				echo "<img src=".$history[$i][0].">";
			}	
		}
		?>
	</div>
	<?php require "footer.php"?>
</body>

</html>