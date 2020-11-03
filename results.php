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
		<title>Student</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?>
		<img src="img/b.jpg" style="margin-left:0px;" width="100%" class="sha">
			
			<div id="section" style="margin-left:10px;">
			
				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">
				<h3 >View Student Results</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="lbox1">	
						<label>Class</label><br>
					<select name="class" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(CLASS) FROM mark";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CLASS"]}'>{$ro["CLASS"]}</option>";
										}
									}
						?>
					
					</select>
					<br><br>
						
				</div>
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
						
					</form>
					<br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Student Details</h3><br>";
								$sql="select * from mark where CLASS ='{$_POST["class"]}'";
								$re=$db->query($sql);

								if($re->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Reg.No</th>
											<th>Semester</th>
											<th>Subject1</th>
											<th>Subject2</th>
											<th>Subject3</th>
											<th>Subject4</th>
											<th>Subject5</th>
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
												<td>{$r["MARK1"]}</td>
												<td>{$r["MARK2"]}</td>
												<td>{$r["MARK3"]}</td>
												<td>{$r["MARK4"]}</td>
												<td>{$r["MARK5"]}</td>
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
								echo "No record Found";
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