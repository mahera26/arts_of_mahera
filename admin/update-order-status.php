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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders
            SET order_status='$status'
            WHERE order_id='$order_id'";

    if($conn->query($sql)){
        header("Location: orders.php");
        exit();
    }else{
        echo "Error: " . $conn->error;
    }

}else{
    header("Location: orders.php");
    exit();
}
?>