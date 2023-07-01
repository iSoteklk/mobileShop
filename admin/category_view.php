<?php 
include 'header.php';

// Select * from category
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
$totalRows = mysqli_num_rows($result);

// Pagination
$rowsPerPage = 7;
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
    <h1 class="h3 mb-4 text-gray-800">All Categories</h1>

    <!-- Table -->
    <div class="row">
        <div class="col-lg-9 mx-auto" style="margin-top: 40px;">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Table content -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Category</th>
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
                                            <td><img src="assets/images/categories/<?php echo $row['image']; ?>" alt="Category Image" width="20%" class="img-thumbnail"></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
                                                <a href="category_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Add Item</a>
                                                <a href="category_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit Category</a>
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
