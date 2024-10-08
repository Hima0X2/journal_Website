<?php 
session_start();
if(!isset($_SESSION['username'])){
   header('location: login.php'); 
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    
  <title>Publication Website</title>

  <!-- Load external libraries -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/chosen.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/chosen.css">
  <link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/summernote/summernote-bs4.min.js"></script>
  <link href="assets/simple-sidebar.css" rel="stylesheet">
  <script src='assets/sweetalert/sweetalert.js'></script>
  <link rel='stylesheet' href='assets/sweetalert/sweetalert.css'>
  <link href='sweetalert/docs.css' rel='stylesheet'>
</head>

<body style="font-size: 16px;">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Publication Site </div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a> 
        <a href="manage_blogs.php" class="list-group-item list-group-item-action bg-light">Manage Blogs</a>
        <a href="manage_journals.php" class="list-group-item list-group-item-action bg-light">Manage Journals</a>
        <div class="list-group-item list-group-item-action text-success">Made by Samanta</div>  
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn-sm btn-primary" id="menu-toggle"><i class="fa fa-expand" aria-hidden="true"></i></button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $_SESSION['username'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="die.php">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

</body>
</html>
