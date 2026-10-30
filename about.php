<?php
include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us | Arts of Mahera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .about-section{
            padding:80px 0;
        }

        .about-img{
            border-radius:25px;
            width:100%;
            height:450px;
            object-fit:cover;
        }

        .about-title{
            font-size:45px;
            font-weight:700;
        }

        .highlight{
            color:#d63384;
        }

        .feature-box{
            background:#fff;
            padding:30px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
            text-align:center;
            height:100%;
        }

        .feature-box h4{
            color:#d63384;
            margin-bottom:15px;
        }

    </style>

</head>

<body>


<!-- About Hero Section -->

<section class="about-section">
<div class="container">

<div class="row align-items-center">

    <div class="col-md-6">

        <!-- Change this image with your own business image -->
        <img src="images/about.jpg" class="about-img">

    </div>


    <div class="col-md-6 mt-4 mt-md-0">

        <h1 class="about-title">
            About <span class="highlight">Arts of Mahera</span>
        </h1>


        <p class="lead mt-4">
            Welcome to Arts of Mahera, where creativity meets handmade beauty.
            We create unique crochet flowers, keychains, baby items, customized
            gifts, and artistic handmade products with love and care.
        </p>


        <p>
            Every product is carefully handcrafted with attention to detail.
            Our mission is to bring beautiful handmade memories to your special moments.
            <br><br>

Our goal is to spread happiness through handmade creativity and provide
unique, personalized products for birthdays, weddings, special occasions,
and everyday moments. Thank you for supporting our small business and
being a part of our creative journey.
        </p>


        <a href="products.php" class="btn btn-danger mt-3 px-4">
            Explore Products
        </a>

    </div>

</div>

</div>
</section>



<!-- Features Section -->

<section class="py-5 bg-light">

<div class="container">

<div class="row g-4">


<div class="col-md-4">

<div class="feature-box">

<h4>🌸 Handmade Quality</h4>

<p>
Every item is handmade with patience,
creativity and premium materials.
</p>

</div>

</div>



<div class="col-md-4">

<div class="feature-box">

<h4>🎁 Customized Gifts</h4>

<p>
We create personalized gifts according
to your special occasions and choices.
</p>

</div>

</div>




<div class="col-md-4">

<div class="feature-box">

<h4>🚚 Delivery Across Bangladesh</h4>

<p>
Order your favourite handmade products
and get delivery anywhere in Bangladesh.
</p>

</div>

</div>


</div>

</div>

</section>



<!-- Story Section -->

<section class="py-5">

<div class="container text-center">

<h2 class="fw-bold">
Our Story
</h2>

<!-- Owner Section -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center">

            <!-- Left Side -->
            <div class="col-md-5 text-center">

                <img src="images/owner.jpg"
                     class="rounded-circle shadow img-fluid"
                     style="width:350px; height:350px; object-fit:cover;">

                <div class="mt-4">

                    <h4 class="fw-bold mb-1">
                        Mahera Chowdhury
                    </h4>

                    <p class="text-danger fw-semibold mb-2">
                        Founder & Handmade Crochet Artist
                    </p>

                    <blockquote class="fst-italic text-muted">
                        "Every stitch tells a story, and every handmade piece is
                        created with love, care, and creativity."
                    </blockquote>

                </div>

            </div>

            <!-- Right Side -->
            <div class="col-md-7 mt-4 mt-md-0">

                <h2 class="fw-bold">
                    Meet the Owner of
                    <span class="highlight">Arts of Mahera</span>
                </h2>

                <p class="mt-3">
                    Arts of Mahera is a one-person handmade business where every
                    product is personally designed and handcrafted by the owner
                    with love, patience, and creativity.
                </p>

                <p>
                    Unlike mass-produced products, every crochet flower,
                    keychain, bouquet, baby item, and customized gift is made
                    carefully by hand. Each piece takes time, dedication, and
                    attention to detail to achieve the highest quality.
                </p>

                <p>
                    Since every order is handmade by one person, we kindly ask
                    for your patience during the production process. Customized
                    and larger orders may require additional time to ensure
                    every product is finished with the care it deserves.
                </p>

                <p>
                    Your support means the world to this small business.
                    Thank you for choosing Arts of Mahera and helping keep the
                    beauty of handmade craftsmanship alive.
                </p>

            </div>

        </div>

    </div>

</section>



<?php
include 'includes/footer.php';
?>


</body>
</html>