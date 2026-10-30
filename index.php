<?php
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts of Mahera</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>

    .carousel-item::before{
        content:"";
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.35);
    }

    .carousel-caption{
        z-index:2;
    }

    .category-card{
    transition:0.3s;
}

.category-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 25px rgba(0,0,0,.15);
}

.product-card{
    transition:0.3s;
    border-radius:20px;
    overflow:hidden;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.15);
}

.review-card{
    border-radius:20px;
    transition:.3s;
}

.review-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.15);
}

.feature-box{
    background:#ffffff;
    border-radius:20px;
    transition:0.3s;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    height:100%;
}

.feature-box:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 35px rgba(0,0,0,0.15);
}

.feature-box h1{
    font-size:55px;
}

.feature-box h5{
    font-weight:bold;
    margin-top:15px;
}

.feature-box p{
    color:#6c757d;
}
.footer-section{
    background:#fff5f5;
    padding:60px 0 20px;
}

.footer-section h4,
.footer-section h5{
    color:#dc3545;
}

.footer-section a{
    color:#555;
    text-decoration:none;
    transition:.3s;
}

.footer-section a:hover{
    color:#dc3545;
    padding-left:5px;
}

.footer-section p{
    color:#666;
}

.footer-social a{
    width:50px;
    height:50px;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.12);
    margin-right:12px;
    transition:.3s;
    text-decoration:none;
}

.footer-social a:hover{
    transform:translateY(-5px) scale(1.1);
}

    </style>

</head>

<body>

<!-- ===================== NAVIGATION BAR ===================== -->

<?php include 'includes/navbar.php'; ?>

<!-- ===================== HERO SECTION ===================== -->

<div id="heroSlider"
     class="carousel slide carousel-fade"
     data-bs-ride="carousel"
     data-bs-interval="3000"
     data-bs-pause="false">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="images/banner1.jpg" class="d-block w-100" style="height:600px;object-fit:cover;">

            <div class="carousel-caption">
                <h1 class="fw-bold">Handmade Crochet Collection</h1>
                <p>Crafted with Love & Creativity</p>
                <a href="products.php" class="btn btn-danger btn-lg">
                    Shop Now
                </a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="images/banner2.jpg" class="d-block w-100" style="height:600px;object-fit:cover;">

            <div class="carousel-caption">
                <h1>Custom Gifts</h1>
                <p>Perfect for Every Occasion</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="images/banner3.jpg" class="d-block w-100" style="height:600px;object-fit:cover;">

            <div class="carousel-caption">
                <h1>Delivery Across Bangladesh</h1>
                <p>Order Your Favourite Crochet Products</p>
            </div>
        </div>

    </div>

</div>


<section class="hero-section py-5">

    <div class="container">

        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-lg-6">

                <h1 class="display-4 fw-bold">
                    Handmade Crochet
                    <span class="text-danger">& Artwork</span>
                </h1>

                <p class="lead mt-4">
                    Welcome to <strong>Arts of Mahera</strong>!

                    Discover beautiful handmade crochet flowers,
                    keychains, bouquets, baby shoes, and customized gifts
                    crafted with love and creativity.
                </p>

                <a href="products.php" class="btn btn-danger btn-lg me-3">
                    Shop Now
                </a>

                <a href="about.php" class="btn btn-outline-dark btn-lg">
                    Learn More
                </a>

            </div>

            <!-- Right Side -->
            <div class="col-lg-6 text-center">

               <img src="images/logo.png"
    class="card-img-top"
             style="height:400px; object-fit:cover;">

            </div>

        </div>

    </div>

</section>

<!-- ===================== CATEGORIES ===================== -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">Shop by Category</h2>

            <p class="text-muted">
                Explore our handmade collections.
            </p>

        </div>

        <div class="row">

