<?php
session_start();
include 'includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if product ID exists
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];

// Check if product is already in cart
$check = "SELECT * FROM cart
          WHERE user_id='$user_id'
          AND product_id='$product_id'";

$result = $conn->query($check);

if ($result->num_rows > 0) {

    // Increase quantity
    $update = "UPDATE cart
               SET quantity = quantity + 1
               WHERE user_id='$user_id'
               AND product_id='$product_id'";

    $conn->query($update);

} else {

    // Add new product
    $insert = "INSERT INTO cart (user_id, product_id, quantity)
               VALUES ('$user_id','$product_id',1)";

    $conn->query($insert);
}

// Go to cart page
header("Location: cart.php");
exit();
?>