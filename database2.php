<?php
    session_start();
$dbhost     = "localhost";
$dbname     = "test";
$dbuser     = "sk";
$dbpass     = "sk";
try {
  $DBH = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

} catch (PDOException $e) {

  echo $e->getMessage();
}
include_once 'class.user.php';
$user = new User($DBH);
