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
		<title>Review</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>

			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?><br>
				<div class="content">

					<div class="rbox1">
					<h3 style="margin-left:30px;"> Review the Class</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<table border="1px" style="margin-left:30px;" >
						<tr>
							<th>Present</th>
							<th>Absent</th>
							<th>Edit?</th>
							<th>Confirm?</th>

</th>
							<?php
						$i=0;
						$j=0;
						$k=0;

							$show=$_SESSION["TNAME"];
							$s="select * from temp_attendance where HID='{$_GET['id']}' and TNAME='".$show."' and PRESENT=1";

								$res=$db->query($s);
								if($res->num_rows>0)
								{

									while($r=$res->fetch_assoc())
									{
										$i++;

									}
								}
								echo "<tr><td> $i</td> ";

								$s1="select * from temp_attendance where HID='{$_GET['id']}' and PRESENT=0 and TNAME='".$show."'";

									$res1=$db->query($s1);
									if($res1->num_rows>0)
									{
										while($r1=$res1->fetch_assoc())
										{
											$j++;


										}
									}

									echo "<td>$j</td>
									<td><a href='edit_attendance.php?id={$_GET['id']}' class='btnb'>Yes</a></td>

									<td><a href='confirm_attendance.php?id={$_GET['id']}' class='btnb'>Yes</a></td>


									</tr>

									";



							?>


						</table>
					</div>

				</div>

			</div>
				<?php include"footer.php";?>
	</body>
</html>
