<?php
require "../function/database.php";

// Get Client IP Address
$ip_address = $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $journal_author = $_SESSION['id'];
    $journal_title = $_POST['journal_title'];
    $journal_slug = $_POST['journal_slug'];
    $journal_cover = basename($_FILES["fileToUpload"]["name"]);
    $journal_description = strip_tags($_POST['summernote']);
    $journal_date = $_POST['date'];
    $journal_status = "0";
    $journal_trash = "0";
    $user_ip = $ip_address;

    // Check for existing slug
    $stmt = $con->prepare("SELECT COUNT(*) FROM journal WHERE journal_slug = ?");
    $stmt->execute([$journal_slug]);
    $count = $stmt->fetchColumn();

        try {
            // Insert new journal entry
            $sql = "INSERT INTO `journal` (`user_id`, `journal_title`, `journal_slug`, `journal_cover`, `journal_description`, `journal_date`, `journal_status`, `journal_trash`, `user_ip`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($sql);
            $stmt->execute([
                $journal_author, 
                $journal_title, 
                $journal_slug, 
                $journal_cover, 
                $journal_description, 
                $journal_date, 
                $journal_status, 
                $journal_trash, 
                $user_ip
            ]);

            // Upload file
            $target_dir = "temp/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validate File
            $uploadOk = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if (!$check) {
                $upload_message = "File is not an image.";
                $uploadOk = 0;
            } elseif (file_exists($target_file)) {
                $upload_message = "Sorry, file already exists.";
                $uploadOk = 0;
            } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
                $upload_message = "Sorry, your file is too large.";
                $uploadOk = 0;
            } elseif (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                $upload_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                header("Location: all_post.php?success=journal_published");
                exit;
            } else {
                header("Location: post.php?error=upload_failed");
                exit;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
 else {
    header("Location: post.php?error=form_not_submitted");
    exit;
}
?>
