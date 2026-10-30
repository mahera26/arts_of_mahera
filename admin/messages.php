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

$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Messages</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f8f9fa;">

<?php include 'navbar.php'; ?>

<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>📩 Customer Messages</h2>

<span class="badge bg-primary fs-6">
Total:
<?php echo $result->num_rows; ?>
</span>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover shadow">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Subject</th>
<th>Message</th>
<th>Date</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['message_id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['message']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="delete-message.php?id=<?php echo $row['message_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this message?');">
    🗑 Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>