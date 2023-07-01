<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';


include 'connection.php';

$user_id = 0;

// get id from customer table where email = session email
if($email != ''){
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    
    if($result){
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
    }else{
        echo "Error";
    }
}
    ?>
   



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FutureTech</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
        <!-- Topbar Start -->
        <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href=""></a>
                    <a class="text-body mr-3" href=""></a>
                    <a class="text-body mr-3" href=""></a>
                    <a class="text-body mr-3" href=""></a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- check if shession id !='' -->
                            <?php if($email != ''){ ?>
                            <!-- <a href="profile.php"><button class="dropdown-item" type="button">Profile</button></a> -->
                            <a href="cart.php"><button class="dropdown-item" type="button">My Cart</button></a>
                            <a href="my_orders.php"><button class="dropdown-item" type="button">My Orders</button></a>
                            <a href="logout.php"><button class="dropdown-item" type="button">Logout</button></a>
                            <?php }else{ ?>


                            <a href="login.php"><button class="dropdown-item" type="button" >Sign in</button></a>
                            <a href="register.php"><button class="dropdown-item" type="button">Sign up</button></a>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div> -->
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">FUTURE</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">TECH</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+94 112 234 567</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        
                        <a href="shop.php" class="nav-item nav-link">All</a>
                        <?php 
                            //select * from categories table and loop
                            $sql1 = "SELECT * FROM category";
                            $result1 = mysqli_query($conn, $sql1);
                            while($row1 = mysqli_fetch_assoc($result1)){

                                $category_id = $row1['id'];
                                $category_name = $row1['name'];
                                echo "<a href='shop.php?category=$category_id' class='nav-item nav-link'>$category_name</a>";
                                
                            }
                        ?>

                        
                        
                         
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                <?php
                                    //select count from cart whre user = id 
                                    $sql = "SELECT COUNT(*) AS count FROM cart WHERE user = $user_id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['count'];

                                ?>
                            </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->