<?php
//session start
session_start();

include('connection.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
</head>

<body>


    </br></br></br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="assets/images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In <strong></strong></h3>
                                <p class="mb-4">Use the sign in form to log in to our website.</p>
                            </div>
                            <form  method="post">
                                <div class="form-group first">
                                    <label for="username">E-mail</label>
                                    <input type="text" class="form-control" name="email" id="username" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    
                                    <span class="ml-auto"><a href="register.php" class="forgot-pass">Need an Account? Register</a></span>
                                    
                                </div>
                                

                                <input type="submit" value="Log In" name="login" class="btn text-white btn-block btn-primary">

                            </form>

                            <?php
                                if(isset($_POST['login']))
                                {
                                    $email=$_POST['email'];
                                    $password=$_POST['password'];
                                    $query="select * from customer where email='$email' and password='$password'";
                                    $query_run=mysqli_query($conn,$query);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        $_SESSION['email']=$email;
                                        $_SESSION['id']=$row['id'];
                                        $_SESSION['fname']=$row['fname'];
                                        $_SESSION['lanme']=$row['lanme'];

                                        header('location:index.php');
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
                                    }
                                }
                                else
                                {
                                }
                            ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>