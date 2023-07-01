<?php
include '../connection.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status1 = $_GET['status'];

    // Prepare the SQL statement using prepared statements
    $stmt = $conn->prepare("UPDATE employees SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status1, $id);
    $res = $stmt->execute();

    if ($res) {
        // Redirect
        header("Location: ../emp_view.php");
        exit();
    } else {
        echo "Error updating field: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>