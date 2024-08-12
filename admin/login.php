<?php
 session_start();
 include('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FutureTech Admin - Login</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Log In">
                                    </form>


                                    <?php
                  
                                        if(isset($_POST["submit"])){

                                            $password = $_POST["password"];
                                            $username = $_POST["email"];

                                            $result = mysqli_query($conn,"SELECT * FROM employees WHERE email = '$username';");
                            
                                            $row = mysqli_fetch_array($result);
                                            
                                            if($row['status'] == 'Blocked'){

                                                echo "<script>alert(Your account is blocked)</script>";

                                            }else{
                                                if($row['email'] == $username && $row['password'] == $password ){

                                                    // sessions
                                                        $_SESSION['id']=$row['id'];
                                                        $_SESSION['email']=$row['email'];
                                                        $_SESSION['fname']=$row['fname'];
                                                        $_SESSION['lname']=$row['lname'];
                                                        $_SESSION['contact']=$row['contact'];
                                                        $_SESSION['status']=$row['status'];
                                                        $_SESSION['title']=$row['title'];
                                                        //redirection in js
                                                        echo '<script type="text/javascript">window.location.href = "index.php";</script>';
                                                    }else{
                                                        ?> <script>alert('Wrong Credentials....') </script><?php
                                                        echo '<script type="text/javascript">window.location.href = "login.php";</script>';
                                                        die();
                                                    }
                                            }

                                        }
                                    
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
