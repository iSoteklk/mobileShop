<?php
//php connection
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

    <title>Register</title>
</head>

<body>
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
                                <h3>Sign Up <strong></strong></h3>
                                <p class="mb-4">Use the sign-in form to create a new account.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control" name="fname" id="fname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control" name="lname" id="lname" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="nic">NIC/Passport</label>
                                    <input type="text" class="form-control" name="nic" id="nic" required>
                                </div>

                                <div class="form-group">
                                    <label for="add1">Address Line 1</label>
                                    <input type="text" class="form-control" name="add1" id="add1" required>
                                </div>

                                <div class="form-group">
                                    <label for="add2">Address Line 2</label>
                                    <input type="text" class="form-control" name="add2" id="add2" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postal">Postal Code</label>
                                            <input type="number" class="form-control" name="postal" id="postal" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Re-type Password</label>
                                    <input type="password" name="password1" class="form-control" id="password1" required>
                                </div>

                                <input type="submit" value="Register" name="register" class="btn text-white btn-block btn-primary">
                            </form>

                            <?php
                            if(isset($_POST['register'])){
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $nic = $_POST['nic'];
                                $add1 = $_POST['add1'];
                                $add2 = $_POST['add2'];
                                $city = $_POST['city'];
                                $postal = $_POST['postal'];
                                $password = $_POST['password'];
                                $password1 = $_POST['password1'];

                                if($password == $password1){
                                    $sql = "INSERT INTO customer (fname, lname, email, phone, nic, add1, add2, city, postal, password) VALUES ('$fname', '$lname', '$email', '$phone', '$nic', '$add1', '$add2', '$city', '$postal', '$password')";
                                    $result = mysqli_query($conn, $sql);
                                    if($result){

                                        $_SESSION['email']=$email;
                                        $_SESSION['id']='';
                                        $_SESSION['fname']=$fname;
                                        $_SESSION['lanme']=$lname;

                                        echo "<script>alert('Registration Successful!')</script>";
                                        echo "<script>window.open('index.php','_self')</script>";
                                    }else{
                                        echo "<script>alert('Registration Failed!')</script>";
                                        echo "<script>window.open('register.php','_self')</script>";
                                    }
                                }else{
                                    echo "<script>alert('Password Mismatch!')</script>";
                                    echo "<script>window.open('register.php','_self')</script>";
                                }
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