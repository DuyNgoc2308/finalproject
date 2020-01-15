<?php
require 'databaseconnect.php';
require 'user.php';
function login($username,$password){
	global $db;
	$sql = "SELECT * from users WHERE usern='$username' AND passw='$password'";
	$users = $db->query($sql)->fetch_all();

	if (count($users)>0) {
		$user = new User();
		$user->fullname = $users[0][2];
		$user->id = $users[0][0];
		return $user;
	}
	return null;
}
?>