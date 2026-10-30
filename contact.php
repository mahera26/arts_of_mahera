<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Contact | Arts of Mahera</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="css/style.css">

<style>

body{
background:#fff7f8;
}

.contact-title{
color:#d63384;
font-size:55px;
font-weight:bold;
}

.contact-subtitle{
font-size:28px;
color:#555;
margin-bottom:50px;
}

.contact-card{
background:white;
border-radius:25px;
padding:35px;
height:100%;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.contact-card h2{
color:#d63384;
font-weight:bold;
text-align:center;
margin-bottom:30px;
}

.info-item{
display:flex;
align-items:center;
margin-bottom:25px;
}

.icon-box{
width:55px;
height:55px;
background:#ffe5ec;
border-radius:15px;
display:flex;
justify-content:center;
align-items:center;
font-size:25px;
color:#d63384;
margin-right:18px;
}

.social-icons{
margin-top:40px;
text-align:center;
}

.social-icons a{

width:55px;
height:55px;

display:inline-flex;

justify-content:center;

align-items:center;

font-size:28px;

border-radius:15px;

margin:8px;

text-decoration:none;

color:white;

transition:.3s;

}

.social-icons a:hover{
transform:translateY(-5px);
}

.facebook{
background:#1877f2;
}

.instagram{
background:#E4405F;
}

.tiktok{
background:#000;
}

.threads{
background:#111;
}

.btn-send{

background:#dc3545;

color:white;

font-size:22px;

border:none;

border-radius:12px;

padding:12px;

}

.btn-send:hover{

background:#bb2d3b;

color:white;

}

.form-control{

padding:14px;

border-radius:10px;

}

textarea{

resize:none;

}

</style>

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container py-5">

<div class="text-center mb-5">

<h1 class="contact-title">
Contact Arts of Mahera
</h1>

<p class="contact-subtitle">
We'd love to hear from you!
</p>

</div>

<div class="row g-4 align-items-stretch">

<!-- LEFT -->

<div class="col-lg-4 d-flex">

<div class="contact-card w-100">

<h2>Contact Information</h2>

<div class="info-item">

<div class="icon-box">

<i class="bi bi-geo-alt"></i>

</div>

<div>

<h5 class="mb-1">Address</h5>

Sylhet, Bangladesh

</div>

</div>

<div class="info-item">

<div class="icon-box">

<i class="bi bi-envelope"></i>

</div>

<div>

<h5 class="mb-1">Email</h5>

maherammc@gmail.com

</div>

</div>

<div class="info-item">

<div class="icon-box">

<i class="bi bi-calendar-check"></i>

</div>

<div>

<h5 class="mb-1">Working Days</h5>

Saturday - Thursday

</div>

</div>

<div class="info-item">

<div class="icon-box">

<i class="bi bi-clock"></i>

</div>

<div>

<h5 class="mb-1">Working Hours</h5>

10:00 AM - 2:00 AM

</div>

</div>

<div class="info-item">

<div class="icon-box">

<i class="bi bi-balloon-heart"></i>

</div>

<div>

<h5 class="mb-1">What We Do</h5>

Handmade Crochet Products

</div>

</div>

<hr>

<h4 class="text-center mt-4 mb-4">
Follow Us
</h4>

<div class="social-icons">

<a href="https://facebook.com/"
class="facebook">

<i class="bi bi-facebook"></i>

</a>

<a href="https://instagram.com/arts_of_mahera"
class="instagram">

<i class="bi bi-instagram"></i>

</a>

<a href="#"
class="tiktok">

<i class="bi bi-tiktok"></i>

</a>

<a href="#"
class="threads">

<i class="bi bi-threads"></i>

</a>

</div>

</div>

</div>

<!-- RIGHT -->

<div class="col-lg-8 d-flex">

<div class="contact-card w-100">

<form action="" method="POST">

<div class="mb-3">

<label class="form-label">
Full Name
</label>

<input type="text"
class="form-control"
placeholder="Enter your full name">

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>Email</label>

<input type="email"
class="form-control"
placeholder="Enter your email">

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input type="text"
class="form-control"
placeholder="Enter your phone">

</div>

</div>

<div class="mb-3">

<label>Address</label>

<input type="text"
class="form-control"
placeholder="Enter your address">

</div>

<div class="mb-3">

<label>Subject</label>

<input type="text"
class="form-control"
placeholder="Enter subject">

</div>

<div class="mb-4">

<label>Message</label>

<textarea rows="6"
class="form-control"
placeholder="Write your message"></textarea>

</div>

<button class="btn btn-send w-100">

<i class="bi bi-send"></i>

Send Message

</button>

</form>

</div>

</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>