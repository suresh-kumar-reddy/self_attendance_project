<?php
	include"database.php";
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add student</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>

			<div id="section" style="margin-left:10px;">
				<div class="content">
<?php include("sidebar.php");?>
						<h3 >Add student</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$edate=$_POST["da"].'-'.$_POST["mo"].'-'.$_POST["ye"];
									$target="student/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sq="insert into student(RNO,NAME,FNAME,DOB,GEN,PHO,MAIL,SCLASS,SSEM,SSEC,SIMG,AID) values('{$_POST["rno"]}','{$_POST["name"]}','{$_POST["fname"]}','{$edate}','{$_POST["gen"]}','{$_POST["pho"]}','{$_POST["email"]}','{$_POST["cla"]}','{$_POST["ssem"]}','{$_POST["sec"]}','{$target_file}','{$_SESSION["AID"]}')";

								if($db->query($sq))
								{
									$s="insert into temp_attendance(RNO,FNAME) values('{$_POST["rno"]}','{$_POST["name"]}')";
									$db->query($s);

									echo "<div class='success'>Insert Success</div>";
								}
								else
								{
									echo "<div class='error'>Insert Failed</div>";
								}
							}



						}




					?>

				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<div class="lbox">
					<label> ID</label><br>
						<?php
							$no="19MCAR001";
							$sql="select * from student order by ID desc";
							$res=$db->query($sql);
							if($res->num_rows>0)
							{
								$row1=$res->fetch_assoc();
								$no=substr($row1["RNO"],1,strlen($row1["RNO"]));
								$no++;
								$no="1".$no;
							}



						?>
					<input type="text" class="input3" name="rno" style="background:#b1b1b1;" value="<?php echo $no;?>" readonly  ><br><br>
					<label> Student Name</label><br>
					<input type="text" class="input3" name="name"><br><br
					<label> Father Name</label><br>
					<input type="text" class="input3" name="fname"><br><br>


					<label>  Date of Birth</label><br>
					<select name="da" class="input5">
						<option value="">Date</option>
						<option value="1">1 </option>
						<option value="2">2 </option>
						<option value="3">3 </option>
						<option value="4">4 </option>
						<option value="5">5 </option>
						<option value="6">6 </option>
						<option value="7">7 </option>
						<option value="8">8 </option>
						<option value="9">9 </option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						</select>
					<select name="mo" class="input5">
						<option> Month</option>
						<option value="01">Jan</option>
						<option value="02">Feb</option>
						<option value="03">Mar</option>
						<option value="04">Apr</option>
						<option value="05">May</option>
						<option value="06">Jun</option>
						<option value="07">Jul</option>
						<option value="08">Aug</option>
						<option value="09">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
					<select name="ye" class="input5">
						<option value="">Select Year</option>
						<option value="2000">2000</option>
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>

					</select><br><br>

					<label>Gender</label>
					<select name="gen" required class="input3">
							<option value="">Select</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
					</select><br><br>
					<label> Image</label><br>
										<input type="file"  class="input3" name="img">

				</div>

				<div class="rbox">

					<label> Phone No</label><br>
					<input type="text" class="input3" maxlength="10" name="pho"><br><br>

				<label> Mail Id</label><br>
					<input type="email" class="input3" name="email"><br><br>

					<label>  Address</label><br>
					<textarea rows="5" name="addr"></textarea><br><br>

					<label>Class</label><br>
					<select name="cla" required class="input3">

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
									}
						?>

					</select>
					<br><br>
					<label>Semester</label><br>
					<select name="ssem" required class="input3">

						<?php
							 $sl="SELECT DISTINCT(CSEM) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CSEM"]}'>{$ro["CSEM"]}</option>";
										}
									}
						?>

					</select>
					<br><br>

						<label>Section</label><br>
						<select name="sec" required class="input3">
						<?php
							 $sl="SELECT DISTINCT(CSEC) FROM class";
							$r=$db->query($sl);
								if($r->num_rows>0)
									{
										echo"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
										}
									}
						?>

					</select><br></br>


&nbsp&nbsp&nbsp&nbsp&nbsp			<button type="submit" class="btn" name="submit">Add</button>

					</div>
				</form>


				</div>


			</div>

				<?php include"footer.php";?>
	</body>
</html>
