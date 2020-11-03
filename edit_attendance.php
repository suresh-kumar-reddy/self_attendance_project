<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";

	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit attendance</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
	</head>
	<body>
		<?php include"navbar.php";?>

			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?>
					<div class="content">

					<div class="rbox1">
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
							<th>Present</th>
							<th>Absent</th>
						</tr>
						<?php

																		$sq1="select * from temp_attendance where HID={$_GET["id"]}";
																		$res1=$db->query($sq1);
																		if($res1->num_rows>0)
																		{
																			while($r=$res1->fetch_assoc())
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
																						                    <td><a href='attendance_remove.php?id={$r["HID"]}' class='btnr'>Absent</a></td>

																					</tr>

																					";
																		}}






						?>

						</table>


					</div>
				</div>
			</div>
<?php include("footer.php");?>

	</body>
</html>
