<!-- get id from url and att to a db -->
<?php
  include 'connection.php';

    $product_id = $_GET['id'];
    $amount = 1;
   // $user_id = $_SESSION['id'];

   //if $_GET['amount'] is not set or undefined, set it to 1
    if(!isset($_GET['amount'])){
         $amount = 1;
    }else{
        $amount = $_GET['amount'];
    }

    $sql = "INSERT INTO cart (product, user,amount) VALUES ($product_id, 1,$amount)";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: index.php#products');
    }else{
        echo "Error :".$sql;
    }

?>