
<!DOCTYPE html>
<html>
<head>
    <title>Register - Arts of Mahera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-lg-6 col-md-8 col-sm-10">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-5">

                <h2 class="text-center text-danger fw-bold mb-2">
                    Create Account
                </h2>

                <p class="text-center text-muted mb-4">
                    Join Arts of Mahera
                </p>

                <form action="register_process.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="full_name" class="form-control rounded-3" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-3" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="text" name="phone" class="form-control rounded-3" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">District</label>
                            <select name="district" class="form-select rounded-3" required>
                                <option value="">Select District</option>
                                <option>Sylhet</option>
                                <option>Dhaka</option>
                                <option>Chattogram</option>
                                <option>Rajshahi</option>
                                <option>Khulna</option>
                                <option>Barishal</option>
                                <option>Rangpur</option>
                                <option>Mymensingh</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Delivery Address</label>
                        <textarea name="address" class="form-control rounded-3" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control rounded-3" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control rounded-3" required>
                        </div>
                    </div>

                    <button type="submit" name="register" class="btn btn-danger w-100 rounded-3 py-2 fw-bold">
                        Create Account
                    </button>

                </form>

                <div class="text-center mt-4">
                    <small>
                        Already have an account?
                        <a href="login.php" class="text-danger fw-bold text-decoration-none">
                            Login
                        </a>
                    </small>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>