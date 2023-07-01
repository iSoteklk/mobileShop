<?php
include '../connection.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status1 = $_GET['status'];

    // Prepare the SQL statement using prepared statements
    $stmt = "";
    $stmt = "";

    if($status1 == 'Cancelled'){
        $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE oid = ?");
        $stmt->bind_param("si", $status1,'Refunded', $id);
       
    }else{
        $stmt = $conn->prepare("UPDATE orders SET order_status = ?, pay_status = ? WHERE oid = ?");
        $stmt->bind_param("si", $status1, $id);

    }
    
    
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


            $sql = "SELECT * FROM sold WHERE order_id = $id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $amount = $row['amount'];

                $updateSql = "UPDATE products SET amount = amount + $amount WHERE id = $product_id";
                mysqli_query($conn, $updateSql);
            }


            $updateSql = "DELETE FROM sold WHERE order_id = $id";
                mysqli_query($conn, $updateSql);





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