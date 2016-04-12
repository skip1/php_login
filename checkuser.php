<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('database2.php');
if (isset($_POST['username']) && ($_POST['username'] != '' )) {
  //  $username = \mysql_real_escape_string(\preg_replace('/[^A-Za-z0-9-_]/i', '', $_REQUEST['username']));
     $username =  $_POST['username'];
     
     ?> 
<?php 
    /* @var $_REQUEST type */
 //   if (isset($_REQUEST['event']) && $_REQUEST['event'] != '') {
 //       $event = mysql_real_escape_string(preg_replace('/[^A-Za-z0-9-_]/i', '', $_REQUEST['event']));
 //       $eventSQL = " AND `event` = '$event'";
 //   } else {
 //       $eventSQL = " AND (event = '$event1' OR event = '$event2' OR event = '$event3')";
 //   }

    ?>
     
     <?php
    $query = $DBH->prepare("SELECT * FROM users WHERE username LIKE '$username'");
    $query->execute();
    $rows = $query->fetchColumn();
    echo json_encode(array('exists' => $query->rowCount() > 0));
 

    
        //user name is available
        


}
    