<?php

/**
* 
*/
class Database
{
	private $con;
	
	public function connect(){
include_once("constants.php");
		$this->con = new Mysqli(HOST,USER,PASS,DB);
		
				if ($this->con) {
			return $this->con;
  $con->query("SET NAMES utf8");
   $con->query("SET CHARACTER SET utf8"); 



		}
		}
}

//$db = new Database();
//$db->connect();

?>