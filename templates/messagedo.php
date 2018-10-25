<?php
    @header("Content-type:text/html;charset=utf-8");

    require_once '../includes/db_connect.php';

    include_once '../includes/config.php';

    $name = $_POST['name'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $source = $cfg_domain;
    $item =  $WEB_NAME;

    $sql = "INSERT INTO `message`(`name`, `phone`,`message`,`source`,`item`) VALUES ('$name','$phone','$message','$source','$item')";


    $db = new MyDB();

    $data = $db->Query($sql);
    
    if ($data) {
         echo '1';
    }
    else{
         echo '0';
    }

?>