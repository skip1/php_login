<?php
include_once('database2.php');

if (isset($_POST['log'])) {
$username = $_POST["username"];
$password = $_POST["password"];

if ($user->login($username)) {
	
	
	
	echo $password;
	
	echo "login oh yeah";
} else {
	echo "NO";
}


    

} 
?>