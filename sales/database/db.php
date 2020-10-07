<?php
  header ('Content-Type: text/html; charset=UTF-8');
  ini_set('default_charset','UTF-8');

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
   // Change character set to utf8
$con -> set_charset("utf8");
// Change character set to utf8
$mysqli -> set_charset("utf8");



		}
		}
}

//$db = new Database();
//$db->connect();

?>