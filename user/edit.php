<?php
require "../function/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the form
    $id = $_POST['id'];
    $journal_title = $_POST['journal_title'];
    $journal_description = $_POST['journal_description'];
    $journal_slug = $_POST['journal_slug'];

    // Handle file upload (if there's a new file)
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $target_dir = "uploads/"; // specify your upload directory
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the image file is an actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5MB limit
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // Assuming you store the filename in the database
        $file_name = basename($_FILES["fileToUpload"]["name"]);
    } else {
        // If no new file is uploaded, keep the old file name
        $file_name = $_POST['existing_file_name'];
    }

    // Update the journal record in the database
    $sql = "UPDATE journal SET 
            journal_title = :journal_title, 
            journal_description = :journal_description, 
            journal_slug = :journal_slug, 
            journal_cover = :journal_cover 
            WHERE id = :id";

    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':journal_title' => $journal_title,
        ':journal_description' => $journal_description,
        ':journal_slug' => $journal_slug,
        ':journal_cover' => $file_name,
        ':id' => $id
    ]);

    // Redirect to the page with a success message
    header("Location: all_post.php?update=success");
    exit();
} else {
    // If the request method is not POST, redirect to a default page
    header("Location: all_post.php");
    exit();
}
?>
