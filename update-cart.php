<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['action'])) {

    $cart_id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == "increase") {

        $sql = "UPDATE cart
                SET quantity = quantity + 1
                WHERE cart_id='$cart_id'";

        $conn->query($sql);

    } elseif ($action == "decrease") {

        $check = "SELECT quantity FROM cart WHERE cart_id='$cart_id'";
        $result = $conn->query($check);
        $row = $result->fetch_assoc();

        if ($row['quantity'] > 1) {

            $sql = "UPDATE cart
                    SET quantity = quantity - 1
                    WHERE cart_id='$cart_id'";

            $conn->query($sql);

        } else {

            $conn->query("DELETE FROM cart WHERE cart_id='$cart_id'");

        }
    }
}

header("Location: cart.php");
exit();
?>