<?php
require "../function/database.php";

if (isset($_GET['type']) && isset($_GET['id']) && isset($_GET['status'])) {
    $type = $_GET['type'];
    $id = (int)$_GET['id']; // Convert to integer to avoid SQL injection
    $status = (int)$_GET['status']; // Convert to integer to avoid SQL injection

    // Check if type is 'blog' and status is valid (-1, 0, 1)
    if ($type === 'journal' && in_array($status, [-1, 0, 1])) {
        try {
            $sql = "UPDATE journal SET journal_status = :status WHERE id = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('Location: manage_journals.php?msg=Status updated successfully');
                exit();
            } else {
                echo "Error updating status.";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Invalid parameters.";
    }
} else {
    echo "Required parameters are missing.";
}
?>
