<?php

include 'includes/db.php';


// Check form submit

if(isset($_POST['register'])){


    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $district = trim($_POST['district']);
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];



    // Check password

    if($password != $confirm_password){

        echo "<script>
        alert('Password does not match');
        window.location='register.php';
        </script>";

        exit();

    }



    // Hash password

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



    // Insert query

    $sql = "INSERT INTO users
    (full_name, email, phone, district, address, password)
    VALUES
    ('$full_name', '$email', '$phone', '$district', '$address', '$hashed_password')";



    // Execute query

    if($conn->query($sql) === TRUE){


        echo "<script>
        alert('Registration Successful');
        window.location='login.php';
        </script>";


    }else{


        echo "Registration Failed: ".$conn->error;


    }


}

else{

    echo "Invalid Request";

}

?>