
<?php
require "../function/database.php"; // Include the database connection file

// Get the blog ID from the URL
$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the detailed blog information
$sql = "SELECT * FROM blog WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $blog_id, PDO::PARAM_INT);
$stmt->execute();

// Fetch the result
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog) {
    die("Blog not found."); // If no blog found, show an error message
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Details</title>
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
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .journal-cover {
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .journal-info {
            margin-bottom: 20px;
        }

        .journal-info p {
            margin: 10px 0;
            font-size: 1em;
        }

        .journal-info p strong {
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
<?php if (!empty($blog['blog_cover'])): ?>
        <img src="../images/blog.avif" alt="Image Icon"> <!-- Replace journal cover with image icon -->
    <?php endif; ?>
    <h1><?php echo htmlspecialchars($blog['blog_title']); ?></h1>
    <p><strong>Slug:</strong> <?php echo htmlspecialchars($blog['blog_slug']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($blog['blog_description']); ?></p>
    <p><strong>Published Date:</strong> <?php echo htmlspecialchars($blog['blog_date']); ?></p>
    <p><strong>Tags:</strong> <?php echo htmlspecialchars($blog['blog_tags']); ?></p>
    <p><strong>Creation Date:</strong> <?php echo htmlspecialchars($blog['blog_creation']); ?></p>
    <p><strong>Last Update:</strong> <?php echo htmlspecialchars($blog['blog_last_update']); ?></p>
    <p><strong>User IP:</strong> <?php echo htmlspecialchars($blog['ip']); ?></p>
    </div>
    <a href="blogs.php" class="back-button">Back to Blogs</a>
</div>

</body>
</html>