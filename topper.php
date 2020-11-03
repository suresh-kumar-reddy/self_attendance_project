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
		<title>Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				
					<h3>Mark Details</h3><br>
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Semester</label><br>
					<select name="cla" required class="input3">
				
						<?php 
							 $sl="SELECT DISTINCT(CNAME) FROM mark";
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
				
					<button type="submit" class="btn" name="view"> View Details</button>
				
					</form>
					<br><br>
					<div class="Output">
						<?php
							if(isset($_POST["view"]))
							{
								echo "<h3>Mark Details</h3><br>";
								$sql="select * from mark where CLASS='{$_POST["class"]}' ";
								$re=$db->query($sql);
								if($re->num_rows>0)
								{
									echo'
									<table border="1px">
										<tr>
											<th>Register number</th>
											<th>Subject</th>
											<th>Marks</th>
											<th>CIA</th>
											<th>Subject</th>
											<th>Mark</th>
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
												<td>{$r["TERM"]}</td>
												<td>{$r["SUB"]}</td>
												<td>{$r["MARK"]}</td>
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