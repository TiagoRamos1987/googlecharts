<?php
    $con = mysqli_connect('localhost','root','','googlecharts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.load("visualization", "1", {packages:["geochart"]});
        google.load('visualization', '1', {packages: ['corechart', 'bar']});
        
        
        google.setOnLoadCallback(drawMaterial);
        google.setOnLoadCallback(drawRegionsMap);
        google.setOnLoadCallback(drawChartDateWiseVisits);
        google.setOnLoadCallback(drawChartBrowserWiseVisits);
        
        function drawChartDateWiseVisits() {
        var data = google.visualization.arrayToDataTable([

        ['Date', 'Visits'],
        <?php 
            $query = "SELECT count(ip) AS count, vdate FROM charts GROUP BY vdate ORDER BY vdate";

            $exec = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($exec)){

            echo "['".$row['vdate']."',".$row['count']."],";
            }
        ?>
        
        ]);

        var options = {
            title: 'Date wise visits',
            width:438,
            is3D: true,
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
        chart.draw(data, options);
        }


        function drawChartBrowserWiseVisits() {
        var data = google.visualization.arrayToDataTable([
        ['Browser', 'Visits'],
            <?php 
                $query = "SELECT count(ip) AS count, browser FROM charts GROUP BY browser";

                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                echo "['".$row['browser']."',".$row['count']."],";
                }
            ?>
        ]);

        var options = {
            title: 'Browser wise visits',
            width:438,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }


        function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([

        ['Country', 'Visits'],
            <?php 
                $query = "SELECT count(ip) AS count, country FROM charts GROUP BY country";

                $exec = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($exec)){

                echo "['".$row['country']."',".$row['count']."],";
                }
            ?>
        ]);

        var options = {
            title: 'Regions map',
            width:438,
            is3D: true,
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart'));

        chart.draw(data, options);
        }


        function drawMaterial() {
        var data = google.visualization.arrayToDataTable([
        ['Country', 'New Visitors', 'Returned Visitors'],
            <?php 
                $query = "SELECT count(ip) AS count, country FROM charts GROUP BY country";

                $exec = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($exec)){

                echo "['".$row['country']."',";
                $query2 = "SELECT count(distinct ip) AS count FROM charts WHERE country='".$row['country']."' ";
                $exec2 = mysqli_query($con,$query2);
                $row2 = mysqli_fetch_assoc($exec2);
                
                echo $row2['count'];
                
                

                $rvisits = $row['count']-$row2['count'];

                echo ",".$rvisits."],";
                }
            ?>
        ]);
        var options = {
            title: 'Country wise new and returned visitors',
            bars: 'horizontal',
            width:438,
            is3D: true,
        };
        var material = new google.charts.Bar(document.getElementById('barchart'));
        material.draw(data, options);
        }

 </script>
</head>
<body>
    <h3>Column Chart</h3>
    <div id="columnchart"></div>
    <h3>Pie Chart</h3>
    <div id="piechart"></div>
    <h3>Geo Chart</h3>
    <div id="geochart"></div>
    <h3>Bar Chart</h3>
    <div id="barchart"></div>
</body>
</html>