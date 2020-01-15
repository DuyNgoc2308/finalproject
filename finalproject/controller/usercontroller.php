<?php
require "../model/userdatabase.php";
session_start();
if (isset($_POST["login"])) {
	$_SESSION["un"] = $_POST["username"];
	$_SESSION["pw"] = $_POST["password"];

	$user = login($un,$pw);
	if ($user == null) {
		$_SESSION["isLogin"] = false;

	}else{
		$_SESSION["isLogin"] = true;
		$_SESSION["fullname"] = $user->fullname;
	}
	header("location: ../view/userinterface.php");

}

?>