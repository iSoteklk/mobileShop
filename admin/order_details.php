<?php 
include 'header.php';

$oid = $_GET['id'];


// Select * from category
$sql = "SELECT * FROM sold WHERE order_id = $oid ";
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
    <h1 class="h3 mb-4 text-gray-800">Order Details</h1>
    <h1 class="h4 mb-4 text-gray-800">Order ID : <?php echo $oid; ?></h1>

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
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = ($currentPage - 1) * $rowsPerPage + 1;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo  $row['product_id']; ?></td>
                                        <?php
                                        $sql2 = "SELECT * FROM products WHERE id = {$row['product_id']}";
                                        $result2 = mysqli_query($conn, $sql2);

                                        if ($result2 && mysqli_num_rows($result2) > 0) {
                                            $row2 = mysqli_fetch_assoc($result2);
                                            ?>
                                            <td><img src="assets/images/products/<?php echo $row2['image']; ?>" alt="Category Image" width="15%" class="img-thumbnail"></td>
                                            <td><?php echo $row2['name']; ?></td>
                                            <td><?php echo $row2['price']; ?></td>
                                        <?php
                                        } else {
                                            echo '<td colspan="4">Product details not found</td>';
                                        }
                                        ?>
                                        <td><?php echo $row['amount']; ?></td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                            } else {
                                echo '<tr><td colspan="4">No products found</td></tr>';
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