<div class="col-md-3 mb-4">
    <div class="card category-card shadow border-0 h-100">
        <img src="images/categories/flower.jpg"
             class="card-img-top"
             style="height:220px;object-fit:cover;">

        <div class="card-body text-center">
            <h5>Crochet Flowers</h5>

            <a href="products.php?category=1"
               class="btn btn-outline-danger mt-2">
                Shop Now
            </a>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card category-card shadow border-0 h-100">
        <img src="images/categories/keychain.jpg"
             class="card-img-top"
             style="height:220px;object-fit:cover;">

        <div class="card-body text-center">
            <h5>Keychains</h5>

            <a href="products.php?category=2"
               class="btn btn-outline-danger mt-2">
                Shop Now
            </a>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card category-card shadow border-0 h-100">
        <img src="images/categories/hairclips.jpg"
             class="card-img-top"
             style="height:220px;object-fit:cover;">

        <div class="card-body text-center">
            <h5>Hair Clips</h5>

            <a href="products.php?category=3"
               class="btn btn-outline-danger mt-2">
                Shop Now
            </a>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card category-card shadow border-0 h-100">
        <img src="images/categories/baby.jpg"
             class="card-img-top"
             style="height:220px;object-fit:cover;">

        <div class="card-body text-center">
            <h5>Baby Items</h5>

            <a href="products.php?category=4"
               class="btn btn-outline-danger mt-2">
                Shop Now
            </a>
        </div>
    </div>
</div>

</div>

<!-- ===================== FEATURED PRODUCTS ===================== -->
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">Featured Products</h2>

            <p class="text-muted">
                Discover our handmade crochet collections.
            </p>

        </div>



        <div class="row">

<?php

$sql = "SELECT * FROM products
        ORDER BY product_id DESC
        LIMIT 6";
        
$result = $conn->query($sql);

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

?>

<div class="col-lg-4 col-md-6 mb-4">

<div class="card shadow border-0 h-100 product-card">

    <img src="images/products/<?php echo $row['image']; ?>"
         class="card-img-top"
         style="height:300px; object-fit:cover;">

    <div class="card-body">

        <span class="badge bg-danger mb-2">
            New
        </span>

        <h5 class="fw-bold">
            <?php echo $row['product_name']; ?>
        </h5>

        <p class="text-muted">
            <?php echo substr($row['description'],0,80); ?>...
        </p>

        <h4 class="text-danger">
            ৳ <?php echo $row['price']; ?>
        </h4>

        <small class="text-muted">
            ⏳ Preorder:
            <?php echo $row['preorder_days']; ?> Days
        </small>

    </div>

    <div class="card-footer bg-white border-0">

        <a href="product-details.php?id=<?php echo $row['product_id']; ?>"
           class="btn btn-outline-danger w-100 mb-2">
            👁 View Details
        </a>

        <a href="add-to-cart.php?id=<?php echo $row['product_id']; ?>"
           class="btn btn-danger w-100">
            🛒 Add to Cart
        </a>

    </div>

</div>

</div>

<?php

    }

}else{

    echo "<h3>No Products Found</h3>";

}

?>

</div>

<div class="text-center mt-4">

    <a href="products.php"
       class="btn btn-outline-danger btn-lg px-5">

        View All Products

    </a>

</div>
          
        

</section>

<!-- ===================== WHY CHOOSE US ===================== -->

<section class="py-5" style="background:#fff5f5;">

    <div class="container">

        <div class="text-center mb-5">

        <h2 class="fw-bold text-danger">
    Why Choose Arts of Mahera?
</h2>

<p class="text-muted fs-5">
    Every handmade product is crafted with love, attention to detail, and quality materials.
</p>

        </div>


        <div class="row text-center">


            <!-- Feature 1 -->
            <div class="col-md-3 mb-4">

                <div class="feature-box p-4">

                    <h1>💖</h1>

                    <h5>
                        Handmade With Love
                    </h5>

                    <p>
                        Every product is carefully handmade with passion.
                    </p>

                </div>

            </div>



            <!-- Feature 2 -->
            <div class="col-md-3 mb-4">

                <div class="feature-box p-4">

                    <h1>✨</h1>

                    <h5>
                        Unique Designs
                    </h5>

                    <p>
                        Special designs made for your beautiful moments.
                    </p>

                </div>

            </div>



            <!-- Feature 3 -->
            <div class="col-md-3 mb-4">

                <div class="feature-box p-4">

                    <h1>🎨</h1>

                    <h5>
                        Customized Orders
                    </h5>

                    <p>
                        Customize products according to your choice.
                    </p>

                </div>

            </div>



            <!-- Feature 4 -->
            <div class="col-md-3 mb-4">

                <div class="feature-box p-4">

                    <h1>🚚</h1>

                    <h5>
                        Delivery Service
                    </h5>

                    <p>
                        Products delivered safely across Bangladesh.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>

<!-- ===================== CUSTOMER REVIEWS ===================== -->

<section class="py-5" style="background:#fff8f8;">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Customer Reviews
            </h2>

            <p class="text-muted">
                What our customers say about us.
            </p>

        </div>


        <div class="row">


            <!-- Review 1 -->
         <div class="col-md-4 mb-4">

