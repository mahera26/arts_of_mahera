<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Arts of Mahera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container my-5">

    <h2 class="mb-4">Checkout</h2>

    <form action="place-order.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Delivery Address</label>
            <textarea name="address" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Order Notes (Optional)</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-danger btn-lg">
            Place Order
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>