<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["RNO"]))
	{
		echo"<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";

	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Upcoming Classes</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>

			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?><br>
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["NAME"]; ?></h3><br><hr><br>
					<div class="rbox1">
					<h3 style="margin-left:04px;"> Upcoming Classes</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<table border="1px" style="margin-left:04px;" >
						<tr>
							<th>Faculty</th>
							<th>Class</th>
							<th>Sem</th>
							<th>Section</th>

							<th>Subject</th>
							<th>Date</th>
							<th>Starts</th>
							<th>Ends</th>
							<th>Action</th>
														<th>Action</th>
						</tr>
						<?php

																$s="select * from hclass";
																$res=$db->query($s);
																if($res->num_rows>0)
																{
																	while($r=$res->fetch_assoc())
																	{

																		$rno=$_SESSION["RNO"];
																		$sq1="select * from temp_attendance where RNO='".$rno."' AND PRESENT=0";
																		$res1=$db->query($sq1);
																		if($res1->num_rows>0)
																		{

																					echo"
																					<tr>
																						<td>{$r["TNAME"]}</td>
																						<td>{$r["CLA"]}</td>
																						<td>{$r["CSEM"]}</td>
																						<td>{$r["SEC"]}</td>

												                    <td>{$r["SUB"]}</td>
																						<td>{$r["DATE"]}</td>
																						<td>{$r["FROM_TIME"]}</td>
																						<td>{$r["TO_TIME"]}</td>

												                    <td><a href='attendance_store.php?id={$r["HID"]}' class='btnb'>Present</a></td>
																						                    <td><a href='attendance_store.php?id={$r["HID"]}' class='btnr'>Report</a></td>

																					</tr>

																					";
																		}}
																	}





						?>

						</table>
					</div>
				</div>
			</div>
				<?php include"footer.php";?>
	</body>
</html>
