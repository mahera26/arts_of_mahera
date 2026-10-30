

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold text-danger" href="index.php">
            🌸 Arts of Mahera
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <?php if(isset($_SESSION['user_id'])) { ?>

<li class="nav-item">
    <a class="nav-link" href="cart.php">
        🛒 Cart
    </a>
</li>


<li class="nav-item">
    <a class="nav-link" href="#">
        👋 <?php echo $_SESSION['full_name']; ?>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="logout.php">
        Logout
    </a>
</li>

<?php } else { ?>

<li class="nav-item">
    <a class="nav-link" href="login.php">
        Login
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="register.php">
        Register
    </a>
</li>


<?php } ?>



            </ul>

        </div>

    </div>
</nav>