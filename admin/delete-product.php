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

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Get image name before deleting
    $result = $conn->query("SELECT image FROM products WHERE product_id='$id'");

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $image = "../images/products/" . $row['image'];

        // Delete image if it exists
        if(file_exists($image)){
            unlink($image);
        }

        // Delete product from database
        $conn->query("DELETE FROM products WHERE product_id='$id'");
    }
}

header("Location: products.php");
exit();
?>