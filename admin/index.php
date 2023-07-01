<?php
include 'header.php';
?>
<title>FT|Dashboard</title>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1></br></br></br></br>
                
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php
                                            $currentYearMonth = date('Y-m');
                                            $sql = "SELECT SUM(total) AS grandtotal FROM orders WHERE DATE_FORMAT(time, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m');";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            $row = mysqli_fetch_assoc($result);
                                            
                                        ?>
                                        Earnings (Monthly)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">LKR <?php echo $row['grandtotal']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <?php
                                            $currentYearMonth = date('Y');
                                            $sql1 = "SELECT SUM(total) AS grandtotal FROM orders WHERE DATE_FORMAT(time, '%Y') = DATE_FORMAT(NOW(), '%Y');";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            
                                        ?>

                                        Earnings (Annual)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">LKR <?php echo $row1['grandtotal']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <?php
                                            $sql2 = "SELECT SUM(total) AS grandtotal FROM orders";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            
                                        ?>

                                        Earnings (All TIme)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">LKR <?php echo $row2['grandtotal']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <?php
                                            $sql3 = "SELECT COUNT(oid) AS ordercount FROM orders WHERE order_status = 'Processing'";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $row3 = mysqli_fetch_assoc($result3);
                                            
                                        ?>

                                        Pending Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row3['ordercount']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</br> </br></br></br>
            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Earnings Monthly</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> -->
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Most Sold Products</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myChart"></canvas>
            </div>
            
        </div>
    </div>
</div>

            <!-- Content Row -->
            
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // PHP code to retrieve data from the server


        <?php
        $labels = [];
        $data = [30, 40, 30];



        $sqlq = "SELECT product_id, COUNT(*) AS count
        FROM sold
        GROUP BY product_id
        ORDER BY count DESC
        LIMIT 3;
        ";

        $result6 = mysqli_query($conn, $sqlq);
                                                    
        while($row6 = mysqli_fetch_assoc($result6)){
            $ss = "SELECT name FROM products WHERE id = " . $row6['product_id'];
            $results = mysqli_query($conn, $ss);
            $rows = mysqli_fetch_assoc($results);
            $labels[] = $rows['name'];
            // Do something with the retrieved data
        }
        // Your PHP code to retrieve the labels and data from the server
        
        ?>

        // Data for the chart
        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($data); ?>,
                backgroundColor: ['red', 'green', 'blue'],
            }]
        };

        // Configuration options
        var options = {
            responsive: true,
            maintainAspectRatio: false,
        };

        // Create the pie chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        // PHP code to retrieve data from the server
        <?php
        // Your PHP code to retrieve the labels and data from the server
        $labels = [];
        $data = [];


        $ss1 = "SELECT DATE_FORMAT(time, '%Y-%m') AS formatted_time, total FROM orders ORDER BY formatted_time";
            $results1 = mysqli_query($conn, $ss1);
            while($rows1 = mysqli_fetch_assoc($results1)){
            $labels[] = $rows1['formatted_time'];
            $data[] = $rows1['total'];
        }
        ?>

        // Data for the graph
        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Monthly Earnings',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Configuration options
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the bar graph
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>



    <?php
include 'footer.php';
?>