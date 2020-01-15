<?php
require "../model/databaseconnect.php";
class Post{
	public $id;
	public $idAccount;
    public $img;
    public $descrip;
    public $interact;
    public $cmt;

    function __construct($id,$idAccount,$img,$descrip,$interact,$cmt)
    {
    	$this->id = $id;
    	$this->idAccount = $idAccount;
    	$this->img = $img;
    	$this->descrip = $descrip;
    	$this->interact = $interact;
    	$this->cmt = $cmt;
    }

	
}
$posts = [];
$sql = "SELECT * FROM posts";
$resultp = $db->query($sql)->fetch_all();
for ($i=0; $i < count($resultp); $i++) { 
 	$post = new Post($resultp[$i][0],$resultp[$i][1],$resultp[$i][2],$resultp[$i][3],$resultp[$i][4],$resultp[$i][5]);
 	array_push($posts, $post);
 } 
?>