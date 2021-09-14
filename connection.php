<?php
session_start();
//Start the connection
$server = 'localhost';
$username_db = 'root';
$password_db = "";
$db_name = "db-store";
$conn = mysqli_connect($server,$username_db,$password_db,$db_name);
//check connection
if(!$conn) {
	die("Error : " . mysqli_connect_error());
}
?>