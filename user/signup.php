<?php
session_start();
require "../function/database.php";

$message = "";
$error = "";

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signup.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .signup-block {
            background: linear-gradient(to right, #4a90e2, #50e3c2);
            padding: 40px 0;
        }
        .signup-sec {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .signup-sec h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 5px;
            border-color: #ddd;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }
        .btn-primary:hover {
            background-color: #357abd;
            border-color: #357abd;
        }
        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-top: 15px;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        p.text-center {
            margin-top: 20px;
        }
        p.text-center a {
            color: #4a90e2;
            text-decoration: none;
        }
        p.text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<section class="signup-block">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 signup-sec">
                <h2 class="text-center">Create an Account</h2>
                <form method="POST" action="adduser.php" role="form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                        <label for="homemobile">Home Mobile</label>
                        <input type="text" name="homemobile" id="homemobile" class="form-control" placeholder="Home Mobile">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control" placeholder="Status">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" class="form-control" placeholder="Role">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Sign Up</button>
                    <?php if ($message): ?>
                        <div class="alert alert-success mt-3"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
                <p class="text-center mt-4">
                    Already have an account? <a href="login.php">Login</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap JS and dependencies -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
