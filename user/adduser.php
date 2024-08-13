<?php
session_start();
require "../function/database.php";

if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $homemobile = $_POST['homemobile'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $country = $_POST['country'];
    $role = $_POST['role'];

    // Check if any field is empty
    if ($username == '' || $password == '' || $firstname == '' || $lastname == '' || $email == '') {
        $_SESSION['error'] = "Please fill up all required fields";
        header('Location: signup.php');
        exit();
    }

    try {
        // Prepare SQL statement
        $sql = "INSERT INTO users (username, password, firstname, lastname, email, mobile, homemobile, description, address, status, ip, country, role) 
                VALUES (:username, :password, :firstname, :lastname, :email, :mobile, :homemobile, :description, :address, :status, :ip, :country, :role)";
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // No hashing
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':homemobile', $homemobile);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':role', $role);

        // Execute statement
        if ($stmt->execute()) { 
            echo '<script>alert("New account created successfully!");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        } else {
            $_SESSION['error'] = "Error while creating account";
            header('Location: signup.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header('Location: signup.php');
        exit();
    }
}
