<?php 
session_start();
require "../function/database.php";

$message = ""; 
$error = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == '' || $password == '') {
        $message = "Please fill up all fields";
    } else {
        try {
            // Prepare SQL statement with a placeholder
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $con->prepare($sql);
            // Bind the username to the placeholder
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // Check if the password matches
                if (password_verify($password, $row['password']) || $password === $row['password']) {    
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id']; 
                    header('Location: dashboard.php?welcome=login');    
                    exit();
                } else {
                    $error = "Incorrect username or password"; 
                }
            } else {
                $error = "User not found"; 
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Publication Site</title>

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet"> 
</head>
<body>
<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Login Now</h2>
                <form class="login-form" method="POST" action="login.php">
                    <div class="form-group">
                        <label for="username" class="text-uppercase">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-uppercase">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="checkbox" class="form-check-input">
                            <small>Remember Me</small>
                        </label>
                        <button type="submit" name="submit" class="btn btn-login float-right">Submit</button>
                    </div>
                    <?php if ($message): ?>
                        <div class="alert alert-warning"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
                <p class="text-center mt-4">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </p>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>This is publication site</h2>
                                    <p>Journal articles are a highly credible source for people who want to learn about a certain topic. They are usually published in peer-reviewed journals and cover a wide range of topics in a specific field. A journal article usually has an abstract, introduction, methods, results, and discussion sections.</p>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS and dependencies -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
