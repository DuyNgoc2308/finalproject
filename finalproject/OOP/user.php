<?php
class User{
	public $passw;
	public $fullname;

	function getShortName(){
		$spacePos = strpos($this->fullname, ' ');
		if($spacePos){
			return substr($this->fullname, 0, $spacePos);
		}
		return $this->fullname;
	}	
}
?>