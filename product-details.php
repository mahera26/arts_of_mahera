<?php
session_start();
include 'includes/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$product_id = (int)$_GET['id'];

// Secure prepared statement
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<div class='container my-5 alert alert-danger'>Product not found!</div>";
    exit();
}

$product = $result->fetch_assoc();

// Prepare main image and all 3 sub-pictures dynamically from database
$main_image = !empty($product['image']) ? 'images/products/' . $product['image'] : 'images/default.jpg';
$image2 = !empty($product['image2']) ? 'images/products/' . $product['image2'] : null;
$image3 = !empty($product['image3']) ? 'images/products/' . $product['image3'] : null;
$image4 = !empty($product['image4']) ? 'images/products/' . $product['image4'] : null; // 3rd Sub-picture

// Dynamic variables for database values
$yarn_type = !empty($product['yarn_type']) ? $product['yarn_type'] : 'Premium Soft Cotton Blend';
$hook_size = !empty($product['hook_size']) ? $product['hook_size'] : '3.0 mm Ergonomic Hook';
$care_instructions = !empty($product['care_instructions']) ? $product['care_instructions'] : '100% Washable (Gentle Hand Wash)';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['product_name']); ?> | Arts of Mahera</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        .main-product-img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            border-radius: 16px;
            cursor: pointer;
            transition: opacity 0.2s ease-in-out;
        }

        .main-product-img:hover {
            opacity: 0.95;
        }

        .thumb-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .thumb-img:hover, .thumb-img.active {
            border-color: #dc3545;
            transform: scale(1.05);
        }

        .price-tag {
            font-size: 2.2rem;
            font-weight: 700;
            color: #dc3545;
        }

        .feature-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            border: 1px solid #e9ecef;
        }

        .feature-card i {
            font-size: 1.4rem;
            color: #dc3545;
            margin-bottom: 6px;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            font-weight: 600;
        }

        .nav-tabs .nav-link.active {
            color: #dc3545;
            border-bottom: 3px solid #dc3545;
        }

        .spec-list li {
            margin-bottom: 8px;
        }
    </style>
</head>

<body class="bg-light">

<?php include 'includes/navbar.php'; ?>

