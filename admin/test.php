<!DOCTYPE html>
<html>
<head>
    <title>Bar Graph Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        // PHP code to retrieve data from the server
        <?php
        // Your PHP code to retrieve the labels and data from the server
        $labels = ['Label 1', 'Label 2', 'Label 3'];
        $data = [30, 50, 20];
        ?>

        // Data for the graph
        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Graph Data',
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
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
