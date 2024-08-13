<?php
ob_start(); // Start output buffering

require "../function/database.php";
require "site/header.php";

// Get Client IP Address
$ip_address = $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

// Handle Form Submission
if (isset($_POST['submit'])) {
    $journal_author = $_SESSION['id'];
    $journal_title = $_POST['journal_title'];
    $journal_slug = $_POST['journal_slug'];
    $journal_description = strip_tags($_POST['summernote']);
    $journal_date = $_POST['date'];
    $journal_status = "0";
    $journal_trash = "0";
    $user_ip = $ip_address;

    // Check for existing slug
    $stmt = $con->prepare("SELECT COUNT(*) FROM journal WHERE journal_slug = ?");
    $stmt->execute([$journal_slug]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "<div class='alert alert-danger'>Journal slug already exists.</div>";
    } else {
        // Handle File Upload
        $upload_message = "";
        $journal_cover = "";
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
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

            // Upload File
            if ($uploadOk && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $journal_cover = basename($_FILES["fileToUpload"]["name"]);
            } else {
                $upload_message = $upload_message ?: "Sorry, there was an error uploading your file.";
            }
        }

        if (empty($upload_message)) {
            // Insert new journal entry
            $sql = "INSERT INTO journal (user_id, journal_title, journal_slug, journal_cover, journal_description, journal_date, journal_status, journal_trash, user_ip) 
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

            echo "<div class='alert alert-success'>Your Journal has been published successfully!</div>";
            header("Location: all_post.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "<div class='alert alert-warning'>$upload_message</div>";
        }
    }
}

?>

<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Journal Submission Form -->
                <form method="POST" action="post.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Journal Title</label>
                        <input type="text" name="journal_title" placeholder="Enter Journal Title Here..." class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Journal Description</label>
                        <textarea id="summernote" name="summernote" minlength="20"></textarea>
                        <script>
                            $('#summernote').summernote({
                                placeholder: 'Write your journal here...',
                                tabsize: 2,
                                height: 200
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label>Journal Autho</label>
                        <div class="input-group">
                            <span class="input-group-text">Author name :</span>
                            <input type="text" class="form-control" name="journal_slug" placeholder="Journal-link" required />
                            <div id="uname_response"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Journal Cover</label>
                        <input type="file" name="fileToUpload" onchange="readURL(this);" />
                        <img id="blah" src="assets/img/cover_180.png" width="180" />
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "site/footer.php"; ?>

<?php ob_end_flush(); // End output buffering ?>
