<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cart.cart_id,
               cart.quantity,
               products.product_name,
               products.price,
               products.image,
               products.preorder_days
        FROM cart
        JOIN products
        ON cart.product_id = products.product_id
        WHERE cart.user_id='$user_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container my-5">

    <h2 class="mb-4">🛒 My Cart</h2>

    <table class="table table-bordered align-middle">

<tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th>Preorder</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php

$total = 0;

while($row = $result->fetch_assoc()){

$total += $row['price'] * $row['quantity'];

?>

<tr>

<td width="120">

<img src="images/products/<?php echo $row['image']; ?>"
     width="100">

</td>

<td>

<?php echo $row['product_name']; ?>

</td>

<td>

৳ <?php echo $row['price']; ?>

</td>

<td>

<?php echo $row['preorder_days']; ?> Days

</td>

<td>

<a href="update-cart.php?id=<?php echo $row['cart_id']; ?>&action=decrease"
   class="btn btn-sm btn-outline-danger">−</a>

<strong class="mx-2">
    <?php echo $row['quantity']; ?>
</strong>

<a href="update-cart.php?id=<?php echo $row['cart_id']; ?>&action=increase"
   class="btn btn-sm btn-outline-success">+</a>

</td>

<td>

<a href="remove-from-cart.php?id=<?php echo $row['cart_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Remove this product from your cart?');">
    Remove
</a>

</td>

</tr>

<?php } ?>

<tr>

    <td colspan="4" class="text-end">
        <strong>Total</strong>
    </td>

    <td colspan="2">
        <strong>৳ <?php echo $total; ?></strong>
    </td>

</tr>

</table>

<div class="card shadow-sm mt-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Grand Total</h4>

            <h3 class="text-danger mb-0">
                ৳ <?php echo $total; ?>
            </h3>
        </div>

        <hr>

        <div class="d-grid">
            <a href="checkout.php" class="btn btn-danger btn-lg">
                🛍 Proceed to Checkout
            </a>
        </div>

        <div class="text-center mt-3">
            <a href="products.php" class="btn btn-outline-secondary">
                ← Continue Shopping
            </a>
        </div>

    </div>
</div>

</div>

</body>
</html>