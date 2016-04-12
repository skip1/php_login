<?php


include_once('database2.php');
if (isset($_POST['username']) && ($_POST['username'] != '' )) {
  
     $username =  $_POST['username'];
    
    $query = $DBH->prepare("SELECT * FROM users WHERE username LIKE '$username'");
    $query->execute();
    $rows = $query->fetchColumn();
    echo json_encode(array('exists' => $query->rowCount() > 0));

}
    