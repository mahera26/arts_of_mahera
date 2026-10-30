<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container text-center my-5">

    <div class="alert alert-success p-5">

        <h1>🎉 Thank You!</h1>

        <h3>Your preorder has been placed successfully.</h3>

        <p>We will contact you soon to confirm your order.</p>

        <a href="index.php" class="btn btn-danger btn-lg mt-3">
            Continue Shopping
        </a>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>