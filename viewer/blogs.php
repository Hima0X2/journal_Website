<?php
require "../function/database.php"; // Include the database connection file

// Fetch blog data where blog_status is 1
$sql = "SELECT * FROM blog WHERE blog_status = 1"; // SQL query to get active blogs
$stmt = $con->query($sql); // Execute the query

// Fetch all results
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIJR - Blogs</title>
    <style>
        /* Basic CSS reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Hero section styles */
        .hero {
            background: url('path/to/your/hero-background.jpg') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 20px;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 8px;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.25em;
            line-height: 1.6;
        }

        /* Blogs list styles */
        .blogs-list {
            padding: 50px 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .blog {
            display: flex;
            align-items: flex-start;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            gap: 20px;
            max-width: 1200px; /* Widen the alignment */
            margin: 0 auto; /* Center the blog items */
        }

        .blog img {
            max-width: 200px; /* Adjust as needed */
            border-radius: 8px;
        }

        .blog-info {
            max-width: 100%; /* Allow full width */
        }

        .blog-info h4 {
            font-size: 1.75em;
            margin-bottom: 10px;
        }

        .blog-info p {
            margin: 5px 0;
            font-size: 1em;
        }

        .blog-info p strong {
            font-weight: bold;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            position: relative; /* Changed from fixed */
            width: 100%;
        }

        footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        footer .social-icons {
            display: flex;
            gap: 15px;
            align-items: center; /* Center alignment */
        }

        footer .social-icons a {
            color: white;
        }

        footer .social-icons img {
            width: 30px;
            height: 30px;
            vertical-align: middle; /* Remove bottom margin */
        }

        footer .contact-info {
            text-align: right;
            flex: 1;
        }

        footer .contact-info p {
            margin: 5px 0;
        }

        footer .form-inline {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        footer .form-inline .form-control {
            margin-right: 10px;
        }

        footer .form-inline .btn-primary {
            background-color: #007bff;
            border: none;
        }

        footer .form-inline .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); // Include the header ?>

<section class="blogs">
    <h2>Explore Our Blogs</h2>
    <div class="blogs-list">
        <?php if (count($blogs) > 0): // Check if there are any results ?>
            <?php foreach ($blogs as $row): // Loop through each result ?>
                <div class="blog">
                    <img src="<?php echo htmlspecialchars($row['blog_image']); ?>" alt="Blog Image"> <!-- Display blog image -->
                    <div class="blog-info">
                        <h4><?php echo htmlspecialchars($row['blog_title']); ?></h4> <!-- Display blog title -->
                        <p><strong>Slug:</strong> <?php echo htmlspecialchars($row['blog_slug']); ?></p> <!-- Display blog slug -->
                        <p><?php echo htmlspecialchars($row['blog_description']); ?></p> <!-- Display blog description -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No blogs found.</p> <!-- Message if no blogs are found -->
        <?php endif; ?>
    </div>
</section>

<?php include('includes/footer.php'); // Include the footer ?>

</body>
</html>
