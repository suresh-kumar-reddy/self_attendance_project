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
		<title>ADD SUB</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />

	</head>
	<body>
				<?php include"navbar.php";?>

			<div id="section" style="margin-left:10px;">
					<?php include"sidebar.php";?><br><br><br>

					<div class="content1">

						<h3 > Add Subject Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into sub(SID,SNAME,CLASS,CSEC) values ('{$_POST["sid"]}','{$_POST["sname"]}','{$_POST["class"]}','{$_POST["csec"]}')";
								if($db->query($sq))
								{
									echo "<div class='success'>Insert Success..</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed..</div>";
								}
							}
						?>

						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						   <label>Subject Code</label><br>
						   <input type="text" name="sid" required class="inputs4" ><br><br>
							 <label>Subject Name</label><br>
							<input type="text" name="sname" required class="inputs4" >

						   <div class="lbox1">
						   	<br>
						<label>Class</label>
					<select name="class" required class="input3">

						<?php
							 $sl="SELECT DISTINCT(CNAME) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";

										}
									}?>
								</select>

								<br><br>
									<label>Section/Specialization</label>

								<select name="csec" required class="input3">
									<?php

									$s2="SELECT DISTINCT(CSEC) FROM class";
								 $r1=$db->query($s2);
									 if($r1->num_rows>0)
										 {
											 echo"<option value=''>Select</option>";
											 while($ro1=$r1->fetch_assoc())
											 {
												 echo "<option value='{$ro1["CSEC"]}'>{$ro1["CSEC"]}</option>";

											 }
										 }

						?>
						</select>
					<br>

															</div>
															<br>
															<br>
															<br>
															<br>
															<br>
															<br>
															<br>

						   <button type="submit" class="btn" name="submit">Add</button>
						</form>


					</div>


				<div class="tbox" >
					<h3 style="margin-top:30px;"> Subject Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<table border="1px" >
						<tr>

							<th>Code</th>
							<th>Name</th>
							<th>Semester </th>
							<th>Section </th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from sub";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									echo "
										<tr>
										<td>{$r["SID"]}</td>

										<td>{$r["SNAME"]}</td>
										<td>{$r["CLASS"]}</td>
										<td>{$r["CSEC"]}</td>

										<td><a href='sub_delete.php?id={$r["SID"]}' class='btnr'>Delete</a></td>
										</tr>

									";

								}

							}
							else
							{
								echo "No Record Found";
							}
						?>

					</table>
				</div>
			</div>

				<?php include"footer.php";?>
	</body>
</html>
