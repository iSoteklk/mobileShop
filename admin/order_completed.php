<?php 
include 'header.php';

// Select * from category
$sql = "SELECT * FROM orders WHERE order_status = 'Completed'";
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
    <h1 class="h3 mb-4 text-gray-800">Completed Orders</h1>

    <!-- Table -->
    <div class="row">
        <div class="col-lg-12 mx-auto" style="margin-top: 40px;">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Table content -->
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Details</th>
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
                                            <td><?php echo  $row['oid']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['add1'].', '.$row['add2'].'<br>'.$row['city'].', '.$row['postal'] ?></td>
                                            <td><?php echo $row['total']; ?></td>
                                            <?php
                                                    if($row['pay_status'] == 'Paid'){
                                                        ?>
                                                        <td> <span class="badge badge-success">Paid</span> </td>
                                                        <?php
                                                    } else{
                                                        ?>
                                                        <td> <span class="badge badge-danger">Not Paid</span> </td>
                                                        <?php
                                                    }
                                            ?>
                                           <td> <span class="badge badge-success">Completed</span> </td>
                                                        
                                            <td><?php echo $row['time']; ?></td>
                                            <td>
                                                 <a href="order_details.php?id=<?php echo $row['oid']; ?>" class="btn btn-info">Details </a>
                                                 
                                                        
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
