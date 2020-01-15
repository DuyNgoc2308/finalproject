<?php
require "../model/databaseconnect.php";
class User{
	public $id;
	public $fullname;
    public $avt;
    public $usern;
    public $passw;
    public $gender;

    function __construct($id,$fullname,$avt,$usern,$passw,$gender)
    {
    	$this->id = $id;
    	$this->fullname = $fullname;
    	$this->avt = $avt;
    	$this->usern = $usern;
    	$this->passw = $passw;
    	$this->gender = $gender;
    }

	
}
$users = [];
$sql = "SELECT * from users";
$result = $db->query($sql)->fetch_all();
for ($i=0; $i < count($result); $i++) { 
	$user = new User($result[$i][0],$result[$i][1],$result[$i][2],$result[$i][3],$result[$i][4],$result[$i][5]);
	array_push($users, $user);
}
?>