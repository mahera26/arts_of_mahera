<?php
session_start();

$error = "";

// Your Admin Login Details
$admin_email = "maherammc@gmail.com";
$admin_password = "mahera123";   // Change this password


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    // Check email and password
    if($email === $admin_email && $password === $admin_password){

        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_name'] = "Mahera";


        header("Location: dashboard.php");
        exit();

    }else{

        $error = "Wrong Email or Password";

    }

}

?>


<!DOCTYPE html>
<html>
<head>

<title>Admin Login | Arts of Mahera</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8f9fa;
}

.login-box{

    width:400px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 15px rgba(0,0,0,0.1);

}

</style>

</head>


<body>


<div class="login-box">

<h2 class="text-center mb-4">
Admin Login
</h2>


<?php if($error != ""){ ?>

<div class="alert alert-danger text-center">
<?php echo $error; ?>
</div>

<?php } ?>


<form method="POST" action="">


<label>Email</label>

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Enter Admin Email"
required>



<label>Password</label>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Enter Admin Password"
required>



<button type="submit" class="btn btn-dark w-100">
Login
</button>


</form>


</div>


</body>
</html>