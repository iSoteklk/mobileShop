<?php 
include 'header.php';

// Select * from category
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$totalRows = mysqli_num_rows($result);

// Pagination
$rowsPerPage = 5;
$totalPages = ceil($totalRows / $rowsPerPage);

// Get current page from the query parameter
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $rowsPerPage;

// Fetch data for the current page
$sql .= " LIMIT $offset, $rowsPerPage";
$result = mysqli_query($conn, $sql);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Products</h1>

    <!-- Table -->
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: 40px;">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Table content -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = ($currentPage - 1) * $rowsPerPage + 1;
                                if (mysqli_num_rows($result) > 0) {
                                    // Output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><img src="assets/images/products/<?php echo $row['image']; ?>" alt="Category Image" width="100%" class="img-thumbnail"></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td>
                                                <a href="product_update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                                            </td>
                                        </tr>
                                <?php
                                        $id++;
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No Categories found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php
                            // Render pagination links
                            for ($i = 1; $i <= $totalPages; $i++) {
                                $activeClass = ($i == $currentPage) ? 'active' : '';
                            ?>
                                <li class="page-item <?php echo $activeClass; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->

<?php include 'footer.php'; ?>
