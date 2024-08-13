<?php require "site/header.php"; ?>   
<?php 
$edit = $_GET['id'];  
require "../function/database.php";
    
$sql = "SELECT * FROM journal WHERE id = :id";
$stmt = $con->prepare($sql);   
$stmt->execute([':id' => $edit]);   
 
if ($stmt->rowCount() > 0) {
    $journal = $stmt->fetch(); 
?>  

<form method="POST" action="edit.php" role="form" enctype="multipart/form-data">

    <!-- Hidden field to store journal ID -->
    <input type="hidden" name="id" value="<?php echo $journal['id']; ?>">

    <div class="modal-body">
        <div class="form-group">
            <label for="company" class="form-control-label">
                <small class="text-muted">Journal Title</small>
            </label>
            <input type="text" id="company" name="journal_title" placeholder="Enter Journal Title Here.." value="<?php echo $journal['journal_title']; ?>" class="form-control">
        </div>

        <label for="company" class="form-control-label">
            <small class="text-muted">Journal Description</small>
        </label>

        <!-- CMS box -->
        <textarea id="summernote" name="journal_description" minlength="20"><?php echo $journal['journal_description']; ?></textarea>

        <script>
            $('#summernote').summernote({
                placeholder: 'Write your journal here..',
                tabsize: 2,
                height: 200
            });
        </script> 
          
        <label for="basic-url">
            <small class="text-muted">Journal Link</small>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">https://example.com/</span>
            </div>
            <input type="text" class="textbox" id="txt_journal_slug_r" name="journal_slug" value="<?php echo $journal['journal_slug']; ?>" placeholder="Journal-link"/>
        </div>

        <label for="company" class="form-control-label">
            <small class="text-muted">Journal Cover</small>
        </label>

        <!-- Image preview box -->
        <div class="card">
            <div class="card-body" align="center">
                <label for="company" class="form-control-label">
                    <img id="blah" src="assets/img/cover_180.png" width="180" />
                </label>
                <label for="company" class="form-control-label">
                    <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload" />   
                </label>
            </div>
        </div>  
    </div>

    <div class="modal-footer">
         <!-- Close Modal Button -->
         <a href="all_post.php" class="btn btn-secondary">Close</a>
        <!-- Submit Form Button -->
        <button type="submit" class="btn btn-success">Update</button>     
    </div>
</form>

<?php } else {
    echo "Journal not found.";
} ?>

<?php require "site/footer.php"; ?>
