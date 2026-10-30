<?php

session_start();

include 'includes/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = $conn->query($sql);

if($result->num_rows>0){

$user = $result->fetch_assoc();

if(password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['user_id'];
$_SESSION['full_name']=$user['full_name'];

header("Location:index.php");

}else{

echo "<h2 style='color:red;text-align:center;'>Wrong Password</h2>";

}

}else{

echo "<h2 style='color:red;text-align:center;'>Email Not Found</h2>";

}

?>