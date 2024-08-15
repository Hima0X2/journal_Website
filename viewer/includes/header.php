<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIJR - International Scholarly Publisher</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Header Styling */
        .navbar {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 98%;
            margin: 0;
        }

        .navbar h2 {
            margin: 0;
            font-size: 24px;
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar ul li {
            position: relative;
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            transition: 0.3s;
        }

        .navbar ul li a:hover {
            color: #cce5ff;
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            display: none; /* Hide by default */
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #343a40;
            border: 1px solid #fff;
            border-radius: 4px;
            z-index: 1000;
            padding: 0;
            list-style: none;
            min-width: 150px;
        }

        .dropdown-menu li {
            margin: 0;
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }

        .dropdown-menu li a:hover {
            background-color: #495057;
        }

        /* Show dropdown menu on hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
<div class="navbar">
    <h2><a href="index.php" style="color: white; text-decoration: none;">AIJR</a></h2>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
            <a href="#">Publication</a>
            <ul class="dropdown-menu">
                <li><a href="journal.php">Journals</a></li>
                <li><a href="blogs.php">Blogs</a></li>
            </ul>
        </li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="../user/login.php">Login</a></li>
    </ul>
</div>
</body>
</html>
