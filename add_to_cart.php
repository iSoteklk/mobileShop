<!-- get id from url and att to a db -->
<?php
    session_start();
    $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
    include 'connection.php';

    // redirect to login if not logged in
    if(!isset($_SESSION['email'])){
        echo "<script>alert('Please login first')</script>";
        //redirect in js
        echo "<script>window.location.href='login.php'</script>";
    }

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

    $product_id = $_GET['id'];
    $amount = 1;
    $location = 'Location:shop.php';
   // $user_id = $_SESSION['id'];

   //if $_GET['amount'] is not set or undefined, set it to 1
    if(!isset($_GET['amount'])){
         $amount = 1;
    }else{
        $amount = $_GET['amount'];
        $location = 'Location:cart.php';
    }

    $sql = "INSERT INTO cart (product, user,amount) VALUES ($product_id, $user_id,$amount)";
    $result = mysqli_query($conn, $sql);
    if($result){
        header($location);
    }else{
        echo "Error :".$sql;
    }

?>