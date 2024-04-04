<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <!-- pieChart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Data for first pie chart
            var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Faculty');
            data1.addColumn('number', 'Contributor Count');

            // Data for second pie chart
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Status');
            data2.addColumn('number', 'Contribution Count');

            // Data for third pie chart
            // var data3 = new google.visualization.DataTable();
            // data3.addColumn('string', 'Role');
            // data3.addColumn('number', 'Contributor Count');

            <?php
            // Assuming you already have a database connection established
            include_once ("connect.php");

            // Query to count contributor count based on facultyID for first pie chart
            $sql1 = "SELECT u.facultyID, f.facultyName, COUNT(u.userID) AS contributor_count
                FROM user u
                INNER JOIN faculty f ON u.facultyID = f.facultyID
                WHERE u.roleID = 4
                GROUP BY u.facultyID";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                // Output data of each row for first pie chart
                while ($row1 = $result1->fetch_assoc()) {
                    echo "data1.addRow(['" . $row1['facultyName'] . "', " . $row1['contributor_count'] . "]);\n";
                }
            } else {
                echo "data1.addRow(['No Data', 0]);";
}

            // Query to count contribution count based on status for second pie chart
            $sql2 = "SELECT 
                    CASE
                        WHEN status = 0 THEN 'Waiting'
                        WHEN status = 1 THEN 'Approved'
                        WHEN status = 2 THEN 'Rejected'
                        WHEN status = 3 THEN 'Published'
                    END AS status,
                    COUNT(*) AS contribution_count
                FROM 
                    contribution
                GROUP BY 
                    status";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                // Output data of each row for second pie chart
                while ($row2 = $result2->fetch_assoc()) {
                    echo "data2.addRow(['" . $row2['status'] . "', " . $row2['contribution_count'] . "]);\n";
                }
            } else {
                echo "data2.addRow(['No Data', 0]);";
            }

            // Query to count contributor count based on roleID for third pie chart
        //     $sql3 = "SELECT r.roleName, COUNT(u.userID) AS contributor_count
        // FROM user u
        // INNER JOIN role r ON u.roleID = r.roleID
        // GROUP BY u.roleID";
        //     $result3 = $conn->query($sql3);

        //     if ($result3->num_rows > 0) {
        //         // Output data of each row for third pie chart
        //         while ($row3 = $result3->fetch_assoc()) {
        //             echo "data3.addRow(['" . $row3['roleName'] . "', " . $row3['contributor_count'] . "]);\n";
        //         }
        //     } else {
        //         echo "data3.addRow(['No Data', 0]);";
        //     }

            // Close connection
            $conn->close();
            ?>

            var options = {
                title: 'Contributors by Faculty',
                pieSliceText: 'label',
                slices: { 0: { offset: 0.1, color: '#3366CC' }, 1: { color: '#DC3912' }, 2: { color: '#FF9900' }, 3: { color: '#109618' }, 4: { color: '#990099' } },
                is3D: true,
                chartArea: { left: 50, top: 50, width: '90 %', height: '90%' }
            };
            var options1 = {
                title: 'Contributions by Status',
                pieSliceText: 'label',
                slices: { 0: { offset: 0.1, color: '#3366CC' }, 1: { color: '#DC3912' }, 2: { color: '#FF9900' }, 3: { color: '#109618' }, 4: { color: '#990099' } },
                is3D: true,
                chartArea: { left: 50, top: 50, width: '90%', height: '90%' }
            };
            // var options2 = {
            //     title: 'Contributors by Role',
            //     pieSliceText: 'label',
            //     is3D: true,
            //     chartArea: { left: 50, top: 50, width: '90%', height: '90%' }
            // };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
            chart1.draw(data1, options);
var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
            chart2.draw(data2, options1);

            // var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
            // chart3.draw(data3, options2);
        }
    </script>

    <div id="main">
        <div class="page-content">
            <div class="container mb-3">
                <table class="table table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <div id="piechart1" style="width: 450px; height: 500px; float: left;"></div>

                            </tr>

                            <!-- <tr>
                                <div id="piechart3" style="width: 450px; height: 500px;"></div>
                            </tr> -->

                            <tr>
                                <div id="piechart2" style="width: 450px; height: 500px; float: right;"></div>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>