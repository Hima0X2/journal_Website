<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Admin Panel</h2>
    
    <!-- Journals Section -->
    <h3 class="mt-5">Manage Journals</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "../function/database.php";

            // Execute the query and check for errors
            $stmt = $con->query("SELECT * FROM journal");
            if (!$stmt) {
                echo "<tr><td colspan='4'>Error executing query: " . $con->errorInfo()[2] . "</td></tr>";
            } else {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['journal_title']}</td>";
                    echo "<td>" . ($row['journal_status'] == 0 ? 'Pending' : ($row['journal_status'] == 1 ? 'Accepted' : 'Rejected')) . "</td>";
                    echo "<td>
                            <a href='update_status.php?type=journal&id={$row['id']}&status=1' class='btn btn-success btn-sm'>Accept</a>
                            <a href='update_status.php?type=journal&id={$row['id']}&status=-1' class='btn btn-danger btn-sm'>Reject</a>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Blogs Section -->
    <h3 class="mt-5">Manage Blogs</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Execute the query and check for errors
            $stmt = $con->query("SELECT * FROM blog WHERE blog_trash = 0");
            if (!$stmt) {
                echo "<tr><td colspan='4'>Error executing query: " . $con->errorInfo()[2] . "</td></tr>";
            } else {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['blog_title']}</td>";
                    echo "<td>" . ($row['blog_status'] == 0 ? 'Pending' : ($row['blog_status'] == 1 ? 'Accepted' : 'Rejected')) . "</td>";
                    echo "<td>
                            <a href='update_status.php?type=blog&id={$row['id']}&status=1' class='btn btn-success btn-sm'>Accept</a>
                            <a href='update_status.php?type=blog&id={$row['id']}&status=-1' class='btn btn-danger btn-sm'>Reject</a>
                          </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
