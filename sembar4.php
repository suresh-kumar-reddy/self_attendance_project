<?php
 $con = mysqli_connect('localhost', 'root', '', 'spas');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
  reports
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([['REGNO', 'AVG'],
 	<br>
 <?php 
 $query = "SELECT REGNO, AVG FROM mark WHERE CLASS='IV'";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['REGNO']."',".$row['AVG']."],";
 }
 ?>
 
 ]);

 var options = {
 title: 'Students reports based on average'
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
</head>
<body><br>
  
  <hr>
 <h3>Reports</h3>
  <a href="admin_home.php">Back</a>

 <hr>
 <div id="columnchart" style="width: 500px; height: 600px;"></div></body>
</html>