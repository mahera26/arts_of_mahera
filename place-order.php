<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: checkout.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$notes = mysqli_real_escape_string($conn, $_POST['notes']);

// Calculate total
$total = 0;

$cart_sql = "SELECT cart.*, products.price, products.preorder_days
             FROM cart
             JOIN products ON cart.product_id = products.product_id
             WHERE cart.user_id='$user_id'";

$cart_result = $conn->query($cart_sql);

while($row = $cart_result->fetch_assoc()){
    $total += $row['price'] * $row['quantity'];
}

// Save order
$order_sql = "INSERT INTO orders
(user_id, customer_name, phone, address, notes, total_amount)
VALUES
('$user_id','$customer_name','$phone','$address','$notes','$total')";

$conn->query($order_sql);

$order_id = $conn->insert_id;

// Save order items
$cart_result = $conn->query($cart_sql);

while($row = $cart_result->fetch_assoc()){

    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $price = $row['price'];
    $preorder_days = $row['preorder_days'];

    $item_sql = "INSERT INTO order_items
    (order_id, product_id, quantity, price, preorder_days)
    VALUES
    ('$order_id','$product_id','$quantity','$price','$preorder_days')";

    $conn->query($item_sql);
}

// Clear cart
$conn->query("DELETE FROM cart WHERE user_id='$user_id'");

// Redirect
header("Location: order-success.php");
exit();
?>