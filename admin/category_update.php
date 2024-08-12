<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Category</h1>

    <!-- Form -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php
                    // Check if category ID is provided
                    if (isset($_GET['id'])) {
                        $categoryID = $_GET['id'];

                        // Fetch category data from the database
                        $sql = "SELECT * FROM category WHERE id = $categoryID";
                        $result = mysqli_query($conn, $sql);
                        $category = mysqli_fetch_assoc($result);
                    }

                    // Check if form is submitted
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];

                        // Check if a new image is uploaded
                        if ($_FILES['input1']['size'] > 0) {
                            $image = $_FILES['input1']['name'];
                            $tmp_name = $_FILES['input1']['tmp_name'];

                            // Generate a unique filename by appending the current timestamp
                            $currentTimestamp = time();
                            $filename = $currentTimestamp . '_' . $image;

                            $path = './assets/images/categories/' . $filename;
                            move_uploaded_file($tmp_name, $path);

                            // Remove the old image file
                            $oldImage = $category['image'];
                            if ($oldImage != '150x150.png') {
                                $oldImagePath = './assets/images/categories/' . $oldImage;
                                unlink($oldImagePath);
                            }
                        } else {
                            // No new image uploaded, use the existing image
                            $filename = $category['image'];
                        }

                        // Update the category data in the database
                        $sql = "UPDATE category SET name='$name', image='$filename' WHERE id=$categoryID";
                        $result = mysqli_query($conn, $sql);

                        // If the query is successful, redirect to category_view.php
                        if ($result) {
                            echo '<div class="alert alert-success">Category updated successfully.</div>';
                            echo "<script>window.location.href='category_view.php';</script>";
                        } else {
                            echo '<div class="alert alert-danger">Query error: ' . mysqli_error($conn) . '</div>';
                        }
                    }
                    ?>

                    <!-- Form content -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="input1">Select an Image (150 X 150)</label>
                            <input type="file" class="form-control-file" name="input1" id="input1" onchange="previewImage(event)">
                            <img id="imagePreview" src="./assets/images/categories/<?php echo $category['image']; ?>" alt="Image Preview" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                        </div>
                        <div class="form-group">
                            <label for="input2">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name" value="<?php echo $category['name']; ?>" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </form>
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
        var defaultImage = './assets/images/categories/<?php echo $category['image']; ?>';
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
