<?php
require "../function/database.php"; // Include the database connection file

// Fetch journal data where journal_status is 1
$sql = "SELECT * FROM journal WHERE journal_status = 1"; // SQL query to get active journals
$stmt = $con->query($sql); // Execute the query

// Fetch all results
$journals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIJR - Journals</title>
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

/* Journals section styles */
.journals {
    padding: 60px 20px;
    background-color: #f9f9f9;
    text-align: center;
}

.journals h2 {
    font-size: 2.5em;
    margin-bottom: 40px;
    color: #333;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.journals h2::after {
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

/* Journals list styles */
.journals-list {
    padding: 50px 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Journal item styles */
.journal {
    display: flex;
    align-items: flex-start;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    gap: 20px;
    max-width: 1200px; /* Wider alignment */
    margin: 0 auto; /* Center the journal items */
    width: 100%; /* Full width to fit the container */
}

.journal img {
    max-width: 200px; /* Adjust as needed */
    border-radius: 8px;
}

.journal-info {
    max-width: calc(100% - 220px); /* Adjust to fit with image width */
}

.journal-info h4 {
    font-size: 1.75em;
    margin-bottom: 10px;
    color: #007bff;
}

.journal-info p {
    margin: 5px 0;
    font-size: 1em;
}

.journal-info p strong {
    font-weight: bold;
}
.journal:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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

<section class="journals-list">
    <?php if (count($journals) > 0): // Check if there are any results ?>
        <?php foreach ($journals as $row): // Loop through each result ?>
            <div class="journal" onclick="window.location.href='journal-details.php?id=<?php echo htmlspecialchars($row['id']); ?>'">
            <img src="../images/journal.jfif" alt="Image Icon"> <!-- Replace journal cover with image icon -->
                <div class="journal-info">
                    <h4><?php echo htmlspecialchars($row['journal_title']); ?></h4>
                    <p><strong>Online ISSN:</strong> <?php echo htmlspecialchars($row['online_issn']); ?></p>
                    <p><strong>Print ISSN:</strong> <?php echo htmlspecialchars($row['print_issn']); ?></p>
                    <p><?php echo htmlspecialchars($row['journal_description']); ?></p>
                    <p><strong>Published Date:</strong> <?php echo htmlspecialchars($row['journal_date']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No journals found.</p>
    <?php endif; ?>
</section>
<footer>
    <div class="container">
        <div class="social-icons">
            <a href="#" target="_blank"><img src="../images/facebook.png" class="icon" alt="Facebook"></a>
            <a href="#" target="_blank"><img src="../images/instagram.png" class="icon" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="../images/twit.png" class="icon" alt="Twitter"></a>
            <a href="#" target="_blank"><img src="../images/linkedin.png" class="icon" alt="LinkedIn"></a>
        </div>
        <div class="contact-info">
            <p>Get in Touch</p>
            <p><i class="fa fa-map-marker"></i> Chandpur, Dhaka, Bangladesh</p>
            <p><i class="fa fa-envelope"></i> info@example.com</p>
            <p><i class="fa fa-phone"></i> +8801872879611</p>
            <form action="submit_email.php" method="POST" class="form-inline">
                <input type="email" id="email" name="email" class="form-control" placeholder="Your email...">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</footer>

</body>
</html>
