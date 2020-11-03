<?php  
 $connect = mysqli_connect("localhost", "root", "", "spas");  
 $query = "SELECT STATUS, count(*) as number FROM mark GROUP BY STATUS";  
 
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Reports</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['STATUS', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["STATUS"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Number Students pass/fail',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
    
      </head>  
      <body background="a.jpg">  
           <br /><br />  
           <div style="width:1360px;">  
              <hr>
              <br>
                <pre><h3>               Reports on FAILURES/PASS
                </h3>  </pre>
                <hr>
                <div id="piechart" style="width: 900px; height: 500px;"></div>
                <hr>  
           </div>  
      </body>  
 </html>  