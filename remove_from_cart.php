<?php
include 'connection.php';

//remove from cart where id = get id from url and user = session id
    $id = $_GET['id'];
    $query = "DELETE FROM cart WHERE id = $id AND user = 1";
    $result = mysqli_query($conn, $query);
    if($result){
        header('location:cart.php');
    }
    else{
        echo "Error";
    }

?>