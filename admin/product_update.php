<?php include 'header.php'; 

// Check if the product ID is provided in the URL
if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger">Product ID not provided.</div>';
    exit;
}

// Retrieve the product data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Retrieve the category data for the dropdown
$categorySql = "SELECT * FROM category ORDER BY id DESC";
$categoryResult = mysqli_query($conn, $categorySql);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Product</h1>

    <!-- Form -->
    <div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Form content -->
                <form method="POST" enctype="multipart/form-data" action="product_update.php?id=<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="input1">Select an Image (500 X 500)</label>
                        <input type="file" class="form-control-file" name="input1" id="input1" onchange="previewImage(event)">
                        <img id="imagePreview" src="./assets/images/products/<?php echo $row['image']; ?>" alt="Image Preview" style="max-width: 100%; max-height: 200px; margin-top: 10px; ">
                    </div>
                    <div class="form-group">
                        <label for="input2">Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <?php
                                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                    $selected = ($categoryRow['id'] == $row['category']) ? 'selected' : '';
                                    echo '<option value="' . $categoryRow['id'] . '" ' . $selected . '>' . $categoryRow['name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input2">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="input2">Description</label>
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Enter description" value="<?php echo $row['description']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="input2">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" value="<?php echo $row['price']; ?>" required min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="input2">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="<?php echo $row['amount']; ?>" required min="1" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                </form>

                <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $image = $_FILES['input1']['name'];
                        $tmp_name = $_FILES['input1']['tmp_name'];
                        $category = $_POST['category'];
                        $desc = $_POST['desc'];
                        $price = $_POST['price'];
                        $amount = $_POST['amount'];

                        // Check if a new image is uploaded
                        if (!empty($image)) {
                            // Generate a unique filename by appending the current timestamp
                            $currentTimestamp = time();
                            $filename = $currentTimestamp . '_' . $image;

                            $path = './assets/images/products/' . $filename;
                            move_uploaded_file($tmp_name, $path);
                        } else {
                            // If no new image is uploaded, retain the existing image filename
                            $filename = $row['image'];
                        }

                        // Update the data in the database
                        $updateSql = "UPDATE products SET category = '$category', name = '$name', image = '$filename', description = '$desc', price = '$price', amount = '$amount' WHERE id = $id";
                        $updateResult = mysqli_query($conn, $updateSql);

                        // If the query is successful, redirect to product_view.php
                        if ($updateResult) {
                            // Alert
                            echo '<div class="alert alert-success">Product updated successfully.</div>';
                            echo "<script>window.location.href='product_view.php';</script>";
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
        var defaultImage = './assets/images/products/<?php echo $row['image']; ?>';
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
