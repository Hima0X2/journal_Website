<?php
require "../function/database.php"; // Include the database connection file

// Get journal ID from query string
$journal_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch journal details
$sql = "SELECT * FROM journal WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->execute(['id' => $journal_id]);
$journal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$journal) {
    echo "Journal not found.";
    exit;
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
    <h1><?php echo htmlspecialchars($journal['journal_title']); ?></h1>
    <img src="../images/journal.jfif" alt="Image Icon"> <!-- Replace journal cover with image icon -->
    <div class="journal-info">
    <p><strong>Online ISSN:</strong> <?php echo htmlspecialchars($journal['online_issn']); ?></p>
    <p><strong>Print ISSN:</strong> <?php echo htmlspecialchars($journal['print_issn']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($journal['journal_description']); ?></p>
    <p><strong>Published Date:</strong> <?php echo htmlspecialchars($journal['journal_date']); ?></p>
    <p><strong>Meta Information:</strong> <?php echo htmlspecialchars($journal['journal_meta']); ?></p>
    <p><strong>User IP:</strong> <?php echo htmlspecialchars($journal['user_ip']); ?></p>

    </div>
    <a href="journal.php" class="back-button">Back to Journals</a>
</div>

</body>
</html>