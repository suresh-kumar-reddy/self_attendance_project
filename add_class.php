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
		<title>Add Class</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />

	</head>
	<body>
		<?php include"navbar.php";?>
			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?><br>
				<div class="content1">

						<h3 > Add Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="insert into class(CNAME,CSEM,CSEC) values('{$_POST["cname"]}','{$_POST["sem"]}','{$_POST["sec"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert failed..</div>";
							}


						}

					?>

				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>Class</label><br>
					<input type="text" class="input" name="cname">
					<label>Semester</label><br>
					<input type="text" class="input" name="sem">
<br>
					<label>Section/Specialization</lable>
					<input type="text" class="input" name="sec">

					<br>
					<button type="submit" class="btn" name="submit">Add Class Details</button>
				</form>


				</div>


				<div class="tbox">
					<h3 style="margin-top:30px;"> Class Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<table border="1px" >
						<tr>
							<th>Class</th>
							<th>Semester</th>
							<th>Section</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from class";
							$res=$db->query($s);
							if($res->num_rows>0)
							{

								while($r=$res->fetch_assoc())
								{
									echo "
										<tr>
											<td>{$r["CNAME"]}</td>
											<td>{$r["CSEM"]}</td>
											<td>{$r["CSEC"]}</td>
											<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
										</tr>
										";

								}

							}
						?>

					</table>
				</div>
			</div>

				<?php include"footer.php";?>
	</body>
</html>
