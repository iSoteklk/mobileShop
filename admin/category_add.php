<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Category</h1>

    <!-- Form -->
    <div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Form content -->
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input1">Select an Image (150 X 150)</label>
                        <input type="file" class="form-control-file" name="input1" id="input1" onchange="previewImage(event)" required>
                        <img id="imagePreview" src="./assets/images/categories/150x150.png" alt="Image Preview" style="max-width: 100%; max-height: 200px; margin-top: 10px; ">
                    </div>
                    <div class="form-group">
                        <label for="input2">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </form>

                <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $image = $_FILES['input1']['name'];
                        $tmp_name = $_FILES['input1']['tmp_name'];

                        // Generate a unique filename by appending the current timestamp
                        $currentTimestamp = time();
                        $filename = $currentTimestamp . '_' . $image;

                        $path = './assets/images/categories/' . $filename;
                        move_uploaded_file($tmp_name, $path);

                        // Insert the data into the database
                        $sql = "INSERT INTO category (name, image) VALUES ('$name', '$filename')";
                        $result = mysqli_query($conn, $sql);

                        // If the query is successful, redirect to categories.php
                        if ($result) {
                            //alert
                            echo '<div class="alert alert-success">Category added successfully.</div>';
                            echo "<script>window.location.href='category_view.php';</script>";
                        } else {
                            echo '<div class="alert alert-danger">Query error: ' . mysqli_error($conn) . '</div>';
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</div>

    <!-- /.row -->
</div>
<!-- /.container-fluid -->

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Set the default image
        var defaultImage = './assets/images/categories/150x150.png';
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = defaultImage;
    });

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


</div>
<!-- /.container-fluid -->

<?php include 'footer.php'; ?>
