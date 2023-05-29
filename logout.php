<?php 
// delete * from cart whwere user = session id and unset session id
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
include 'connection.php';

// get id from customer table where email = session email
$query = "SELECT id FROM customer WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user_id = 0;

if($result){
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
}else{
    echo "Error";
}

//remove from cart where id = $user_id
$query = "DELETE FROM cart WHERE user = $user_id;";
$result = mysqli_query($conn, $query);
if($result){
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    header('location:login.php');
}
else{
    echo "Error";
}



?>