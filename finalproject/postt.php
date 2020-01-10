<?php
require 'databaseconnect.php';
session_start();

$sql = "SELECT * from users";
$users = $db->query($sql)->fetch_all();
$sql1 = "SELECT * from users where usern="."'".$_SESSION["un"]."'"."and passw="."'".$_SESSION["pw"]."'";
$usersi = $db->query($sql1)->fetch_all();
if (isset($_FILES["fileToUpload"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["post"])) {
            $name = $_FILES["fileToUpload"]["name"];
            $stt = $_POST["status"];
            $sql1 = "INSERT INTO `post`(`idAccount`, `img`, `descrip`) VALUES (".$_SESSION["idAcc"].","."'"."images/".$name."'".","."'".$stt."'".")";
            $db->query($sql1);
            header("location: userinterface.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        a{
            text-decoration: none;
            color:white;
        }
        .grid{
            display: grid;
            grid-column: auto auto auto;
        }
        img{
            height: 100px;
            width: 100px;
        }
        input{
            padding: 5px 10px;
            outline: none;
            border-radius: 10px;
            border:1px solid #C44479;
            background: transparent;
            margin: 10px 0px;
            text-indent: 15px;
        }
        .button{
            outline: none;
            border: none;
            background: #C44479;
            color: white;
            border-radius: 10px;
            width: 100px;
        }
        body{
            font-family: Comic Sans MS;
        }
        label{
            font-size: 30px;
            color: #E93F5C;
        }
    </style>
</head>
<body>
<div classs="container-sm" style="color: white;;padding: 10px 10px;font-weight: bold;background: linear-gradient(to bottom, #F4662B 0%, #E93F5C 100%);">
    <button class="button"><a href="userinterface.php"><i class="fas fa-arrow-left"></i>&nbspBACK</a></button>
</div>
<div class="container-md" style="padding: 10px 250px">
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
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>