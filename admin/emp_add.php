<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Register New Employee</h1>

    <!-- Form -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Form content -->
                    <form class="form-sample" method="post" name="register">
                        <p class="card-description">Personal info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fname" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lname" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select name="gender" class="form-control" name="gender" required>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dob" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="title" required>
                                            <option value="admin">Admin</option>
                                            <option value="emp">Employee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="someone@hot.com" name="email" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">Address</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="add1" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Postal Code</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="postal" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="add2" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tele No</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="contact" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="register" value="Register">
                    </form>

                    <?php
                            if (isset($_POST["register"])) {
                                $password = $_POST['fname'] . "@123";
                                $query = "INSERT INTO employees (fname, lname, email, gender, dob, contact, title, add1, add2, city, postal, password,changed,status) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[gender]', '$_POST[dob]', '$_POST[contact]', '$_POST[title]', '$_POST[add1]', '$_POST[add2]', '$_POST[city]', '$_POST[postal]', '$password','No','Active')";
                                
                                if (!mysqli_query($conn, $query)) {
                                    echo "Error description: " . mysqli_error($link);
                                } else {
                            ?>
                                    <script>
                                        alert("Employee Created Successfully");
                                        window.location = "emp_view.php";
                                    </script>
                            <?php
                                }
                            }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
</div>
</div>

<?php include 'footer.php'; ?>
