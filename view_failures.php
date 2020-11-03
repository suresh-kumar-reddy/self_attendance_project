<?php
	include"database.php";	
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Result</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
	
			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<br><br>
					<div class="Output">
						<?php
								echo "<h3>Reports</h3><br>";
								$sql="select * from mark where STATUS='fail'";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
								
									echo '
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											
											<th>Semester</th>
											<th>Total Marks</th>
											<th>Average</th>
											<th>Grade</th>
											<th>Status</th>
											<th>Reason</th>
											
										</tr>
									';
								
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
											<tr>
												<td>{$i}</td>
												<td>{$r["REGNO"]}</td>
												
												<td>{$r["CLASS"]}</td>
												<td>{$r["TOTAL"]}</td>
												<td>{$r["AVG"]}</td>
												<td>{$r["GRADE"]}</td>
												<td>{$r["STATUS"]}</td>
												<td>{$r["REASON"]}</td>
											</tr>
										
										
										
										
										";
									}
							 }
						 else
									{
										echo "No record found";
									}
		
								echo "</table>";

						
						
						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>