<div class="card review-card border-0 shadow h-100 text-center p-4">

<img src="images/customer/customer1.jpg"
     class="rounded-circle mx-auto mb-3"
     width="300"
     height="90"
     style="object-fit:cover;">

<h5 class="fw-bold">Ayesha Tasnim</h5>

<div class="text-warning fs-5 mb-3">
★★★★★
</div>

<p class="text-muted">
"The crochet Bag Charm exceeded my expectations.
The quality is outstanding and beautifully handcrafted."
</p>

</div>

</div>



            <!-- Review 2 -->
  <div class="col-md-4 mb-4">

<div class="card review-card border-0 shadow h-100 text-center p-4">

<img src="images/customer/customer2.jpg"
     class="rounded-circle mx-auto mb-3"
     width="300"
     height="90"
     style="object-fit:cover;">

<h5 class="fw-bold">Rasin Khan</h5>

<div class="text-warning fs-5 mb-3">
★★★★★
</div>

<p class="text-muted">
"I loved my customized keychain. It was exactly what I wanted."
</p>

</div>

</div>



            <!-- Review 3 -->
            <div class="col-md-4 mb-4">

<div class="card review-card border-0 shadow h-100 text-center p-4">

<img src="images/customer/customer3.jpg"
     class="rounded-circle mx-auto mb-3"
     width="300"
     height="90"
     style="object-fit:cover;">

<h5 class="fw-bold">Muzaddid Ahmed</h5>

<div class="text-warning fs-5 mb-3">
★★★★★
</div>

<p class="text-muted">
"Obsessed with my new Football Keyring.
The quality is outstanding and beautifully handcrafted."
</p>

</div>

</div>


        </div>

    </div>

</section>

<!-- ===================== CUSTOM ORDER SECTION ===================== -->

<section class="custom-order py-5">

    <div class="container">

        <div class="text-center">

            <h2 class="fw-bold">
                Want a Customized Product?
            </h2>

            <p class="lead mt-3">
                Tell us your idea and we will create a beautiful
                handmade product specially for you.
            </p>

            <a href="contact.php" class="btn btn-light btn-lg mt-3">
                Contact Us
            </a>

        </div>

    </div>

</section>

<!-- ===================== FOOTER ===================== -->

<footer class="footer-section">

<div class="container">

<div class="row">

<!-- Brand -->
<div class="col-lg-4 mb-4">

<h4 class="fw-bold text-danger">
Arts of Mahera 🌸
</h4>

<p>
Handmade crochet gifts, flowers, keychains, baby items, and custom creations made with love.
</p>

</div>

<!-- Quick Links -->
<div class="col-lg-4 mb-4">

<h5 class="fw-bold">
Quick Links
</h5>

<ul class="list-unstyled">

<li><a href="index.php">Home</a></li>
<li><a href="products.php">Products</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div>

<!-- Contact -->
<div class="col-lg-4 mb-4">

<h5 class="fw-bold">
Contact
</h5>

<p>📍 Sylhet, Bangladesh</p>

<p>✉️ maherammc@gmail.com</p>

<div class="footer-social mt-3">
    
    <!-- Facebook -->
    <a href="https://www.facebook.com/share/14kqk7DEanh/?mibextid=wwXIfr"
       target="_blank"
       class="me-3 text-primary fs-3">
        <i class="bi bi-facebook"></i>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/arts_of_mahera?igsh=ajEyeWxsajRndXY0&utm_source=qr"
       target="_blank"
       class="me-3 text-danger fs-3">
        <i class="bi bi-instagram"></i>
    </a>

    <!-- Threads -->
    <a href="https://www.threads.com/@arts_of_mahera?igshid=NTc4MTIwNjQ2YQ=="
       target="_blank"
       class="me-3 text-dark fs-3">
        <i class="bi bi-threads"></i>
    </a>

    <!-- TikTok -->
    <a href="https://www.tiktok.com/@maherachowdhury123?_r=1&_t=ZS-98a50Y0UNIC"
       target="_blank"
       class="text-dark fs-3">
        <i class="bi bi-tiktok"></i>
    </a>

</div>

</div>

</div>

<hr>

<div class="text-center">

<p class="mb-0">
© 2026 Arts of Mahera | Handmade with ❤️ | All Rights Reserved
</p>

</div>

</div>

</footer>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>