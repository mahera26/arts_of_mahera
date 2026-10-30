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

$id = $_GET['id'];

$categories = $conn->query("SELECT * FROM categories");

$product = $conn->query("SELECT * FROM products WHERE product_id='$id'");
$row = $product->fetch_assoc();

if(isset($_POST['update_product'])){

    $category_id      = $_POST['category_id'];
    $product_name     = $_POST['product_name'];
    $description      = $_POST['description'];
    $price            = $_POST['price'];
    $preorder_days    = $_POST['preorder_days'];
    $yarn_type        = $_POST['yarn_type'];
    $hook_size        = $_POST['hook_size'];
    $usage_ideas      = $_POST['usage_ideas'];
    $care_instructions= $_POST['care_instructions'];

    // Main Image
    $image = $row['image'];
    if($_FILES['image']['name']!=""){
        $image = $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"../images/products/".$image);
    }

    // Sub Picture 1
    $image2 = $row['image2'];
    if($_FILES['image2']['name']!=""){
        $image2 = $_FILES['image2']['name'];
        $tmp2   = $_FILES['image2']['tmp_name'];
        move_uploaded_file($tmp2,"../images/products/".$image2);
    }

    // Sub Picture 2
    $image3 = $row['image3'];
    if($_FILES['image3']['name']!=""){
        $image3 = $_FILES['image3']['name'];
        $tmp3   = $_FILES['image3']['tmp_name'];
        move_uploaded_file($tmp3,"../images/products/".$image3);
    }

     // Sub Picture 3
    $image4 = $row['image4'];
    if($_FILES['image4']['name']!=""){
        $image4 = $_FILES['image4']['name'];
        $tmp4   = $_FILES['image4']['tmp_name'];
        move_uploaded_file($tmp4,"../images/products/".$image4);
    }

    $sql="UPDATE products SET
    category_id='$category_id',
    product_name='$product_name',
    description='$description',
    price='$price',
    image='$image',
    image2='$image2',
    image3='$image3',
    image4='$image4',
    preorder_days='$preorder_days',
    yarn_type='$yarn_type',
    hook_size='$hook_size',
    usage_ideas='$usage_ideas',
    care_instructions='$care_instructions'
    WHERE product_id='$id'";

    if($conn->query($sql)){
        echo "<script>
        alert('Product Updated Successfully!');
        window.location='products.php';
        </script>";
    } else {
        echo "<div class='alert alert-danger'>".$conn->error."</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5 mb-5">

<div class="card shadow">

<div class="card-header bg-warning">
    <h3>Edit Product</h3>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Product Name</label>
<input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>">
</div>

<div class="mb-3">
<label>Category</label>
<select name="category_id" class="form-select">
<?php while($cat=$categories->fetch_assoc()){ ?>
<option value="<?php echo $cat['category_id']; ?>" <?php if($cat['category_id']==$row['category_id']) echo "selected"; ?>>
<?php echo $cat['category_name']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Price</label>
        <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label>Preorder Days</label>
        <input type="number" class="form-control" name="preorder_days" value="<?php echo $row['preorder_days']; ?>">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Yarn Type</label>
        <input type="text" class="form-control" name="yarn_type" value="<?php echo $row['yarn_type']; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label>Hook Size</label>
        <input type="text" class="form-control" name="hook_size" value="<?php echo $row['hook_size']; ?>">
    </div>
</div>

<div class="mb-3">
<label>Description</label>
<textarea class="form-control" rows="4" name="description"><?php echo $row['description']; ?></textarea>
</div>

<div class="mb-3">
<label>Usage Ideas</label>
<textarea class="form-control" rows="2" name="usage_ideas"><?php echo $row['usage_ideas']; ?></textarea>
</div>

<div class="mb-3">
<label>Care Instructions</label>
<textarea class="form-control" rows="2" name="care_instructions"><?php echo $row['care_instructions']; ?></textarea>
</div>

<!-- Image Management Section -->
<div class="card p-3 mb-3 bg-light border">
    <h5 class="mb-3">🖼 Update Images</h5>

    <div class="row mb-3">
        <div class="col-md-4">
            <label class="fw-bold">Main Image</label><br>
            <?php if(!empty($row['image'])){ ?>
                <img src="../images/products/<?php echo $row['image']; ?>" width="100" class="rounded border my-2"><br>
            <?php } ?>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="fw-bold">Sub Picture 1</label><br>
            <?php if(!empty($row['image2'])){ ?>
                <img src="../images/products/<?php echo $row['image2']; ?>" width="100" class="rounded border my-2"><br>
            <?php } ?>
            <input type="file" name="image2" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="fw-bold">Sub Picture 2</label><br>
            <?php if(!empty($row['image3'])){ ?>
                <img src="../images/products/<?php echo $row['image3']; ?>" width="100" class="rounded border my-2"><br>
            <?php } ?>
            <input type="file" name="image3" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="fw-bold">Sub Picture 3</label><br>
            <?php if(!empty($row['image4'])){ ?>
                <img src="../images/products/<?php echo $row['image4']; ?>" width="100" class="rounded border my-2"><br>
            <?php } ?>
            <input type="file" name="image4" class="form-control">
        </div>

    </div>
</div>

<button name="update_product" class="btn btn-primary">Update Product</button>
<a href="products.php" class="btn btn-secondary">Cancel</a>

</form>

</div>

</div>

</div>

</body>
</html>