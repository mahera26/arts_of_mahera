<?php

session_start();

if(!isset($_SESSION['admin_logged_in'])){

header("Location: login.php");
exit();

}

include "../includes/db.php";

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="dashboard.php">
            Arts of Mahera Admin
        </a>

        <li class="nav-item">
    <a class="nav-link" href="messages.php">
        📩 Messages
    </a>

   <a href="logout.php" class="btn btn-danger">
    Logout
</a>

</li>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="orders.php">Orders</a>
            <a class="nav-link" href="products.php">Products</a>
            <a class="nav-link" href="../index.php">Website</a>

        </div>

    </div>
</nav>