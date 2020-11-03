<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
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
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
					
						<label>Enter Roll No</label><br>
						<input type="text" class="input3" name="rno"><br><br>
					</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where REGNO='{$_POST["rno"]}'";
								
								

								$re=$db->query($sql);
								
								if($re->num_rows>0)
								{
								
									echo '
									<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>CIA</th>
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
												<td>{$r["CIA"]}</td>
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
									echo "No Record Found";
								}
								echo "</table>";
							}
						
						
						?>
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>