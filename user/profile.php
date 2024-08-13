<?php
require "../function/database.php";
require "site/header.php";

// Fetch user data from the database
$user_id = $_SESSION['id'];
$stmt = $con->prepare("SELECT username, password, firstname, lastname, email, mobile, homemobile, description, address, status, country, role FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $homemobile = $_POST['homemobile'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $country = $_POST['country'];
    $role = $_POST['role'];
    // Update user profile
    $stmt = $con->prepare("UPDATE users SET username = ?, password = ?, firstname = ?, lastname = ?, email = ?, mobile = ?, homemobile = ?, description = ?, address = ?, status = ?, country = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $password, $firstname, $lastname, $email, $mobile, $homemobile, $description, $address, $status, $country, $role, $user_id]);

    echo "<div class='alert alert-success'>Profile updated successfully!</div>";
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form method="POST" action="update_profile.php">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($user['password']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo htmlspecialchars($user['firstname']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo htmlspecialchars($user['lastname']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo htmlspecialchars($user['mobile']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="homemobile">Home Mobile</label>
                            <input type="text" name="homemobile" id="homemobile" class="form-control" value="<?php echo htmlspecialchars($user['homemobile']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"><?php echo htmlspecialchars($user['description']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control"><?php echo htmlspecialchars($user['address']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="<?php echo htmlspecialchars($user['status']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control" value="<?php echo htmlspecialchars($user['country']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" id="role" class="form-control" value="<?php echo htmlspecialchars($user['role']); ?>">
                        </div>


                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "site/footer.php"; ?>
