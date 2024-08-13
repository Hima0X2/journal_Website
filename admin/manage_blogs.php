<?php require"site/header.php"; ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blogs</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #343a40;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Manage Blogs</h2>
    <table class="table table-bordered mt-4">
        <thead class="table-dark">
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
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php require"site/footer.php"; ?>  