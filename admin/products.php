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

$sql = "SELECT products.*, categories.category_name
        FROM products
        LEFT JOIN categories
        ON products.category_id = categories.category_id
        ORDER BY products.product_id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🛍 Manage Products</h2>

        <a href="add-product.php" class="btn btn-success">
            ➕ Add New Product
        </a>
    </div>

    <table class="table table-hover table-bordered align-middle">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Preorder</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['product_id']; ?></td>

<td width="120">

<img src="../images/products/<?php echo $row['image']; ?>"
     width="80"
     class="rounded">

</td>

<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['category_name']; ?></td>

<td>৳ <?php echo number_format($row['price'],2); ?></td>

<td><?php echo $row['preorder_days']; ?> Days</td>

<td>

<a href="edit-product.php?id=<?php echo $row['product_id']; ?>"
   class="btn btn-warning btn-sm">
   ✏ Edit
</a>

<a href="delete-product.php?id=<?php echo $row['product_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this product?');">
    🗑 Delete
</a>

</td>

</tr>

<?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>