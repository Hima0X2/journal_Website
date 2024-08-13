<?php
//print_r($_POST);    
require"../function/database.php";
?>

<?php require"site/header.php";?>


<?php if(isset($_GET['welcome'])){;?>

<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have been signed in successfully!
</div>


<script>window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);</script>
    
<?php };?>



<br>
    
<?php 
           
$sql="SELECT * FROM `users` INNER JOIN journal on users.id=journal.user_id ";
$stmt = $con->prepare($sql);   
$stmt->execute();   
 
if ($stmt->rowCount() > 0) {
// output data of each row
$journal = $stmt->fetch(); {;?>    

    
<div class="container">

<div class="card">
  <div class="card-header">
 Hi! <?php echo strtoupper($_SESSION['username']);?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to Admin Panel</h5>
    <p class="card-text">You can control all the journals and blogs and Approve or Reject</p> 
  </div>
</div>
</div>


<?php }};?>

<?php require"site/footer.php";?>



