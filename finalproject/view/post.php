<?php
require '../model/databaseconnect.php';
session_start();

// $sql = "SELECT * from users";
// $users = $db->query($sql)->fetch_all();
require '../model/user.php';

$sql1 = "SELECT * from users where usern="."'".$_SESSION["un"]."'"."and passw="."'".$_SESSION["pw"]."'";
$usersi = $db->query($sql1)->fetch_all();
if (isset($_FILES["fileToUpload"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["post"])) {
        $name = basename($_FILES["fileToUpload"]["name"]);
        $stt = $_POST["status"];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $sql1 = "INSERT INTO `posts`(`idAccount`, `img`, `descrip`) VALUES (".$_SESSION["idAcc"].","."'"."../images/".$name."'".","."'".$stt."'".")";
        $db->query($sql1);
        header("location: userinterface.php");
    }
}    
    
    
    
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    // // if everything is ok, try to upload file
    // } else {
    //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // } 

?>
<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/jpg" href="../images/logoo.jpg">
    <link rel="stylesheet" type="text/css" href="../CSS/post.css">
</head>
<body>
    <?php require "header.php";?>
    <div id="margin" class="container-md" style="padding: 10px 250px">
        <form action="" method="POST" enctype="multipart/form-data" style="display: grid;grid-template-columns: auto;">
            <?php
                echo "<p>Hi, ".$usersi[0][1]."</p>";
            ?>
            <h1>How are you today?</h1>
            <input type="file" name="fileToUpload" id="fileToUpload" style="display: none">
            <label for="fileToUpload"><i class="fas fa-image"></i>&nbspChoose an image</label>
            <input type="text" name="status" placeholder="What's on your mind?">
            <input type="submit" value="POST" name="post">    
        </form>
    </div>
    <?php require "footer.php"?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>