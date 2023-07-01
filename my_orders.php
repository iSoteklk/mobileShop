<?php 
include('header.php');
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

?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">My Orders</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>OID</th>
                            <th>Shipping Address</th>
                            <th>Pay Status</th>
                            <th>Order Status</th>
                            <th>Total</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        
                        $query = "SELECT * FROM orders WHERE email = '$email'";

                        
                        $result = mysqli_query($conn, $query);
                        
                        //check if there are any rows
                        if(mysqli_num_rows($result) == 0){
                            echo "<tr><td colspan='5'>No Orders</td></tr>";
                        }



                        while($row = mysqli_fetch_array($result)){



                            ?>




                        <tr>
                        <td class="align-middle"><?php echo $row['oid']; ?></td>
                        <td class="align-middle"><?php echo $row['name']; echo '<br>'; echo $row['add1'].' , '. $row['add2']; echo '<br>'; echo $row['city'].' , '. $row['postal']; ?></td>
                            <td class="align-middle">
                                <?php
                                    //image
                                    echo '<img src="assets/images/'.$row['pay_status'].'.png" alt="Success" width="30%">';
                                
                                ?></td>
                            <td class="align-middle">
                                <?php
                                    //image
                                    echo '<img src="assets/images/'.$row['order_status'].'.png" alt="Success" width="30%">';
                                
                                ?></td>
                            <td class="align-middle"><?php echo $row['total'].' LKR' ?></td>
                            <td class="align-middle"><?php echo $row['time'] ?></td>
                        </tr>
                            
                            
                            
                            <?php
                        }
                        ?>
                       
                    </tbody>
                </table>
            </div>
            <!--  -->
        </div>
    </div>
    <!-- Cart End -->

<?php include 'footer.php'; ?>