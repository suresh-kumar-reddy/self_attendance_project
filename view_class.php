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
		<title>Upcoming Classes</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?>

			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?>
				<div class="content">

					<div class="rbox1">
					<h3 style="margin-left:30px;"> Upcoming Classes</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<table border="1px" style="margin-left:30px;" >
						<tr>
							<th>S.No</th>
							<th>Semester</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Date  </th>
							<th>From</th>
							<th>To</th>
							<th>Taking Class?</th>
						</tr>
						<?php
							$show=$_SESSION["TNAME"];
							$s="select * from hclass WHERE TNAME='". $show. "'";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td>{$r["DATE"]}</td>
										<td>{$r["FROM_TIME"]}</td>
										<td>{$r["TO_TIME"]}</td>
										<td><a href='take_class.php?id={$r["HID"]}' class='btnr'>Yes</a></td>
									</tr>

									";
								}
							}



						?>

						</table>
					</div>
				</div>
			</div>

				<?php include"footer.php";?>
	</body>
</html>