<div class="container my-5">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php" class="text-decoration-none text-muted">Products</a></li>
            <li class="breadcrumb-item active text-danger" aria-current="page"><?php echo htmlspecialchars($product['product_name']); ?></li>
        </ol>
    </nav>

    <!-- Main Product Section -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-5">
        <div class="row g-5">

            <!-- Gallery Side (Supports Main Image + 3 Sub Pictures) -->
            <div class="col-lg-6">
                <div class="mb-3 position-relative">
                    <img id="mainDisplayImage" 
                         src="<?php echo htmlspecialchars($main_image); ?>" 
                         class="main-product-img shadow-sm" 
                         alt="Product Image"
                         onclick="openModalImage(this.src)">
                    <span class="badge bg-dark bg-opacity-75 text-white position-absolute bottom-0 end-0 m-3 px-2 py-1 rounded small">
                        <i class="fas fa-search-plus me-1"></i> Click to Zoom
                    </span>
                </div>

                <!-- Thumbnails Bar (4 Images Total) -->
                <div class="d-flex gap-3 flex-wrap">
                    <!-- Main Cover Image -->
                    <img src="<?php echo htmlspecialchars($main_image); ?>" 
                         class="thumb-img active" 
                         onclick="switchImage(this, '<?php echo htmlspecialchars($main_image); ?>')" 
                         alt="Main Thumbnail">
                    
                    <!-- Sub Picture 1 -->
                    <?php if ($image2): ?>
                        <img src="<?php echo htmlspecialchars($image2); ?>" 
                             class="thumb-img" 
                             onclick="switchImage(this, '<?php echo htmlspecialchars($image2); ?>')" 
                             alt="Sub Picture 1">
                    <?php endif; ?>

                    <!-- Sub Picture 2 -->
                    <?php if ($image3): ?>
                        <img src="<?php echo htmlspecialchars($image3); ?>" 
                             class="thumb-img" 
                             onclick="switchImage(this, '<?php echo htmlspecialchars($image3); ?>')" 
                             alt="Sub Picture 2">
                    <?php endif; ?>

                    <!-- Sub Picture 3 -->
                    <?php if ($image4): ?>
                        <img src="<?php echo htmlspecialchars($image4); ?>" 
                             class="thumb-img" 
                             onclick="switchImage(this, '<?php echo htmlspecialchars($image4); ?>')" 
                             alt="Sub Picture 3">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Details Side -->
            <div class="col-lg-6 d-flex flex-column justify-content-between">
                <div>
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-bold mb-3">
                        <i class="fas fa-heart me-1"></i> Handcrafted Item
                    </span>

                    <h1 class="fw-bold mb-2"><?php echo htmlspecialchars($product['product_name']); ?></h1>

                    <div class="d-flex align-items-center mb-3">
                        <div class="text-warning me-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-muted small">(5.0 Rating / Verified Craft)</span>
                    </div>

                    <div class="price-tag mb-2">
                        ৳ <?php echo htmlspecialchars($product['price']); ?>
                    </div>

                    <div class="text-secondary mb-4">
                        <i class="far fa-clock me-1 text-danger"></i> <strong>Preorder Time:</strong> <?php echo htmlspecialchars($product['preorder_days']); ?> Days
                    </div>

                    <!-- Quick Overview Highlights -->
                    <div class="bg-light p-3 rounded-3 mb-4 border">
                        <h6 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle text-danger me-1"></i> Quick Highlights</h6>
                        <ul class="list-unstyled mb-0 small text-muted">
                            <li><strong>Handmade By:</strong> Arts of Mahera</li>
                            <li><strong>Yarn Type:</strong> <?php echo htmlspecialchars($yarn_type); ?></li>
                            <li><strong>Hook Size:</strong> <?php echo htmlspecialchars($hook_size); ?></li>
                            <li><strong>Care:</strong> <?php echo htmlspecialchars($care_instructions); ?></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <!-- Action Buttons -->
                    <div class="d-grid gap-2 d-md-flex mb-4">
                        <a href="add-to-cart.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger btn-lg px-4 flex-grow-1">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </a>
                        <a href="checkout.php?direct_buy=<?php echo $product['product_id']; ?>" class="btn btn-outline-danger btn-lg px-4 flex-grow-1">
                            Buy Now
                        </a>
                    </div>

                    <!-- Highlights Grid -->
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="feature-card">
                                <i class="fas fa-hands"></i>
                                <div class="small fw-bold">100% Handmade</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="feature-card">
                                <i class="fas fa-paint-brush"></i>
                                <div class="small fw-bold">Custom Colors</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="feature-card">
                                <i class="fas fa-pump-soap"></i>
                                <div class="small fw-bold">Washable</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="feature-card">
                                <i class="fas fa-gift"></i>
                                <div class="small fw-bold">Gift Ready</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Extra Details Section -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <ul class="nav nav-tabs mb-4" id="detailsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About This Item</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="materials-tab" data-bs-toggle="tab" data-bs-target="#materials" type="button" role="tab">Craft Materials & Hook</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="uses-tab" data-bs-toggle="tab" data-bs-target="#uses" type="button" role="tab">How to Use</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="care-tab" data-bs-toggle="tab" data-bs-target="#care" type="button" role="tab">Washing & Care</button>
            </li>
        </ul>

        <div class="tab-content text-secondary lh-lg" id="detailsTabContent">
            
            <!-- Tab 1: About This Item -->
            <div class="tab-pane fade show active" id="about" role="tabpanel">
                <p>
                    Bring warmth, charm, and handmade sweetness into your everyday life with this custom piece from <strong>Arts of Mahera</strong>! Carefully stitched loop by loop, it features a cozy texture, beautiful finish, and an charming handmade touch that brightens up any setting.
                </p>
                <p>
                    Whether you are accenting your personal space or picking out a thoughtful present, this handcrafted creation adds character and cozy vibes wherever it goes.
                </p>

                <h5 class="fw-bold text-dark mt-4 mb-3">Product Highlights</h5>
                <ul class="spec-list">
                    <li>❤️ <strong>100% Handcrafted:</strong> Mindfully crocheted with precision and attention to detail.</li>
                    <li>🌸 <strong>Cozy & Durable:</strong> Soft-touch texture designed to last without losing shape.</li>
                    <li>🎁 <strong>Thoughtful Gift:</strong> Ideal for birthdays, anniversaries, housewarmings, or small surprise gifts.</li>
                    <li>✨ <strong>Versatile Display:</strong> Easy to place on desks, shelves, dressers, or bag attachments.</li>
                </ul>

                <div class="alert alert-warning border-0 mt-4 text-dark small">
                    <strong>📌 Please Note:</strong>
                    <ul class="mb-0 mt-1 ps-3">
                        <li>This listing includes <strong>ONE</strong> handmade item. Decorative props shown in photos are not included.</li>
                        <li>Because each piece is handmade with love, minor size and stitch variations may occur, making your product uniquely yours!</li>
                        <li>Colors may vary slightly due to monitor lighting and device settings.</li>
                    </ul>
                </div>
            </div>

            <!-- Tab 2: Materials & Tools -->
            <div class="tab-pane fade" id="materials" role="tabpanel">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="fw-bold text-dark" style="width: 220px;">Yarn Used:</td>
                            <td><?php echo htmlspecialchars($yarn_type); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">Hook Size:</td>
                            <td><?php echo htmlspecialchars($hook_size); ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">Stuffing (if applicable):</td>
                            <td>Hypoallergenic Polyester Fiberfill</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">Crafted By:</td>
                            <td>Arts of Mahera</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tab 3: Usage Ideas -->
            <div class="tab-pane fade" id="uses" role="tabpanel">
                <p class="mb-3">This versatile piece can be styled and used in many lovely ways:</p>
                <ul class="spec-list">
                    <li>🏡 <strong>Home & Room Decor:</strong> Display on bookshelves, bedside tables, desks, or cozy corners etc.</li>
                    <li>👜 <strong>Fashion & Accessories:</strong> Wear as hair accessories, bag charms, or keyrings (depending on item style).</li>
                    <li>🎉 <strong>Gifting:</strong> Perfect surprise for crochet lovers, friends, family, kids, and coworkers.</li>
                    <li>📸 <strong>Photo Props:</strong> Adds a charming, rustic touch to photography backdrops and flatlays.</li>
                </ul>
            </div>

            <!-- Tab 4: Washing & Care -->
            <div class="tab-pane fade" id="care" role="tabpanel">
                <h6 class="fw-bold text-dark mb-2">Is it Washable? If Yes then! 🧼</h6>
                <p>Keep your handmade item clean and fresh with these easy care steps:</p>
                <ul class="spec-list">
                    <li><strong>Hand Wash Only:</strong> Soak gently in cold water using a mild shampoo or liquid soap.</li>
                    <li><strong>No Harsh Scrubbing:</strong> Gently press the item to clean. Do not wring or twist firmly.</li>
                    <li><strong>Drying:</strong> Lay flat on a clean towel in the shade to dry naturally. Do not hang or tumble dry.</li>
                    <li><strong>Bleach/Ironing:</strong> Do not bleach or use hot steam irons directly on the yarn.</li>
                </ul>
            </div>

        </div>
    </div>

</div>

<!-- Fullscreen Pop-up Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center position-relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <img id="modalFullImage" src="" class="img-fluid rounded-4 shadow-lg" style="max-height: 85vh; object-fit: contain;">
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Gallery & Lightbox JavaScript Logic -->
<script>
    // Switches the main image display when clicking a thumbnail
    function switchImage(thumbElement, imageSrc) {
        const mainImg = document.getElementById('mainDisplayImage');
        if (mainImg && imageSrc) {
            mainImg.src = imageSrc;
            
            const thumbnails = document.querySelectorAll('.thumb-img');
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            
            thumbElement.classList.add('active');
        }
    }

    // Opens the active image in a full-screen modal
    function openModalImage(imageSrc) {
        const modalImg = document.getElementById('modalFullImage');
        if (modalImg && imageSrc) {
            modalImg.src = imageSrc;
            const lightbox = new bootstrap.Modal(document.getElementById('lightboxModal'));
            lightbox.show();
        }
    }
</script>

</body>
</html>