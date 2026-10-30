<?php
session_start();
include 'includes/db.php';
$category_result = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Arts of Mahera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .product-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,.15);
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .price {
            color: #dc3545;
            font-size: 22px;
            font-weight: bold;
        }

        .preorder {
            color: #6c757d;
            font-size: 14px;
        }

        .rating {
            color: #ffc107;
        }

        .card-footer {
            background: white;
            border: none;
        }
    </style>
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-danger">
            Handmade Crochet Collection
        </h1>
        <p class="text-muted fs-5">
            Beautiful handmade crochet products crafted with love ❤️
        </p>
    </div>

    <!-- Search Form -->
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-10">
            <input type="text"
                   name="search"
                   class="form-control form-control-lg"
                   placeholder="🔍 Search handmade products..."
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        </div>

        <?php if(isset($_GET['category'])){ ?>
            <input type="hidden" name="category" value="<?php echo htmlspecialchars($_GET['category']); ?>">
        <?php } ?>

        <div class="col-md-2">
            <button class="btn btn-danger btn-lg w-100">
                Search
            </button>
        </div>
    </form>

    <!-- Category Filters -->
    <div class="mb-4 text-center">
        <a href="products.php"
           class="btn <?php echo !isset($_GET['category']) ? 'btn-danger' : 'btn-outline-danger'; ?> m-1">
            All
        </a>

        <?php while($cat = $category_result->fetch_assoc()){ ?>
            <a href="products.php?category=<?php echo $cat['category_id']; ?>"
               class="btn <?php echo (isset($_GET['category']) && $_GET['category'] == $cat['category_id']) ? 'btn-danger' : 'btn-outline-danger'; ?> m-1">
                <?php echo htmlspecialchars($cat['category_name']); ?>
            </a>
        <?php } ?>
    </div> 

    <!-- Dynamic Query & Cards Display -->
    <?php
    $where = array();

    if(isset($_GET['search']) && trim($_GET['search']) != ""){
        $search = $conn->real_escape_string($_GET['search']);
        $where[] = "(product_name LIKE '%$search%' OR description LIKE '%$search%' OR yarn_type LIKE '%$search%')";
    }

    if(isset($_GET['category']) && $_GET['category'] != ""){
        $category = (int)$_GET['category'];
        $where[] = "category_id = $category";
    }

    $sql = "SELECT * FROM products";
    if(count($where) > 0){
        $sql .= " WHERE " . implode(" AND ", $where);
    }
    $sql .= " ORDER BY product_id DESC";

    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
    ?>

    <div class="row g-4">

        <?php while($row = $result->fetch_assoc()){ ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product-card shadow-sm">

                    <img src="images/products/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['product_name']); ?>">

                    <div class="card-body d-flex flex-column">

                        <div class="mb-2 d-flex gap-1 flex-wrap">
                            <span class="badge bg-danger">Handmade</span>
                            <?php if(!empty($row['yarn_type'])){ ?>
                                <span class="badge bg-secondary-subtle text-dark border"><?php echo htmlspecialchars($row['yarn_type']); ?></span>
                            <?php } ?>
                        </div>

                        <h5 class="fw-bold">
                            <?php echo htmlspecialchars($row['product_name']); ?>
                        </h5>

                        <div class="rating mb-2">
                            ★★★★★
                        </div>

                        <p class="text-muted small">
                            <?php 
                                $clean_desc = strip_tags($row['description']);
                                echo htmlspecialchars(mb_substr($clean_desc, 0, 65)) . (mb_strlen($clean_desc) > 65 ? '...' : ''); 
                            ?>
                        </p>

                        <div class="mt-auto">
                            <div class="price">
                                ৳ <?php echo htmlspecialchars($row['price']); ?>
                            </div>

                            <div class="preorder mb-2">
                                ⏳ Preorder: <?php echo htmlspecialchars($row['preorder_days']); ?> Days
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-grid gap-2">
                            <a href="product-details.php?id=<?php echo $row['product_id']; ?>" class="btn btn-outline-danger btn-sm">
                                👁 View Details
                            </a>
                            <a href="add-to-cart.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">
                                🛒 Add to Cart
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        <?php } ?>

    </div>

    <?php
    } else {
        echo "<div class='alert alert-warning text-center py-4 my-4'>No products found matching your search.</div>";
    }
    ?>

</div>

</body>
</html>