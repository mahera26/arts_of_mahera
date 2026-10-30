<?php
session_start();
include 'includes/auth.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['full_name']; ?></h2>

<p>You are successfully logged in.</p>

</body>
</html>