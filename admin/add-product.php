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

$categories = $conn->query("SELECT * FROM categories");

if(isset($_POST['add_product'])){

    $category_id      = $_POST['category_id'];
    $product_name     = $_POST['product_name'];
    $description      = $_POST['description'];
    $price            = $_POST['price'];
    $preorder_days    = $_POST['preorder_days'];
    $yarn_type        = $_POST['yarn_type'];
    $hook_size        = $_POST['hook_size'];
    $usage_ideas      = $_POST['usage_ideas'];
    $care_instructions= $_POST['care_instructions'];

    // Main Image Upload
    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../images/products/".$image);

    // Sub Picture 1 Upload (Optional)
    $image2 = "";
    if(!empty($_FILES['image2']['name'])){
        $image2 = $_FILES['image2']['name'];
        $tmp2   = $_FILES['image2']['tmp_name'];
        move_uploaded_file($tmp2, "../images/products/".$image2);
    }

    // Sub Picture 2 Upload (Optional)
    $image3 = "";
    if(!empty($_FILES['image3']['name'])){
        $image3 = $_FILES['image3']['name'];
        $tmp3   = $_FILES['image3']['tmp_name'];
        move_uploaded_file($tmp3, "../images/products/".$image3);
    }

     // Sub Picture 3 Upload (Optional)
    $image4 = "";
    if(!empty($_FILES['image4']['name'])){
        $image4 = $_FILES['image4']['name'];
        $tmp4   = $_FILES['image4']['tmp_name'];
        move_uploaded_file($tmp4, "../images/products/".$image4);
    }

    $sql = "INSERT INTO products
    (category_id, product_name, description, price, image, image2, image3, image4, preorder_days, yarn_type, hook_size, usage_ideas, care_instructions)
    VALUES
    ('$category_id','$product_name','$description','$price','$image','$image2','$image3','$image4','$preorder_days','$yarn_type','$hook_size','$usage_ideas','$care_instructions')";

    if($conn->query($sql)){
        echo "<script>
                alert('Product Added Successfully!');
                window.location='products.php';
              </script>";
    }else{
        echo "<div class='alert alert-danger'>".$conn->error."</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f8f9fa;">

<?php include 'navbar.php'; ?>

<div class="container mt-5 mb-5">

<div class="card shadow-lg border-0">

<div class="card-header bg-dark text-white">
    <h3>➕ Add New Product</h3>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Product Name</label>
<input type="text" name="product_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Category</label>
<select name="category_id" class="form-select" required>
    <option value="">Select Category</option>
    <?php while($cat=$categories->fetch_assoc()){ ?>
        <option value="<?php echo $cat['category_id']; ?>">
            <?php echo $cat['category_name']; ?>
        </option>
    <?php } ?>
</select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Price (৳)</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label>Preorder Days</label>
        <input type="number" name="preorder_days" class="form-control" placeholder="Example: 5" required>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Yarn Type</label>
        <input type="text" name="yarn_type" class="form-control" placeholder="Example: Premium Soft Cotton Blend">
    </div>
    <div class="col-md-6 mb-3">
        <label>Hook Size</label>
        <input type="text" name="hook_size" class="form-control" placeholder="Example: 3.0 mm Crochet Hook">
    </div>
</div>

<div class="mb-3">
<label>Main Description</label>
<textarea name="description" rows="4" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Usage Ideas</label>
<textarea name="usage_ideas" rows="2" class="form-control" placeholder="Example: Great for desk accessories, room decor, or gifts."></textarea>
</div>

<div class="mb-3">
<label>Care & Washing Instructions</label>
<textarea name="care_instructions" rows="2" class="form-control" placeholder="Example: Gentle hand wash in cold water. Lay flat to dry."></textarea>
</div>

<div class="card p-3 mb-4 bg-light border">
    <h5>🖼 Product Images</h5>
    
    <div class="mb-3">
        <label>Main Product Image (Required)</label>
        <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png" required>
    </div>

    <div class="mb-3">
        <label>Sub Picture 1 (Optional)</label>
        <input type="file" name="image2" class="form-control" accept=".jpg,.jpeg,.png">
    </div>

    <div class="mb-3">
        <label>Sub Picture 2 (Optional)</label>
        <input type="file" name="image3" class="form-control" accept=".jpg,.jpeg,.png">
    </div>

 <div class="mb-3">
        <label>Sub Picture 3 (Optional)</label>
        <input type="file" name="image4" class="form-control" accept=".jpg,.jpeg,.png">
    </div>


</div>

<button name="add_product" class="btn btn-success btn-lg">Save Product</button>
<a href="products.php" class="btn btn-secondary btn-lg">Cancel</a>

</form>

</div>

</div>

</div>

</body>
</html>