<?php

session_start();

if(!isset($_SESSION['admin_logged_in'])){

header("Location: login.php");
exit();

}

include "../includes/db.php";

?>

<?php
session_start();
include '../includes/db.php';

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM contact_messages
            WHERE message_id = '$id'";

    if($conn->query($sql)){
        header("Location: messages.php");
        exit();
    }else{
        echo "Error: " . $conn->error;
    }

}else{
    header("Location: messages.php");
    exit();
}
?>