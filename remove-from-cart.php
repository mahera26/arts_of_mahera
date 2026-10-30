<?php
session_start();
include 'includes/db.php';

if (isset($_GET['id'])) {

    $cart_id = $_GET['id'];

    $conn->query("DELETE FROM cart WHERE cart_id='$cart_id'");
}

header("Location: cart.php");
exit();
?>