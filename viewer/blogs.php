<?php
require "../function/database.php"; // Include the database connection file

// Fetch blog data and corresponding blog image where blog_status is 1
$sql = "SELECT blog.*, blog_images.image_url 
        FROM blog 
        LEFT JOIN blog_images ON blog.id = blog_images.blog_id 
        WHERE blog.blog_status = 1";
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

        /* Blogs section styles */
section.blogs {
    padding: 60px 20px;
    background-color: #f9f9f9;
    text-align: center;
}

section.blogs h2 {
    font-size: 2.5em;
    margin-bottom: 40px;
    color: #333;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

section.blogs h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background-color: #007bff;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

/* Blogs list styles */
.blogs-list {
    display: flex;
    flex-direction: column;
    gap: 30px;
    padding: 20px;
}

.blog {
    display: flex;
    align-items: flex-start;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 25px;
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
    transition: transform 0.3s, box-shadow 0.3s;
}

.blog:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.blog img {
    max-width: 200px;
    border-radius: 8px;
    flex-shrink: 0;
}

.blog-info {
    flex-grow: 1;
}

.blog-info h4 {
    font-size: 1.75em;
    margin-bottom: 10px;
    color: #007bff;
}

.blog-info p {
    margin: 10px 0;
    font-size: 1em;
    color: #666;
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
                <a href="blog-details.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                    <!-- Display an image icon instead of the blog image -->
                    <img src="../images/blog.avif" alt="Blog Image Placeholder"> <!-- Replace blog image with icon -->
            </a>
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
