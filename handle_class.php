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
		<title>Handle Class</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
	</head>
	<body>
		<?php include"navbar.php";?>

			<div id="section" style="margin-left:10px;">
				<?php include"sidebar.php";?>
					<div class="content">

					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{

							$sq="insert into hclass(CLA,CSEM,SEC,SUB,TNAME,DATE,FROM_TIME,TO_TIME) values ('{$_POST["cla"]}','{$_POST["csem"]}','{$_POST["sec"]}','{$_POST["sub"]}','{$_POST["tname"]}','{$_POST["date"]}','{$_POST["from_time"]}','{$_POST["to_time"]}')";
							if($db->query($sq))
							{
								$s="insert into temp_attendance (RNO,NAME) select RNO,NAME from student";

								$db->query($s);


																echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}

						}


					?>


					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

					<label>Class</label><br>

						<select name="cla" required class="inputs4">
							<?php
								$sl="select DISTINCT(CNAME) from class";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
									 }
								 }


							?>

						</select>
						<br><br>

						<label>Semester</label><br>

							<select name="csem" required class="inputs4">
							<?php
								$sl="select DISTINCT(CSEM) from class";
								$r=$db->query($sl);
									if($r->num_rows>0)
									{
										echo "<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CSEM"]}'>{$ro["CSEM"]}</option>";
										}
									}




							?>


							</select><br></br>

					<label>Section</label><br>

						<select name="sec" required class="inputs4">
						<?php
							$sl="select DISTINCT(CSEC) from class";
							$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo "<option value=''>Select</option>";
									while($ro=$r->fetch_assoc())
									{
										echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
									}
								}




						?>


						</select><br></br>



					<label>Subject</label><br>

						<select name="sub" required class="inputs4">
						<?php
							$s="select * from sub";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>Select</option>";
								while($r=$re->fetch_assoc())
								{
								echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
								}
							}


						?>
						</select>

					<br><br>
					<label>Prof</label><br>

						<select name="tname" required class="inputs4">
							<?php
								$sl="select * from staff";
								$r=$db->query($sl);
								 if($r->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($ro=$r->fetch_assoc())
									 {
										 echo "<option value='{$ro["TNAME"]}'>{$ro["TNAME"]}</option>";
									 }
								 }


							?>

						</select>

					<br><br>
					<label>Date</label>
					<input type="date" name="date">
					<br><br>
					<br><br>
					<label>From Time</label>
					<input type="time" name="from_time">
					<br><br>
					<br><br>
					<label>To Time</label>
					<input type="time" name="to_time">
					<br><br>

					<button type="submit" class="btn" name="submit">Add  Details</button>

					</form>



					</div>
					<div class="rbox1">
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";
						}

					?>
					<h3 style="margin-left:-134px;"> Details</h3>
<br>
					<table border="1px" style="margin-left:-134px;" >
						<tr>
							<th>Prof</th>

							<th>Class</th>

							<th>Sem</th>
							<th>Section</th>
							<th>Subject</th>
							<th>View</th>

							<th>Delete</th>
						</tr>
						<?php
							$s="select * from hclass";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>

										<td>{$r["TNAME"]}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["CSEM"]}</td>

										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td><a href='view_assign_class.php?id={$r["HID"]}' class='btnb'>More</a></td>

										<td><a href='hclass.php?id={$r["HID"]}' class='btnr'>Delete</a></td>
									</tr>

									";

								}
							}



						?>

						</table>
					</div>
				</div>
			</div>

			<div id="box"></div>

		</div>

				<?php include"footer.php";?>

							<script>
								$(document).ready(function(){
									$("#txt").keyup(function(){
										var txt=$("#txt").val();
										if(txt!="")
										{
											$.post("view_assign_class.php",{s:txt},function(data){
												$("#box").html(data);
											});
										}

									});



								});
							</script>

	</body>
</html>
