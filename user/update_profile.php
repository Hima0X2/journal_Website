<?php
require "../function/database.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<div class='alert alert-danger'>You need to be logged in to update your profile.</div>";
    exit;
}

// Fetch user data from the database based on the username
$username = $_SESSION['username'];
$stmt = $con->prepare("SELECT username, password, firstname, lastname, email, mobile, homemobile, description, address, status, ip, country, role, time FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo "<div class='alert alert-danger'>User not found.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $homemobile = $_POST['homemobile'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $country = $_POST['country'];
    $role = $_POST['role'];

    // Update user profile
    $stmt = $con->prepare("UPDATE users SET password = ?, firstname = ?, lastname = ?, email = ?, mobile = ?, homemobile = ?, description = ?, address = ?, status = ?, country = ?, role = ? WHERE username = ?");
    $stmt->execute([$password, $firstname, $lastname, $email, $mobile, $homemobile, $description, $address, $status, $country, $role, $username]);
    
    // Redirect to the dashboard after successful update
    header("Location: dashboard.php");
    exit;
}

require "site/header.php";
require "site/footer.php";
?>
