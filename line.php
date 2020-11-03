


<html>
<head>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
 
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       google.charts.setOnLoadCallback(column_chart);
    function column_chart() {
 
 var jsonData = $.ajax({
 url: column_chart.php',
 dataType:"json",
 async: false,
 success: function(jsonData)
 {
 var data = new google.visualization.arrayToDataTable(jsonData); 
 var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
 chart.draw(data);
 
 } 
 }).responseText;
  }<?php
 
$sql = mysql_connect("localhost","root","");
if(!$sql)
{
 echo "Connection Not Created";
}
$con = mysql_select_db("graphs");
if(!$sql)
{
 echo "Database Not Connected";
}
$data[] = array('Employee','Markes');
$sql = "select * from courses";
$query = mysql_query($sql);
while($result = mysql_fetch_array($query))
{
$data[] = array($result['subject'],(int)$result['number']);
 
} 
echo json_encode($data);
 
?>
</html>