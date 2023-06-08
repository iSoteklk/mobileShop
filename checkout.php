<?php 
include('header.php');

// redirect to login if not logged in
if(!isset($_SESSION['email'])){
    echo "<script>alert('Please login first')</script>";
    //redirect in js
    echo "<script>window.location.href='login.php'</script>";
}

// get id from customer table where email = session email
$query = "SELECT * FROM customer WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user_id = 0;

if($result){
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $nic = $row['nic'];
    $add1 = $row['add1'];
    $add2 = $row['add2'];
    $city = $row['city'];
    $postal = $row['postal'];
}else{
    echo "Error";
}

//select all from cart where user = id

$total = 0;
$id = 1;
$query = "SELECT * FROM cart WHERE user = $user_id";
$result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result)){
     // select * from the products where id = $row['product']
     $product = $row['product'];
     $query2 = "SELECT * FROM products WHERE id = $product";
     $result2 = mysqli_query($conn, $query2);
     $row2 = mysqli_fetch_array($result2);


    $total = $total + $row2['price']*$row['amount'];
 }



?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <form name="checkout" method="post">
                        <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" value=" <?php echo $fname ?> " required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lname" value=" <?php echo $lname ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" value=" <?php echo $email ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="phone" value=" <?php echo $phone ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="add1" value=" <?php echo $add1 ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" name="add2" value=" <?php echo $add2 ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" value=" <?php echo $city ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" Value="Sri Lanka">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Postal Code</label>
                            <input class="form-control" type="text" name="postal" value=" <?php echo $postal ?>">
                        </div>
                    </div>
                
                </div>
                
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs <?php echo $total;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rs 1000</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs <?php echo $total+1000;?></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                    <img src="assets/images/Blue-Credit-Card-PNG.png" alt="Credit Card" style="max-width: 100%; height: auto;">
                        <div class="form-group">
                            <label for="cardNumber">Card Number</label>
                            <input id="cardNumber" class="form-control" type="text" maxlength="16" placeholder="Enter card number" required>
                        </div>
                        <div class="form-group">
                            <label for="cardName">Cardholder Name</label>
                            <input id="cardName" class="form-control" type="text" maxlength="50" placeholder="Enter cardholder name" required>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="expiryDate">Expiry Date</label>
                                <input id="expiryDate" class="form-control" type="text" maxlength="5" placeholder="MM/YY" required>
                            </div>
                            <div class="col">
                                <label for="cvv">CVV</label>
                                <input id="cvv" class="form-control" type="text" maxlength="3" placeholder="CVV" required>
                            </div>
                        </div><br>
                        <input type="submit" name="pay" class="btn btn-block btn-primary font-weight-bold py-3" value="Pay Now">
                        </form>
                </div>

                <?php 
                //check if the pay isset
                if(isset($_POST['pay'])){
                  //insert into the orders table

                    $name = $_POST['fname'].' '.$_POST['lname'];
                    $grand_total = $total+1000;
                    $sql3 = "INSERT INTO orders (name, email, phone, add1,add2,city,postal,total,pay_status,order_status) VALUES ('$name', '$email','$_POST[phone]','$_POST[add1]','$_POST[add2]','$_POST[city]','$_POST[postal]',$grand_total, 'Paid', 'Processing')";
                    $result3 = mysqli_query($conn, $sql3);

                    if($result3){
                        

                        //get the last inserted id
                        $sql4 = "SELECT oid FROM orders ORDER BY oid DESC LIMIT 1"; 
                        $result4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $oid = $row4['oid'];

                        //insert into sold table

                        //select all from cart where user = $user_id
                        $query6 = "SELECT * FROM cart WHERE user = $user_id;";
                        $result6 = mysqli_query($conn, $query6);
                        echo 'here1';
                        
                        while($row6 = mysqli_fetch_assoc($result6)){
                            echo 'here2';
                            $user = $row6['user'];
                            $pid = $row6['product'];
                            $qty = $row6['amount'];
                            $sql7 = "INSERT INTO sold (order_id, user_id, product_id, amount) VALUES ($oid,$user_id, $pid, $qty)";
                            $result7 = mysqli_query($conn, $sql7);
                        }




                        //remove from cart where id = $user_id
                        $query5 = "DELETE FROM cart WHERE user = $user_id;";
                        $result5 = mysqli_query($conn, $query5);
                        
                       
                            echo "<script>alert('Payment Successful!')</script>";
                            echo "<script>window.location.href='index.php'</script>";
                        
                        
                    }else{
                        echo "<script>alert('Payment Failed!')</script>";
                    }
                }
            


                ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->


   <?php include 'footer.php';?>