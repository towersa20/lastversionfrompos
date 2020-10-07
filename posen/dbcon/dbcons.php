<?php 
  $servername = "127.0.0.1";
     $username = "root";
        $password = "";
             $dbname = "infos";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);


$con=mysqli_connect("127.0.0.1","root","","infos"); if(!$con) { die(" Connection Error ");}


	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "infos";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

?>