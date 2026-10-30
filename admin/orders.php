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

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

.status-pending{
    background:#b8860b !important;
    color:white !important;
    font-weight:bold;
}

.status-processing{
    background:#0d6efd !important;
    color:white !important;
    font-weight:bold;
}

.status-completed{
    background:#198754 !important;
    color:white !important;
    font-weight:bold;
}

.status-cancelled{
    background:#dc3545 !important;
    color:white !important;
    font-weight:bold;
}

.form-select.status-pending,
.form-select.status-processing,
.form-select.status-completed,
.form-select.status-cancelled{
    border:none;
    border-radius:20px;
    text-align:center;
    cursor:pointer;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <h2 class="mb-4">📦 Customer Orders</h2>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        </thead>

        <tbody>

        <?php while($row = $result->fetch_assoc()){ ?>

        <tr>

            <td><?php echo $row['order_id']; ?></td>

            <td><?php echo $row['customer_name']; ?></td>

            <td><?php echo $row['phone']; ?></td>

            <td><?php echo $row['address']; ?></td>

            <td>৳ <?php echo number_format($row['total_amount'],2); ?></td>

    <td>

<?php
$status = $row['order_status'];

$class = "";

switch($status){
    case "Pending":
        $class = "status-pending";
        break;

    case "Processing":
        $class = "status-processing";
        break;

    case "Completed":
        $class = "status-completed";
        break;

    case "Cancelled":
        $class = "status-cancelled";
        break;
}
?>

<form action="update-order-status.php" method="POST">

    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">

    <select name="status"
            class="form-select form-select-sm <?php echo $class; ?>"
            onchange="this.form.submit()">

        <option value="Pending" <?php if($status=="Pending") echo "selected"; ?>>Pending</option>

        <option value="Processing" <?php if($status=="Processing") echo "selected"; ?>>Processing</option>

        <option value="Completed" <?php if($status=="Completed") echo "selected"; ?>>Completed</option>

        <option value="Cancelled" <?php if($status=="Cancelled") echo "selected"; ?>>Cancelled</option>

    </select>

</form>

</td>

            <td><?php echo $row['order_date']; ?></td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>