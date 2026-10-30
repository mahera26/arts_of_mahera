
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

$product = mysqli_num_rows($conn->query("SELECT * FROM products"));
$order = mysqli_num_rows($conn->query("SELECT * FROM orders"));
$user = mysqli_num_rows($conn->query("SELECT * FROM users"));
$message = mysqli_num_rows($conn->query("SELECT * FROM contact_messages"));

$product = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$category = $conn->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];
$order = $conn->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];
$user = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">


<head>

<style>

.dashboard-card{
    transition:.3s;
}

.dashboard-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.2);
}

</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

<h2 class="mb-4 fw-bold">
📊 Admin Dashboard
</h2>

<div class="row">

<div class="col-md-3 mb-4">

<div class="card dashboard-card text-center shadow border-0"
     style="background:#D6EAF8; color:#21618C;">

<div class="card-body">

<h1><?php echo $product; ?></h1>

<h5>Total Products</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card dashboard-card text-center shadow border-0"
     style="background:#D6EAF8; color:#21618C;">

<div class="card-body">

<h1><?php echo $order; ?></h1>

<h5>Total Orders</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card dashboard-card text-center shadow border-0"
     style="background:#D6EAF8; color:#21618C;">

<div class="card-body">

<h1><?php echo $user; ?></h1>

<h5>Total Customers</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card dashboard-card text-center shadow border-0"
     style="background:#D6EAF8; color:#21618C;">
     
<div class="card-body">

<h1><?php echo $message; ?></h1>

<h5>Total Messages</h5>

</div>

</div>

</div>

</div>

</div>

</body>
</html>