<?php 
include('header.php');

?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        //loop the rows in products table where user = id 
                        // $id = $_SESSION['id'];
                        $sub = 0;
                        $total = 0;
                        $id = 1;
                        $query = "SELECT * FROM cart WHERE user = $id";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)){

                            // select * from the products where id = $row['product']
                            $product = $row['product'];
                            $query2 = "SELECT * FROM products WHERE id = $product";
                            $result2 = mysqli_query($conn, $query2);
                            $row2 = mysqli_fetch_array($result2);

                            ?>




                        <tr>
                            <td class="align-middle"><img src="./admin/assets/images/products/<?php echo $row2['image']; ?>" alt="" style="width: 50px;"> <?php echo $row2['name']; ?></td>
                            <td class="align-middle"><?php echo $row2['price'].' LKR' ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $row['amount'] ?>" disabled>
                                    
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $row2['price']*$row['amount']; echo ' LKR';  $sub = $sub+($row2['price']*$row['amount'])?></td>
                            <td class="align-middle"><a href="remove_from_cart.php?id=<?php echo $row['id'] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>
                        </tr>
                            
                            
                            
                            <?php
                        }
                        ?>
                       
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $sub.' LKR' ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">1000 LKR</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php $total =$sub+1000;  echo $total; echo' LKR';  ?></h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php include 'footer.php'; ?>