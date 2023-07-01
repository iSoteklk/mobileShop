<?php
include '../connection.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status1 = $_GET['status'];

    // Prepare the SQL statement using prepared statements
    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE oid = ?");
    $stmt->bind_param("si", $status1, $id);
    $res = $stmt->execute();

    if ($res) {
        // Redirect
        if($status1 == 'Shipped'){
            header("Location: ../order_shipped.php");
        } 

        if($status1 == 'Completed'){
            header("Location: ../order_completed.php");
        }
        
        if($status1 == 'Cancelled'){
            header("Location: ../order_cancelled.php");
        } 
        
        exit();
    } else {
        echo "Error updating field: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>